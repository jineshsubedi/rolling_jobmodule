<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class TravelPlanner extends Model
{
    protected $table = 'travel_planner';  

    protected $fillable = array('branch_id','travel_id', 'staff_id', 'supervisor_approval', 'hr_approval', 'chairman_approval');

    protected $primaryKey = 'id';

    public static function countWaitingApproval()
    {
    	$setting = \App\LeaveSetting::where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      	$ids = \App\Adjustment_staff::select('id')->where('supervisor', auth()->guard('staffs')->user()->id)->get();
        $id = [];
        foreach ($ids as $key => $value) {
          $id[]= $value->id;
        }
      	$data = DB::table('travel_planner')->where('supervisor_approval', 0)->whereIn('staff_id', $id)->count();

      	if($setting->approve_person == auth()->guard('staffs')->user()->id)
      	{
        	$data += DB::table('travel_planner')->where('supervisor_approval', 1)->where('hr_approval', 0)->count();
        
      	}elseif ($setting->chairman == auth()->guard('staffs')->user()->id) {
        	$data += DB::table('travel_planner')->where('supervisor_approval', 1)->where('hr_approval', 1)->where('chairman_approval', 0)->count();

      	}
      	return $data;
    }
}
