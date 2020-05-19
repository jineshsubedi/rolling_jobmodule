<?php

namespace App\Http\Controllers\branchadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use App\Branch;
use App\BranchSetting;
use App\Adjustment_staff;
use App\Department;
use App\PerformanceSetting;
use App\OnBoardStaff;
use File;

class BranchController extends Controller
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

    public function index(Request $request)
    {
      
        $branch_setting = BranchSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->orderBy('id','desc')->first();
        

        $data['staffs'] = Adjustment_staff::where('branch', auth()->guard('staffs')->user()->branch)->where('status', 1)->orderBy('name', 'asc')->get();

        $data['yesno'][] = ['value' => 1, 'title' => 'Yes'];
        $data['yesno'][] = ['value' => 0, 'title' => 'No'];

        $data['ne'][] = ['value' => 1, 'title' => 'Nepali Date'];
        $data['ne'][] = ['value' => 2, 'title' => 'English Date'];

        $data['duration'][] = ['value' => 1, 'title' => 'Real Time'];
        $data['duration'][] = ['value' => 2, 'title' => 'Half Monthly'];
        $data['duration'][] = ['value' => 3, 'title' => 'Monthly'];
        $data['duration'][] = ['value' => 4, 'title' => '3 Monthly'];
        $data['duration'][] = ['value' => 5, 'title' => '6 Monthly'];
        $data['duration'][] = ['value' => 6, 'title' => 'Yearly'];

        $data['client_rating'][] = ['value' => 1, 'title' => 'Monthly'];
        $data['client_rating'][] = ['value' => 2, 'title' => '3 Monthly'];
        $data['client_rating'][] = ['value' => 3, 'title' => '6 Monthly'];
        $data['client_rating'][] = ['value' => 4, 'title' => 'Yearly'];
        $data['client_rating'][] = ['value' => 5, 'title' => 'Manually'];

        $data['performance_rating'][] = ['value' => 1, 'title' => 'Monthly'];
        $data['performance_rating'][] = ['value' => 2, 'title' => '3 Monthly'];
        $data['performance_rating'][] = ['value' => 3, 'title' => '6 Monthly'];
        $data['performance_rating'][] = ['value' => 4, 'title' => 'Yearly'];

        $data['branch'] = $branch_setting;
        
        $data['performances'] = PerformanceSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->orderBy('id','asc')->get();
        $data['department'] = Department::where('branch_id', auth()->guard('staffs')->user()->branch)->orderBy('title', 'asc')->get();
        // return $data;         
        return view('branchadmin.branch.index')->with('data',$data);
    }

    public function update(Request $request)
    {
        //dd($request->all());
       $this->validate($request, [
        'id' => 'required',
        'performance.*.title' => 'required' ,
        'performance.*.duration' => 'required',
        'performance.*.parameter' => 'required',
        'performance_rating_type' => 'required',
        'attendance_handler' => 'required',
        'account_handler' => 'required',
        'hr_handler' => 'required',
        'hr_handler' => 'required',
        'staff_handler' => 'required',
        'survey_handler' => 'required',
        'training_handler' => 'required',
       ]);
       $imagehandler = BranchSetting::getAccountHandler();
       $image = $imagehandler->account_handler_signature;   
       if($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);
            //replace signature with new one based on branch
            $branchData = BranchSetting::find($request->id);
            if (is_file(DIR_IMAGE.$branchData->account_handler_signature)) {
                File::delete(DIR_IMAGE.$branchData->account_handler_signature);
            }
            //save new image
            $file = $request->file('image');
            $name = 'signature/'.str_random(10).'.'.$file->getClientOriginalExtension();
            $file->move(DIR_IMAGE.'signature/',$name);
            $image = $name;
        }

        $data = [
            'branch_id' => auth()->guard('staffs')->user()->branch,
            'revenue' => $request->revenue,
            'client' => $request->client, 
            'performance_rater' => $request->rater,
            'client_comment' => $request->client_comment,
            'comment_type' => $request->comment_type,
            'email' => $request->email,
            'salary_calculate' => $request->salary_calculate,
            'canteen' => $request->canteen,
            'performance_rating_type' => $request->performance_rating_type,
            'attendance_handler' => $request->attendance_handler,
            'account_handler' => $request->account_handler,
            'account_handler_signature' => $image,
            'hr_handler' => $request->hr_handler,
            'staff_handler' => $request->staff_handler,
            'survey_handler' => $request->survey_handler,
            'training_handler' => $request->training_handler,
        ];
        $setting = BranchSetting::where('id', $request->id)->update($data);
        if($setting){
            
            $ids = [];
            foreach($request->performance as $pff)
            {
                $ids[]= $pff['p_id'];
            }
            PerformanceSetting::where('branch_id',auth()->guard('staffs')->user()->branch)->whereNotIn('id',$ids)->delete();
            foreach($request->performance as $pf)
            {
                $datas = [
                    'branch_id' => auth()->guard('staffs')->user()->branch,
                    'title' => $pf['title'],
                    'duration' => $pf['duration'],
                    'parameter' => $pf['parameter']
                    ];
                if($pf['p_id'] == 0)
                {
                PerformanceSetting::create($datas);
                } else{
                    PerformanceSetting::where('id',$pf['p_id'])->update($datas);
                }
            }
        }
       
        \Session::flash('alert-success','Record have been updated Successfully');
        return redirect()->back();
    }

    public function branchIndex(Request $request)
    {
        $branches = Branch::orderBy('name')->paginate(20);
        return view('branchadmin.branch.crud.index', compact('branches'));
    }
    public function branchcreate()
    {
        return view('branchadmin.branch.crud.create');
    }
    public function branchSave(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        $branch = Branch::create([
            'name' => $request->name,
        ]);
        \App\BranchSetting::create(['branch_id' => $branch->id]);
        \App\LeaveSetting::create(['branch_id' => $branch->id]);
        \Session::flash('alert-success','branch has been created');
        return redirect()->route('branchadmin.branch.branchIndex');
    }
    public function branchEdit($id)
    {
        $branch = Branch::find($id);
        return view('branchadmin.branch.crud.edit', compact('branch'));
    }
    public function branchUpdate($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
        ]);
        Branch::find($id)->update([
            'name' => $request->name,
        ]);
        \Session::flash('alert-success','Branch has been updated');
        return redirect()->route('branchadmin.branch.branchIndex');
    }
    public function branchDelete($id)
    {
        if(\App\Branch::isParent($id)){
            \Session::flash('alert-danger','This branch cound not be deleted');
            return redirect()->route('branchadmin.branch.branchIndex');
        }
        $branch = Branch::find($id);
        if($branch->staffs != 0){
            \Session::flash('alert-danger','This branch has staffs');
            return redirect()->route('branchadmin.branch.branchIndex');
        }
        $branch->delete();
        
        \Session::flash('alert-success','branch has been deleted');
        return redirect()->route('branchadmin.branch.branchIndex');
    }
    
}
