<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
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
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $messages = LaravelGmail::message()->in('INBOX')->preload()->all();
        return view('branchadmin.gmail.index')->with('data',$messages);
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
            return redirect()->route('branchadmin.job_level.index');
        }
    }

    public function destroy($id)
    {
        if($id)
        {
            JobLevel::find($id)->delete();
            \Session::flash('alert-success','Record deleted Successfully');
            return redirect()->route('branchadmin.job_level.index');
        }
        else 
        {
           \Session::flash('alert-danger','Something Went Wrong on Deleting data');
            return redirect()->route('branchadmin.job_level.index'); 
        }
    }

    public function edit($id)
    {
        $datas = JobLevel::find($id);
       if($datas) {
            return view('branchadmin.gmail.editform')->with('data',$datas);
        } else {
            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->route('branchadmin.job_level.index'); 
        }
    }
    public function update($id, Request $request)
    {
        $v= Validator::make($request->all(),
        [
            'name' => 'required|min:3||unique:job_level,name,'.$request->id.',id',
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
                    return redirect()->route('branchadmin.job_level.index');
                }
                else {
                    \Session::flash('alert-danger','Something Went Wrong on Updating Data');
                    return redirect()->route('branchadmin.job_level.index'); 
                }
            }
    }
}
