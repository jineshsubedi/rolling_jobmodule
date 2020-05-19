<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentApproval extends Model
{
    protected $table = 'department_approval';

    public function resignation_staff(){
        return $this->belongsTo('App\ResignationStaff','offboarding_id');
    } 
    public function termination_staff(){
        return $this->belongsTo('App\TerminationStaff','offboarding_id');
    } 
    public function department(){
        return $this->belongsTo('App\Department','department_id');
    }
    public static function getDepartmentApproval($id, $type)
    {
        return DepartmentApproval::where('offboarding_id',$id)->where('offboarding_type',$type)->get();
    } 
    public static function departmentApproval($id, $type)
    {
        return DepartmentApproval::where('offboarding_id',$id)
                                    ->where('offboarding_type',$type)
                                    ->where('status', null)
                                    ->count();
    }
    public static function getSupervisorApprovalCount($id)
    {
        return DepartmentApproval::where('department_id', $id)->where('status',NULL)->count();
    }
    public static function getAdminApprovalCount($id)
    {
        return DepartmentApproval::where('department_id', $id)->where('status',NULL)->count();
    } 
}
