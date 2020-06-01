<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Drive;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Google_Service_Drive_DriveFile;
use Google_Service_Books;
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
    private $drive;
    public function __construct(Google_Client $client)
    {
        $this->middleware(function ($request, $next) use ($client) {
            // dd(\Config::get('filesystems.disks.google.refreshToken'));
            $client->setAuthConfig('drivecredential.json');
            $client->refreshToken(\Config::get('filesystems.disks.google.refreshToken'));
            $client->addScope(Google_Service_Drive::DRIVE);
//            $this->drive = new Google_Service_Books($client);
            $this->drive = new \Google_Service_Drive($client);
            return $next($request);
        });
    }
    public function index(Request $request){
        $id=\Config::get('filesystems.disks.google.folderId');
        $optParams = [
            'fields' => 'files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType)',
            'q' => "'".$id."' in parents  and trashed=false"
        ];
        $results = $this->drive->files->listFiles($optParams);
        if (count($results->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            return view('branchadmin.drive.index')->with('data',$results->getFiles());
        }
    }
    public function trash(Request $request){
        $id=\Config::get('filesystems.disks.google.folderId');
        $optParams = [
            'fields' => 'files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType)',
            'q' => "'".$id."' in parents  and trashed=true"
        ];
        $results = $this->drive->files->listFiles($optParams);
        if (count($results->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            return view('branchadmin.drive.trash')->with('data',$results->getFiles());
        }
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
            $data=$request->file("document")->store("1uSA386lPj6eHGH_fzj0iuphouozGi66p","google");
            if ($data == true) {
                \Session::flash('alert-success','Data successfully inserted in drive');
                return redirect()->route('branchadmin.drive.index');
            } else {
                \Session::flash('alert-danger','Drive accessed failed ');
                return redirect()->route('branchadmin.drive.index');
            }

//            dd($request->file("document"));
//            dd();
        }
    }
//    public function show($id)
//    {
//        if($id)
//        {
//            $data= \Storage::disk('google')->url($id);
//            if ($data == true) {
//                return view('branchadmin.drive.show')->with('data',$data);
//
////                \Session::flash('alert-success','Data successfully deleted from drive');
////                return redirect()->route('branchadmin.drive.index');
//            } else {
//                \Session::flash('alert-danger','Drive accessed failed ');
//                return redirect()->route('branchadmin.drive.index');
//            }
//        }
//        else
//        {
//            \Session::flash('alert-danger','Invalid Request');
//            return redirect()->route('branchadmin.drive.index');
//        }
//    }
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


    public function restore($id)
    {
        try {
            dd($this->drive);
            $val= $this->drive->files->untrash('1r5n576zkVVFx8bGeHYTrs1tm2NEiLeb_');
            dd($val);

//            $results = $this->drive->files->get('1r5n576zkVVFx8bGeHYTrs1tm2NEiLeb_');
//            $results.setTrashed(true);

//            rescueFile
//            $results.setTrashed(false);
//            dd($results);

//            getFiles

//            .setTrashed(false)
//dd($this->drive);
//            $this->drive->files->update('1r5n576zkVVFx8bGeHYTrs1tm2NEiLeb_',$results,['trashed'=>false]);
//            $this->drive->files->untrash('1r5n576zkVVFx8bGeHYTrs1tm2NEiLeb_');
            \Session::flash('alert-success', 'Valid Request');
            return redirect()->route('branchadmin.drive.index');
        } catch (Exception $e) {
            return false;
        }

    }
    public function delete($id)
    {
        try {
            $this->drive->files->delete($id);
            \Session::flash('alert-success','Valid Request');
            return redirect()->route('branchadmin.drive.trash');
        } catch (Exception $e) {
            return false;
        }

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
