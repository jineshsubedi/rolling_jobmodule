<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BranchSetting extends Model
{
    protected $table = 'branch_setting';  

    protected $fillable = array('branch_id', 'revenue', 'client', 'performance','performance_rater','salary_calculate', 'account_handler', 'account_handler_signature', 'hr_handler');

    protected $primaryKey = 'id';

    
    public function Branch()
    {
    	return $this->belongsTo('App\Branch');
    }

    public static function getPerformanceRater($branch_id)
    {
    	$data = '';
    	$bs = DB::table('branch_setting')->select('performance_rater')->where('branch_id', $branch_id)->first();
    	if (isset($bs->performance_rater)) {
    		$data = $bs->performance_rater;
    	}

    	return $data;

    }

    public static function getClient($branch_id)
    {
        $data = '';
        $bs = DB::table('branch_setting')->select('client')->where('branch_id', $branch_id)->first();
        if (isset($bs->client)) {
            $data = $bs->client;
        }

        return $data;

    }

    public static function getCanteen($branch_id)
    {
        $data = '';
        $bs = DB::table('branch_setting')->select('canteen')->where('branch_id', $branch_id)->first();
        if (isset($bs->canteen)) {
            $data = $bs->canteen;
        }

        return $data;

    }

    public static function getPerformanceRatingTime($branch_id){
        $data = DB::table('branch_setting')->select('performance_rating_type')->where('branch_id', $branch_id)->first();
        return $data->performance_rating_type;
    }

    public static function getAttendanceHandler($staff_id, $branch_id){
        $data = DB::table('branch_setting')->select('attendance_handler')->where('branch_id', $branch_id)->where('attendance_handler', $staff_id)->first();
        if(isset($data->attendance_handler)){
            return true;
        }
        return false;
    }

    public static function getSalaryCalculate(){
        $branch = auth()->guard('staffs')->user()->branch;
        $data = DB::table('branch_setting')->select('salary_calculate')->where('branch_id', $branch)->first();
        return $data->salary_calculate;
    }

    public static function getAccountHandler(){
        $branch = auth()->guard('staffs')->user()->branch;
        $data = DB::table('branch_setting')->select('account_handler', 'account_handler_signature')->where('branch_id', $branch)->first();
        return $data;
    }
    public static function payrollViewer(){
        $data1 = DB::table('adjustment_staff')->where('id',auth()->guard('staffs')->user()->id)->where('branch', 2)->where('department', 4)->first();
        $data2 = DB::table('branch_setting')->where('account_handler', auth()->guard('staffs')->user()->id)->where('branch_id', auth()->guard('staffs')->user()->branch)->first();
        if($data1 || $data2){
            return true;
        }
        return false;
    }

    public static function isAccountHandler(){
        $data = DB::table('branch_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('account_handler', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
    public static function isHrHandler(){
        $data = DB::table('branch_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('hr_handler', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
    public static function isStaffHandler(){
        $data = DB::table('branch_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('staff_handler', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
    public static function isSurveyHandler(){
        $data = DB::table('branch_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('survey_handler', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }
    public static function isTrainingHandler(){
        $data = DB::table('branch_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->where('training_handler', auth()->guard('staffs')->user()->id)->first();
        if($data){
            return true;
        }
        return false;
    }


}
