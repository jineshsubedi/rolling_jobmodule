<?php
namespace App\Http\Controllers\staffs;
use App\DropboxAPI;
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