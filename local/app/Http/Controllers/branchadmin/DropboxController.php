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
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use Validator;
use App\JobLevel;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class DropboxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $client;
    public function __construct()
    {
        $this->client = new Client('mPVXSRfwQFAAAAAAAAAAI9DHNEwQ55rfphcBXMtaXvq3uTKToN8zUjgBG0RxCsnB');
    }
    public function index(Request $request){
        $results = $this->client->listFolder();
        return view('branchadmin.dropbox.index')->with('data',$results['entries']);
    }

     public function create()
    {
        return view('branchadmin.dropbox.newform');
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

            $data=$this->client->upload($request->file("document")->getClientOriginalName(),$request->file("document")->getRealPath());
            if ($data) {
                \Session::flash('alert-success','Data successfully inserted in dropbox');
                return redirect()->route('branchadmin.dropbox.index');
            } else {
                \Session::flash('alert-danger','Dropbox accessed failed ');
                return redirect()->route('branchadmin.dropbox.index');
            }

//            dd($request->file("document"));
//            dd();
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            $val= \Storage::disk('google')->delete($id);
            if ($val == true) {
                \Session::flash('alert-success','Data successfully deleted from dropbox');
                return redirect()->route('branchadmin.dropbox.index');
            } else {
                \Session::flash('alert-danger','Drive accessed failed ');
                return redirect()->route('branchadmin.dropbox.index');
            }
        }
        else 
        {
           \Session::flash('alert-danger','Invalid Request');
            return redirect()->route('branchadmin.dropbox.index');
        }
    }


    public function restore($id)
    {
        try {
            $copiedFile = new Google_Service_Drive_DriveFile();
            $results = $this->dropbox->files->get($id);
            $copiedFile->setName($results->name);
            $this->dropbox->files->copy($id, $copiedFile);
            $this->dropbox->files->delete($id);
            \Session::flash('alert-success', 'Valid Request');
            return redirect()->route('branchadmin.dropbox.index');
        } catch (Exception $e) {
            return false;
        }

    }
    public function delete($id)
    {
        try {
            $this->dropbox->files->delete($id);
            \Session::flash('alert-success','Valid Request');
            return redirect()->route('branchadmin.dropbox.trash');
        } catch (Exception $e) {
            return false;
        }

    }
}
