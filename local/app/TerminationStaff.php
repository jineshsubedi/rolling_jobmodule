<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TerminationStaff extends Model
{
    protected $table = 'termination_staff';  

    protected $fillable = array('branch_id', 'staff_id','termination_detail', 'start_date', 'end_date', 'justification_detail', 'justification_date', 'status', 'terminate_by', 'offBoarding_date');

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id');
    }
    public function user(){
        return $this->belongsTo('App\Adjustment_staff','staff_id');
    }
    public function authorize_user(){
        return $this->belongsTo('App\Adjustment_staff','terminate_by');
    }
    public function department_approval(){
        return $this->hasMany('App\DepartmentApproval','offboarding_id')->where('offboarding_type','termination');
    }
    public function getAll(){
        return TerminationStaff::orderBy('created_at','DESC')->paginate(10);
    }
    public function getTerminateStaffByBranch($id)
    {
        return TerminationStaff::where('branch_id',$id)->orderBy('created_at','desc')->paginate(50);
    }
    public function getTerminateDataById($id){
        return TerminationStaff::where('staff_id',$id)->orderBy('created_at','DESC')->paginate(10);
    }
    public function createTermination($request){
        $data = new TerminationStaff;
        $data->branch_id = $request->branch;
        $data->staff_id = $request->staff;
        $data->termination_detail = $request->termination_detail;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();
        return $data;
    }
    public function updateTermination($request, $id){
        $data = TerminationStaff::find($id);
        $data->branch_id = $request->branch;
        $data->staff_id = $request->staff;
        $data->termination_detail = $request->termination_detail;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();
        return $data;
    }
    public function updateTerminationStatus($request){
        $data = TerminationStaff::where('id', $request->id)->first();
        if($request->action=='HIRE'){
            $data->status = 'hire';
        }else{
            $data->offBoarding_date = $request->offBoarding_date;
            $data->status = 'terminate';
        }
        $data->terminate_by = Auth::user()->id;
        $data->save();
        return $data;
    }
    public function updateJustification($request){
        $data = TerminationStaff::where('id', $request->id)->first();
        $data->justification_detail = $request->justification_detail;
        $data->justification_date = $request->justification_date;
        $data->save();
        return $data;
    }
    public function getTerminationCount(){
        return TerminationStaff::count();
    }
    public static function getStaffTermination($id)
    {
        return TerminationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('staff_id',$id)->where('status','unprocess')->count();
    } 
    public static function getSupervisorTermination($id)
    {
        return TerminationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('staff_id',$id)->where('status','unprocess')->count();
    } 
    public static function getHrTermination()
    {
        return TerminationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('status','unprocess')->count();
    }
    public static function getAdminTerminationCount()
    {
        return TerminationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('status','unprocess')->count();
    }
}
