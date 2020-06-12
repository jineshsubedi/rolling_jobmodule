<?php

namespace App\Http\Controllers\branchadmin;

use App\DropboxAPI;
use App\EmployeeMeeting;
use App\GmailAPI;
use App\GoogledriveAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Jobs;
use App\Branch;
use App\JobLevel;
use App\JobLocation;
use App\JobForm;
use App\JobRequirements;
use App\FormData;
use App\Experience;
use App\Currency;
use App\Employee;
use App\EducationLevel;
use App\JobsLocation;
use App\Trash;
use App\RecruitmentProcess;
use PDF;
use File;
use App\JobExperience;
use App\JobEducation;
use App\EmployeeEducation;
use App\EmployeeExperience;
use App\EmployeeLanguage;
use App\EmployeeTraining;
use App\EmployeeReference;
// use App\Saluation;


use App\Imagetool;
use Excel;
use ZipArchive;
use App\FlxZipArchive;
if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class ApiController extends Controller
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
    public function __construct()
    {
      $this->middleware('branchadmin');
    }

    public function getDriveApi()
    {
        if(GoogledriveAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first())return redirect()->route('branchadmin.drive.index');
        return view('branchadmin.drive.getapi');
    }
    public function editDriveApi()
    {
        if($data = GoogledriveAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first()){
            return view('branchadmin.drive.editapi')->with("data",$data);
        }else{
            return redirect()->route('googledrive.api.create');
        }

    }
    public function storeDriveApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'client_id' => 'required',
                'client_secret' => 'required',
                'refresh_token' => 'required',
                'drive_folder_id' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data= GoogledriveAPI::create($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Google Drive API added');
                return redirect()->route('googledrive.api.edit');
            } else {
                \Session::flash('alert-danger','Fail to add Google Drive API');
                return redirect()->route('googledrive.api.edit');
            }

        }
    }
    public function updateDriveApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'client_id' => 'required',
                'client_secret' => 'required',
                'refresh_token' => 'required',
                'drive_folder_id' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data= GoogledriveAPI::where("staff_id","=",$request->staff_id)->first();
            $data->update($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Google Drive API added');
                return redirect()->route('googledrive.api.edit');
            } else {
                \Session::flash('alert-danger','Fail to add Google Drive API');
                return redirect()->route('googledrive.api.edit');
            }

        }
    }

    public function getGmailApi()
    {
        if(GmailAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first())return redirect()->route('branchadmin.drive.index');
        return view('branchadmin.gmail.getapi');
    }
    public function editGmailApi()
    {
        if($data = GmailAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first()){
            return view('branchadmin.gmail.editapi')->with("data",$data);
        }else{
            return redirect()->route('googledrive.api.create');
        }

    }
    public function storeGmailApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'project_id' => 'required',
                'client_id' => 'required',
                'client_secret' => 'required',
                'redirect_url' => 'required',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data= GmailAPI::create($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Gmail API added');
                return redirect()->route('googledrive.api.edit');
            } else {
                \Session::flash('alert-danger','Fail to add Gmail API');
                return redirect()->route('googledrive.api.create');
            }

        }
    }
    public function updateGmailApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'project_id' => 'required',
                'client_id' => 'required',
                'client_secret' => 'required',
                'redirect_url' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data= GmailAPI::where("staff_id","=",$request->staff_id)->first();
            $data->update($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Gmail API updated');
                return redirect()->route('gmail.api.edit');
            } else {
                \Session::flash('alert-danger','Fail to add Google Drive API');
                return redirect()->route('gmail.api.edit');
            }

        }
    }

    public function getDropboxApi()
    {
        if(DropboxAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first()){
            return redirect()->route('branchadmin.dropbox.index');
        }
        return view('branchadmin.dropbox.getapi');
    }
    public function storeDropboxApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'access_token' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data=DropboxAPI::create($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Dropbox API added successfully');
                return redirect()->route('branchadmin.dropbox.index');
            } else {
                \Session::flash('alert-danger','Fail to add Dropbox API');
                return redirect()->route('dropbox.api');
            }

        }
    }

    public function editDropboxApi()
    {
        if($data = DropboxAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first()){
            return view('branchadmin.dropbox.editapi')->with("data",$data);
        }else{
            return redirect()->route('dropbox.api.create');
        }
    }
    public function updateDropboxApi(Request  $request)
    {
        $v= Validator::make($request->all(),
            [
                'access_token' => 'required',

            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                ->withInput();
        } else {
            $data= DropboxAPI::where("staff_id","=",$request->staff_id)->first();
            $data->update($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Dropbox API added successfully');
                return redirect()->route('dropbox.api.edit');
            } else {
                \Session::flash('alert-danger','Fail to add Dropbox API');
                return redirect()->route('dropbox.api.edit');
            }

        }
    }





}

