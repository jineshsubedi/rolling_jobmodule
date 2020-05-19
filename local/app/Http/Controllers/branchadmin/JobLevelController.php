<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\JobLevel;


class JobLevelController extends Controller
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
       
        $joblevel = JobLevel::paginate(50);
        return view('branchadmin.joblevel.index')->with('data',$joblevel);
    }

     public function create()
    {
        return view('branchadmin.joblevel.newform');
    }
    public function store(Request $request)
    {
       
        $v= Validator::make($request->all(),
            [
                    
                    'name' => 'required|min:3|unique:job_level',
                    
            ]);
        if($v->fails())
        {
            return redirect()->back()->withErrors($v)
                        ->withInput();
        } else 
            {
               
                
                $joblevel=JobLevel::create(['name' => $request->name, 'sortOrder'=> $request->sortOrder]);
                if($joblevel)
                {
                    
                    \Session::flash('alert-success','Record have been saved Successfully');
                    return redirect()->route('branchadmin.job_level.index');

                } else {

                    \Session::flash('alert-danger','Something Went Wrong on Saving Data');
                    return redirect()->route('branchadmin.job_level.index'); 
                
                }
               
                

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
            return view('branchadmin.joblevel.editform')->with('data',$datas);
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
