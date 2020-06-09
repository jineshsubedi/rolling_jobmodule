<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Drive;
use Google_Service_Calendar_EventDateTime;
use Google_Service_Drive_DriveFile;
use Google_Service_Books;
use App\Http\Requests;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $this->client = new Client(\Config::get('services.dropbox.api'));
    }
    public function index(Request $request){
        $results = $this->client->listFolder();
        return view('branchadmin.dropbox.index')->with('data',$results['entries']);
    }

     public function create()
    {
        return view('branchadmin.dropbox.newform');
    }
    public function createfolder()
    {
        return view('branchadmin.dropbox.createfolder');
    }
    public function uploadinfolder(Request $request, $folder)
    {
        return view('branchadmin.dropbox.uploadinfolder')->with('folder_id',$folder);
    }
    public function newfolder(Request $request, $folder)
    {
        return view('branchadmin.dropbox.newfolder')->with('folder_id',$folder);
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
            $filename = Str::random(3).'_'.$request->file("document")->getClientOriginalName();
            if($request->folder_id){
                $metadata = $this->client->getMetadata($request->folder_id);
                $folder_name=$metadata['path_lower'].'/'.$filename;
                $data=$this->client->upload($folder_name,$request->file("document")->getRealPath());
                \Session::flash('alert-success','Data successfully inserted in dropbox');
                return redirect()->route('branchadmin.dropbox.openfolder', $metadata['id']);
            }else{
                $data=$this->client->upload($filename,$request->file("document")->getRealPath());
            }
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
    public function storefolder(Request $request)
    {
        $v= Validator::make($request->all(),
            [
                'folder_name' => 'required|min:5',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            try {
                if($request->folder_id){
                    $metadata = $this->client->getMetadata($request->folder_id);
                    $folder_name=$metadata['path_lower'].'/'.$request->folder_name;
                    $data=$this->client->createFolder($folder_name);
                    \Session::flash('alert-success','Data successfully inserted in dropbox');
                    return redirect()->route('branchadmin.dropbox.openfolder', $metadata['id']);
                }else{
                    $data=$this->client->createFolder($request->folder_name);
                }
                if ($data) {
                    \Session::flash('alert-success','Data successfully inserted in dropbox');
                    return redirect()->route('branchadmin.dropbox.index');
                } else {
                    \Session::flash('alert-danger','Dropbox accessed failed ');
                    return redirect()->route('branchadmin.dropbox.index');
                }
            } catch (Exception $e) {
                \Session::flash('alert-danger','Folder already exist ');
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
            $val= $this->client->delete($id);
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
    public function show($id)
    {
        try {
            $results = $this->client->getTemporaryLink($id);
            return view('branchadmin.dropbox.show')->with('data',$results);
        } catch (Exception $e) {
            return false;
        }

    }
    public function folder($id)
    {
        try {
            $results = $this->client->listFolder($id);
            $data['results']=$results['entries'];
            $data['metadata'] = $this->client->getMetadata($id);
//            dd($results);
            return view('branchadmin.dropbox.folderview')->with('data',$data);
        } catch (Exception $e) {
            return false;
        }

    }
}
