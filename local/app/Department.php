<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Department extends Model
{
    protected $table = 'department';  

    protected $fillable = array('title', 'leave_number', 'max_leave', 'branch_id', 'department_head');
    protected $primaryKey = 'id';
    
     public $timestamps = false;

    public function Designations()
    {
    	return $this->hasMany('App\Designation');
    }

    public static function getTitle($id)
    {
    	$cur = DB::table('department')->where('id', $id)->first();
    	if (isset($cur->title)) {
    		$title = $cur->title;
    	} else{
    		$title = '';
    	}
    	return $title;
    }

    public static function getLeave($id)
    {
        $cur = DB::table('department')->where('id', $id)->first();
        if (isset($cur->leave_number)) {
            $leave_number = $cur->leave_number;
        } else{
            $leave_number = 0;
        }
        return $leave_number;
    }

    public static function getAllDepartment()
    {
        return Department::where('branch_id', auth()->guard('staffs')->user()->branch)->orderBy('title', 'asc')->get();
    }
    public static function isDeptHead()
    {
        $data = Department::where('id', auth()->guard('staffs')->user()->department)->where('department_head', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
}
