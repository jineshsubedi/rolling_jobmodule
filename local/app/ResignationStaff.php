<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResignationStaff extends Model
{
    protected $table = 'resignation_staff';  

    protected $fillable = array('branch_id', 'staff_id','resignation_detail', 'resignation_date', 'status', 'approval_by', 'approval_detail', 'approval_date', 'offBoarding_date', 'settlement_letter');

    public function branch(){
        return $this->belongsTo('App\Branch','branch_id');
    }
    public function user(){
        return $this->belongsTo('App\Adjustment_staff','staff_id');
    }
    public function authorize_user(){
        return $this->belongsTo('App\Adjustment_staff','approval_by');
    }
    public function supervisor_user(){
        return $this->belongsTo('App\Adjustment_staff','supervisor');
    }
    public function department_approval(){
        return $this->hasMany('App\DepartmentApproval','offboarding_id')->where('offboarding_type','resignation');
    }
    public function getAll(){
        return ResignationStaff::orderBy('created_at','DESC')->paginate(50);
    }
    public function getResignStatusById($id){
        return ResignationStaff::where('staff_id',$id)->orderBy('created_at','DESC')->pluck('status');
    }
    public function getStaffById($id){
        return ResignationStaff::orWhere('staff_id',$id)
                            ->orWhere('supervisor',$id)
                            ->orderBy('created_at','DESC')
                            ->paginate(10);
    }
    public function find($id){
        return ResignationStaff::where('id', $id)->first();
    }
    public static function getStaffResignation($id)
    {
        return ResignationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('supervisor',$id)->where('supervisor_approval_date',NULL)->count();
    }
    public static function getSupervisorResignation($id)
    {
        return ResignationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('supervisor',$id)->where('supervisor_approval_date',NULL)->count();
    }
    public static function getHrResignation()
    {
        return ResignationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('supervisor_approval_status', 'approved')->where('status','unapproved')->count();
    }
    public static function getAdminResignationCount(){
        return ResignationStaff::where('branch_id', auth()->guard('staffs')->user()->id)->where('status','unapproved')->count();
    }
}
