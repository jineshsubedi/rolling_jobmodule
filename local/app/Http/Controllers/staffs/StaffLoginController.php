<?php
namespace App\Http\Controllers\staffs;
use App\GoogledriveAPI;
use App\Staffs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Mail;
use Validator;
use App\Imagetool;
use App\library\myFunctions;
use App\library\Settings;

class StaffLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/staffs';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
    public function getLogin()
    {
        
        if (auth()->guard('staffs')->user()) return redirect()->route('staffs.dashboard');
        return view('staffs.login');
    }
    public function getDriveApi()
    {
        if(GoogledriveAPI::where('staff_id','=',auth()->guard('staffs')->user()->id)->first())return redirect()->route('branchadmin.drive.index');
        return view('branchadmin.drive.getapi');
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
            $data=GoogledriveAPI::create($request->all());
            if ($data == true) {
                \Session::flash('alert-success','Google Drive API added');
                return redirect()->route('branchadmin.drive.index');
            } else {
                \Session::flash('alert-danger','Fail to add Google Drive API');
                return redirect()->route('googledrive.api');
            }

        }
    }




    public function staffAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('staffs')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => 1], $request->has('remember')))
        {
            // if(auth()->guard('staffs')->user()->staffType == 1){
            // return redirect()->route('supervisor.dashboard');    
            // }
            // elseif(auth()->guard('staffs')->user()->staffType == 3){
            // return redirect()->route('branchadmin.dashboard');    
            // }

            // else{

            // return redirect()->route('staffs.dashboard');
                
            // }

            return redirect()->route('branchadmin.jobs.index');
            
        }else{
             $errordata = array('email' => 'Username or Password is incorrect', );
                        return redirect()->back()->withErrors($errordata)
                        ->withInput();
        }
    }
    public function logout(Request $request){
        auth()->guard('staffs')->logout();
        \Cache::forget('user-is-online-'.$request->id);
        $request->session()->invalidate();
        return redirect('/staffs/login');
    }
  

  
}