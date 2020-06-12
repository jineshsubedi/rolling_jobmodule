<?php

namespace App\Http\Controllers\branchadmin;

use App\GoogledriveAPI;
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
    private $api;
    public function __construct(Google_Client $client)
    {

        $this->middleware(function ($request, $next) use ($client) {
//            dd(auth());
            $this->api = GoogledriveAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first();
            if($this->api == null){
                return redirect()->route('googledrive.api.create');
            }
            $client->setClientId($this->api->client_id);
            $client->setClientSecret($this->api->client_secret);
            $client->refreshToken($this->api->refresh_token);

//            $client->setAuthConfig('drivecredential.json');
//            $client->setClientId(\Config::get('filesystems.disks.google.clientId'));
//            $client->setClientSecret(\Config::get('filesystems.disks.google.clientSecret'));
//            $client->refreshToken(\Config::get('filesystems.disks.google.refreshToken'));
            $client->addScope(Google_Service_Drive::DRIVE);
            $this->drive = new \Google_Service_Drive($client);
            return $next($request);
        });
    }
    public function index(Request $request){

//        $id=\Config::get('filesystems.disks.google.folderId');
        $id=$this->api->drive_folder_id;

        $optParams = [
            'fields' => 'files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType)',
            'q' => "'".$id."' in parents  and trashed=false"
        ];
        $results = $this->drive->files->listFiles($optParams);
//        dd($results->getFiles());
        if (count($results->getFiles()) == 0) {
            print "No files found.\n";
        } else {
            return view('branchadmin.drive.index')->with('data',$results->getFiles())->with('folder_id',$id);
        }
    }
    public function viewfolder(Request $request,$id){

        $optParams = [
            'fields' => 'files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType)',
            'q' => "'".$id."' in parents  and trashed=false"
        ];
        $results = $this->drive->files->listFiles($optParams);
//        dd($results);
        return view('branchadmin.drive.folder')->with('data',$results->getFiles())->with('folder_id',$id);
    }
    public function trash(Request $request){
        $id=$this->api->drive_folder_id;
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
     public function folderupload($folder)
    {
        return view('branchadmin.drive.folderupload')->with('folder_id',$folder);
    }
    public function createfolder()
    {
        return view('branchadmin.drive.newfolder');
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
            $data=$request->file("document")->store($this->api->drive_folder_id,"google");
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
    public function storeinfolder(Request $request)
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
            $data=$request->file("document")->store($request->folder_id,"google");
            if ($data == true) {
                \Session::flash('alert-success','Data successfully inserted in drive');
                return redirect()->route('branchadmin.drive.viewfolder', $request->folder_id);
            } else {
                \Session::flash('alert-danger','Drive accessed failed ');
                return redirect()->route('branchadmin.drive.index');
            }

//            dd($request->file("document"));
//            dd();
        }
    }
    public function storefolder(Request $request)
    {
        $v= Validator::make($request->all(),
            [
                    'folder_name' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else {
            $fileMetadata = new \Google_Service_Drive_DriveFile(array(
                'name' => $request->folder_name,
                'parents' => array($request->parent_folder),
                'mimeType' => 'application/vnd.google-apps.folder'));
            $data = $this->drive->files->create($fileMetadata, array('fields' => 'id'));
            if ($data == true) {
                \Session::flash('alert-success','Folder successfully created in drive');
                return redirect()->route('branchadmin.drive.index');
            } else {
                \Session::flash('alert-danger','Drive accessed failed ');
                return redirect()->route('branchadmin.drive.index');
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
            $copiedFile = new Google_Service_Drive_DriveFile();
            $results = $this->drive->files->get($id);
            $copiedFile->setName($results->name);
            $this->drive->files->copy($id, $copiedFile);
            $this->drive->files->delete($id);
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
}
