<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\JobLocation;


class JobLocationController extends Controller
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
        $joblocation = JobLocation::paginate(50);
        return view('branchadmin.joblocation.index')->with('data',$joblocation);
    }

    public function create()
    {
        return view('branchadmin.joblocation.newform');
    }
    public function store(Request $request)
    {
      
        
       
        $v= Validator::make($request->all(),
            [
                    
                    'name' => 'required|min:3|unique:job_location',
                    
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else 
            {
               
                
                $joblocation=JobLocation::create(['name' => $request->name]);
                if($joblocation)
                {
                    
                    \Session::flash('alert-success','Record have been saved Successfully');
                    return redirect()->route('branchadmin.job_location.index');

                } else {

                    \Session::flash('alert-danger','Something Went Wrong on Saving Data');
                    return redirect()->route('branchadmin.job_location.index'); 
                
                }
               
                

            }
        
    }

    public function destroy($id)
    {
        $i = JobLocation::where('id',$id)->delete();
        if($i)
        {
            
            \Session::flash('alert-success','Record deleted Successfully');
                    return redirect()->route('branchadmin.job_location.index');
        }
        else 
        {
           \Session::flash('alert-danger','Something Went Wrong on Deleting data');
                    return redirect()->route('branchadmin.job_location.index'); 
        }
    }

    public function edit($id)
    {
       $datas= JobLocation::where('id',$id)->first();
       if($datas) {
        return view('branchadmin.joblocation.editform')->with('data',$datas);
        } else {
            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->route('branchadmin.job_location.index'); 
        }
    }

    public function update(Request $request)
    {
            $v= Validator::make($request->all(),
            [
                'name' => 'required|min:3||unique:job_location,name,'.$request->id.',id',
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v);
        } else 
            {
                $user= JobLocation::where('id',$request->id)->update(['name' => $request->name]);
                if($user)
                {
                    \Session::flash('alert-success','Record have been updated Successfully');
                    return redirect()->route('branchadmin.job_location.index');
                }
                else {
                    \Session::flash('alert-danger','Something Went Wrong on Updating Data');
                    return redirect()->route('branchadmin.job_location.index'); 
                }
            }
    }
}
