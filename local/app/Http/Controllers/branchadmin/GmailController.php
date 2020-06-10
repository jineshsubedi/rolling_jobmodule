<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Google_Client;
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
    function getClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Gmail API PHP Quickstart');
        $client->setScopes(\Google_Service_Gmail::GMAIL_READONLY);
        $client->setClientId(\Config::get('gmail.client_id'));
        $client->setClientSecret(\Config::get('gmail.client_secret'));
        $client->setRedirectUri(\Config::get('gmail.redirect_url'));


//        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {

            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
//                dd($client->createAuthUrl());
//
//                dd('s');
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
//                dd($authUrl);
//                dd($authUrl);
//                printf("Open the following link in your browser:\n%s\n", $authUrl);
//                print 'Enter verification code: ';
                $authCode = "4/0gG6lE-Y9sluQDg074h431bi-PoGnqY_LS3q-j6nev4LfZbiHtdTyI3M63SLAUkKBKKZenJ7T05L-PMaQEOZej0";

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
//                dd($accessToken);
                $client->setAccessToken($accessToken);
//                dd($client->getAccessToken());

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
    }
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
