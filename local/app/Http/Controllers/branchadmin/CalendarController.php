<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\JobLevel;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class CalendarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $client;
    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('credentials.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
//      local env ssl verifier by pass
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function oauth2callback()
    {
        @session_start();

        $rurl = action('branchadmin\CalendarController@oauth2callback');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {

            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {

            $this->client->authenticate($_GET['code']);

            $_SESSION['access_token'] = $this->client->getAccessToken();

            return redirect()->route('branchadmin.calendar.index');
        }
    }
    public function index(Request $request)
    {

        @session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);

            $calendarId = 'primary';
            // dd($service->events->listEvents($calendarId));

            $results = $service->events->listEvents($calendarId);
            $datas['result']=$results->getItems();
            array_shift($datas['result']);
            return view('branchadmin.calendar.index')->with('datas',$datas);
        } else {
            return redirect()->route('oauth2callback');
        }
//        return view('branchadmin.calendar.index')->with('data',$joblevel);
    }

     public function create()
    {
        return view('branchadmin.calendar.newform');
    }
    public function store(Request $request)
    {
       
        $v= Validator::make($request->all(),
            [
                    'title' => 'required|min:3',
                    
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else {
            @session_start();
            $startDateTime=$request->start_date.'T'.$request->start_time.':00Z';
            $endDateTime=$request->end_date.'T'.$request->end_time.':00Z';
//             = $request->start_date;
//             = $request->end_date;

            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                $this->client->setAccessToken($_SESSION['access_token']);
                $service = new Google_Service_Calendar($this->client);

                $calendarId = 'primary';
                $event = new Google_Service_Calendar_Event([
                    'summary' => $request->title,
                    'description' => $request->description,
                    'start' => ['dateTime' => $startDateTime],
                    'end' => ['dateTime' => $endDateTime],
                    'reminders' => ['useDefault' => true],
                    'attendees' => [
                        ['email' => 'depeshkhatiwada@gmail.com'],
                        ['email' => 'iorchidian@gmail.com'],
                    ],
                ]);
                $results = $service->events->insert($calendarId, $event);
                if ($results) {
//                    dd($results['modelData']);
                    \Session::flash('alert-success', 'Record have been saved Successfully');
                    return redirect()->route('branchadmin.calendar.index');

                } else {
                    \Session::flash('alert-danger', 'Something Went Wrong on Saving Data');
                    return redirect()->route('branchadmin.calendar.index');
                }

            } else {
                return redirect()->route('oauth2callback');
            }
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            @session_start();
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                $this->client->setAccessToken($_SESSION['access_token']);
                $service = new Google_Service_Calendar($this->client);

                $service->events->delete('primary', $id);
                return redirect()->route('branchadmin.calendar.index');

            } else {
                return redirect()->route('oauth2callback');
            }
        }
        else 
        {
           \Session::flash('alert-danger','Something Went Wrong on Deleting data');
            return redirect()->route('branchadmin.calendar.index');
        }
    }

    public function edit($id)
    {
        $datas = JobLevel::find($id);
       if($datas) {
            return view('branchadmin.calendar.editform')->with('data',$datas);
        } else {
            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->route('branchadmin.calendar.index');
        }
    }
    public function update($id, Request $request)
    {
        $v= Validator::make($request->all(),
        [
            'name' => 'required|min:3||unique:calendar,name,'.$request->id.',id',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        } else 
            {
                $user= JobLevel::where('id',$id)->update(['name' => $request->name,'sortOrder' => $request->sortOrder]);
                if($user)
                {
                    \Session::flash('alert-success','Record have been updated Successfully');
                    return redirect()->route('branchadmin.calendar.index');
                }
                else {
                    \Session::flash('alert-danger','Something Went Wrong on Updating Data');
                    return redirect()->route('branchadmin.calendar.index');
                }
            }
    }
}
