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

        $messages = LaravelGmail::message()->in('INBOX')->preload()->all();
        return view('branchadmin.gmail.index')->with('data',$messages);
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
