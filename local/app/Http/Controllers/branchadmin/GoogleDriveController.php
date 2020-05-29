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

class GoogleDriveController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = \Storage::disk('google')->allFiles();
//        dd(\Storage::disk('google')->url('14mhWIaXTtWHe6dToMfByaFytvXe3M3wh'));
        return view('branchadmin.drive.index')->with('data',$data);
    }

     public function create()
    {
        return view('branchadmin.drive.newform');
    }
    public function store(Request $request)
    {
        $v= Validator::make($request->all(),
            [
                    'document' => 'required',
                    
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else {
//            dd($request->file("document"));
            dd($request->file("document")->store("1uSA386lPj6eHGH_fzj0iuphouozGi66p","google"));
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            $val= \Storage::disk('google')->delete($id);
            if ($val == true) {
                \Session::flash('alert-success','Data successfully deleted from drive');
                return redirect()->route('branchadmin.drive.index');
            } else {
                \Session::flash('alert-danger','Drive accessed failed ');
                return redirect()->route('branchadmin.drive.index');
            }
        }
        else 
        {
           \Session::flash('alert-danger','Invalid Request');
            return redirect()->route('branchadmin.drive.index');
        }
    }

    public function edit($id)
    {
        @session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $datas = $service->events->get('primary', $id);
//            dd($results);
//            $datas=$results->getItems();
            if($datas) {
                return view('branchadmin.drive.editform')->with('data',$datas);
            } else {
                \Session::flash('alert-danger','You choosed wrong Data');
                return redirect()->route('branchadmin.drive.index');
            }
        } else {
            return redirect()->route('oauth2callback');
        }
//        $datas = JobLevel::find($id);
//       if($datas) {
//            return view('branchadmin.drive.editform')->with('data',$datas);
//        } else {
//            \Session::flash('alert-danger','You choosed wrong Data');
//            return redirect()->route('branchadmin.drive.index');
//        }
    }
    public function update($id, Request $request)
    {
        $v= Validator::make($request->all(),
        [
            'title' => 'required|min:3',
        ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        } else {
            @session_start();
            if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
                $this->client->setAccessToken($_SESSION['access_token']);
                $service = new Google_Service_Calendar($this->client);

                $startDateTime=$request->start_date.'T'.$request->start_time.':00Z';
                $endDateTime=$request->end_date.'T'.$request->end_time.':00Z';

                // retrieve the event from the API.
                $event = $service->events->get('primary', $id);

                $event->setSummary($request->title);

                $event->setDescription($request->description);

                //start time
                $start = new Google_Service_Calendar_EventDateTime();
                $start->setDateTime($startDateTime);
                $event->setStart($start);

                //end time
                $end = new Google_Service_Calendar_EventDateTime();
                $end->setDateTime($endDateTime);
                $event->setEnd($end);

                $updatedEvent = $service->events->update('primary', $event->getId(), $event);

                if ($updatedEvent) {
                    \Session::flash('alert-success', 'Record have been saved Successfully');
                    return redirect()->route('branchadmin.drive.index');

                } else {
                    \Session::flash('alert-danger', 'Something Went Wrong on Saving Data');
                    return redirect()->route('branchadmin.drive.index');
                }

            } else {
                return redirect()->route('oauth2callback');
            }
        }
    }
}
