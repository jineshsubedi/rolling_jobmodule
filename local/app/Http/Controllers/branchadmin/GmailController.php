<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Illuminate\Http\Request;
use Validator;
use App\JobLevel;


class GmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
//        if(!LaravelGmail::check()){
//            return 'login to continue';
////            return redirect()->to('/oauth/gmail');
//        }else{
//            dd('rr');
//        }
//        if(LaravelGmail::isAccessTokenExpired()){
//            LaravelGmail::fetchAccessTokenWithRefreshToken( LaravelGmail::getRefreshToken() );
//            $token = LaravelGmail::getAccessToken();
//            LaravelGmail::setAccessToken( $token );
//            LaravelGmail::saveAccessToken( $token );
////            dd('sa');
//        }

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $messages=array();
//        $gmailall = LaravelGmail::message()->in( $box = 'inbox' )->all();
//        $inbox = count($gmailall);
//        $access_token = LaravelGmail::getToken()['access_token'];
//        $url = "https://www.googleapis.com/gmail/v1/users/me/";
//        $message_url = $url."messages?maxResults=10&q=in:inbox&access_token=".$access_token."&pageToken=".$pageToken;
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $message_url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        $gmails = json_decode(curl_exec($ch), true);
//        $token = $access_token;
//        dd($gmails);
//        echo $token;
//        dd('aa');
//        $opt_param = array();
//        dd(LaravelGmail::message()->listUsersMessages('me', $opt_param));

//        $messages['inbox']= LaravelGmail::message()->take(10)->in('INBOX')->next();
        $msg = LaravelGmail::message();
        $messages['inbox'] = $msg->take(10)->in('INBOX')->all(); //gets first 10
//        $msg->take(3)->in('INBOX')->all();
//        $messages['inbox'] = $msg->take(3)->in('INBOX')->all('10586441687922781634');
        $messages['inbox']->pageToken=$msg->pageToken;
//        dd($messages);
//        $messages['inbox']= $msg->next();
//        dd($msg->next());
//        dd(LaravelGmail::message()->getNextPageToken());

        $messages['social'] = LaravelGmail::message()->in('SOCIAL')->all();

        $messages['promotions'] = LaravelGmail::message()->in('PROMOTIONS')->all();

//        dd($messages->pageToken);
//        dd($messages);
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
