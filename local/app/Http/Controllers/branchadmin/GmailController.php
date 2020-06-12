<?php

namespace App\Http\Controllers\branchadmin;

use App\GmailAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use League\Flysystem\Util\MimeType;
use Validator;
use App\JobLevel;


class GmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function changeEnv($data = array()){
        if(count($data) > 0){
            $env = file_get_contents(base_path() . '/.env');
            $env = preg_split('/\s+/', $env);;
            foreach((array)$data as $key => $value){
                foreach($env as $env_key => $env_value){
                    $entry = explode("=", $env_value, 2);
                    if($entry[0] == $key){
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        $env[$env_key] = $env_value;
                    }
                }
            }
            $env = implode("\n", $env);
            file_put_contents(base_path() . '/.env', $env);
            return true;
        } else {
            return false;
        }
    }
    public function __construct(LaravelGmail $laravelGmail){
        $this->middleware(function ($request, $next) use($laravelGmail){
            $api = GmailAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first();
            if(!$api){
                return redirect()->route('gmail.api.create');
            }else{
                if(!$laravelGmail::check()){
                    $env_update = $this->changeEnv(array(
                        "GMAIL_PROJECT_ID" => $api->project_id,
                        "GMAIL_CLIENT_ID" => $api->client_id,
                        "GMAIL_CLIENT_SECRET" => $api->client_secret,
                        "GMAIL_REDIRECT_URI" => $api->redirect_url
                    ));
                    if($env_update){
                        Artisan::call('config:clear');
                        Artisan::call('cache:clear');
                        return \Dacastro4\LaravelGmail\Facade\LaravelGmail::redirect();
                    } else {
                        \Session::flash('alert-danger','Something Went Wrong on Mail API');
                        return redirect()->to('/branchadmin/jobs');
                    }
                }else{
                    return $next($request);
                }
            }

        });
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $messages=array();

        $msg = LaravelGmail::message();
        $messages['inbox'] = $msg->take(10)->in('INBOX')->all(); //gets first 10
//        $msg->take(3)->in('INBOX')->all();
//        $messages['inbox'] = $msg->take(3)->in('INBOX')->all('10586441687922781634');
        $messages['inbox']->pageToken=$msg->pageToken;
        $messages['social'] = LaravelGmail::message()->in('SOCIAL')->all();
        $messages['promotions'] = LaravelGmail::message()->in('PROMOTIONS')->all();

        return view('branchadmin.gmail.index')->with('data',$messages);
    }
    public function page(Request $request,$id)
    {
        $messages=array();
        $msg = LaravelGmail::message();
        $messages['inbox'] = $msg->take(10)->in('INBOX')->all($id);
        $messages['inbox']->pageToken=$msg->pageToken;
        $messages['social'] = LaravelGmail::message()->in('SOCIAL')->all();
        $messages['promotions'] = LaravelGmail::message()->in('PROMOTIONS')->all();
        return view('branchadmin.gmail.page')->with('data',$messages);
    }
    public function trash(Request $request)
    {

        $messages = LaravelGmail::message()->in('TRASH')->preload()->all();
        return view('branchadmin.gmail.trash')->with('data',$messages);
    }
    public function sent(Request $request)
    {
        $messages = LaravelGmail::message()->in('SENT')->preload()->all();
        return view('branchadmin.gmail.sent')->with('data',$messages);
    }

     public function create()
    {
        return view('branchadmin.gmail.newform');
    }
    public function store(Request $request)
    {
       
        $v= Validator::make($request->all(),
            [

                'name' => 'required|min:3',
                'email' => 'required|min:3',
                'subject' => 'required|min:3',
                'message' => 'required|min:3',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else 
            {
                $mail = new Mail();
                $mail->to( $request->email, $request->name );
                $mail->subject( $request->subject);
//                $mail->view( 'mail.gmail', $name );
                $mail->message($request->message);
                $mail->send();

                
                if($mail)
                {
                    
                    \Session::flash('alert-success','Mail have been send Successfully');
                    return redirect()->route('branchadmin.gmail.index');

                } else {

                    \Session::flash('alert-danger','Something Went Wrong on Sending Mail');
                    return redirect()->route('branchadmin.gmail.index');
                
                }
               
                

            }
        
    }

    public function show($id)
    {
        $datas=LaravelGmail::message()->get( $id );
        $datas->markAsRead();
        if($datas) {
            return view('branchadmin.gmail.show')->with('data',$datas);
        } else {
            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->route('branchadmin.gmail.index');
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            $datas=LaravelGmail::message()->get( $id );
            $datas->sendToTrash();
            \Session::flash('alert-success','Record deleted Successfully');
            return redirect()->route('branchadmin.gmail.index');
        }
        else 
        {
           \Session::flash('alert-danger','Something Went Wrong on Deleting data');
            return redirect()->route('branchadmin.gmail.index');
        }
    }
    public function restore($id)
    {
        if($id)
        {
            $datas=LaravelGmail::message()->get( $id );
            $datas->addLabel('INBOX');
            $datas->removeLabel('TRASH');
            \Session::flash('alert-success','Record restored Successfully');
            return redirect()->route('branchadmin.gmail.index');
        }
        else
        {
            \Session::flash('alert-danger','Something Went Wrong on Deleting data');
            return redirect()->route('branchadmin.gmail.index');
        }
    }
    public function delete($id)
    {
        try {
            $datas=LaravelGmail::message()->get( $id );
            $datas->removeFromTrash();
            \Session::flash('alert-success','Request Success');
            return redirect()->route('branchadmin.gmail.trash');
        } catch (Exception $e) {
            return false;
        }

    }

}
