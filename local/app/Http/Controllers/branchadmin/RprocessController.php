<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\RecruitmentProcess;

class RprocessController extends Controller
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
         
        $datas = RecruitmentProcess::orderBy('id', 'asc')->paginate(50);

        $rp = ['1','3','4','7','10','13','16'];
                    
        return view('branchadmin.rprocess.index')->with('data',$datas)->with('rp', $rp);
    }

     public function create()
    {
                 
        return view('branchadmin.rprocess.newform');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
        ]);
        $rprocess=RecruitmentProcess::create(['title' => $request->title, 'description' => $request->description]);
        if($rprocess)
        {
            \Session::flash('alert-success','Record have been saved Successfully');
            return redirect()->route('branchadmin.recruitment_process.index');
        } else {
            \Session::flash('alert-danger','Something Went Wrong on Saving Data');
            return redirect()->route('branchadmin.recruitment_process.index'); 
        }
    }

    public function destroy($id)
    {
      $rp = ['1','3','4','7','10','13','16'];
      if (in_array($id, $rp)) {
        \Session::flash('alert-danger','Sorry! you can not delete this process');
                  return redirect()->route('branchadmin.recruitment_process.index'); 
      }
      $i= RecruitmentProcess::where('id',$id)->delete();
      if($i)
      {
          \Session::flash('alert-success','Record deleted Successfully');
                  return redirect()->route('branchadmin.recruitment_process.index');
      }
      else 
      {
          \Session::flash('alert-danger','Something Went Wrong on Deleting data');
                  return redirect()->route('branchadmin.recruitment_process.index'); 
      }
    }

    public function edit($id)
    {
      $datas= RecruitmentProcess::where('id',$id)->first();
      if($datas) {
      return view('branchadmin.rprocess.editform')->with('data',$datas);
      } else {
            \Session::flash('alert-danger','You choosed wrong Data');
                  return redirect()->route('branchadmin.recruitment_process.index'); 
      }
    }

    public function update(Request $request)
    {
      $this->validate($request, [
          'title' => 'required|min:3',
              
      ]);
              
      $user= RecruitmentProcess::where('id',$request->id)->update(['title' => $request->title, 'description' => $request->description]);
      if($user)
      {
          \Session::flash('alert-success','Record have been updated Successfully');
          return redirect()->route('branchadmin.recruitment_process.index');
      }
      else {
          \Session::flash('alert-danger','Something Went Wrong on Updating Data');
          return redirect()->route('branchadmin.recruitment_process.index'); 
      }
    }
}
