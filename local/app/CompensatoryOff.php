<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\library\CarbonInterval;
use DB;

class CompensatoryOff extends Model
{
    protected $table = 'compensatory_off';  

    protected $fillable = array('requested_by', 'work_day', 'branch_id', 'reason', 'inform_to', 'status', 'remarks');
    protected $primaryKey = 'id';

    public function AdjustmentStaff()
    {
    	return $this->belongsTo('App\Adjustment_staff');
    }

    public static function getStatus($id,$status)
	{
	    if ($status == 1) {
	    	$data = '<span class="label bg-green">Approved</span>';
	    } elseif ($status == 0) {
	    	$data = '<span class="label bg-blue">Waiting For Approval</span>';
	    } else{
	    	$data = '<span class="label bg-red pointer" onclick="viewRemarks('.$id.')">Canceled</span>';
	    }

	    return $data;
	}

	public static function getCompStatus($status)
	{
	    if ($status == 1) {
	    	$data = 'Approved';
	    } elseif ($status == 0) {
	    	$data = 'Waiting For Approval';
	    } else{
	    	$data = 'Canceled';
	    }

	    return $data;
	}

	public static function getRequest()
	{
		return DB::table('compensatory_off')->where('status', 0)->where('inform_to',auth()->guard('staffs')->user()->id)->count();
	}

	public static function countCompensatoryLeaveDays($id)
	{
		return CompensatoryOff::where('requested_by', $id)->where('leave_status', 1)->whereYear('created_at','=', Carbon::now()->year)->count();
	}

	public static function countCompensatoryRemainingDays($id)
	{
		return CompensatoryOff::where('requested_by', $id)->where('leave_status', 0)->whereYear('created_at','=', Carbon::now()->year)->count();
	}
}
