<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LeaveSetting extends Model 
{
    protected $table = 'leave_setting';  

     protected $fillable = array('start_date', 'end_date', 'quarter', 'half', 'revenue_upload', 'manage_person', 'exclude_holiday', 'exclude_weekend', 'branch_id', 'approve_person', 'chairman', 'accrual', 'handover_required', 'approve_required', 'chairman_required', 'supervisor_required', 'accrual_basis');
    protected $primaryKey = 'id';
    

    public static function getUploader()
    {
    	$setting = DB::table('leave_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->first();
    	if (isset($setting->id)) {
    		return $setting->revenue_upload;
    	}else{
    		return 0;
    	}
    }
    
    public static function getManager()
    {
        $setting = DB::table('leave_setting')->where('branch_id', auth()->guard('staffs')->user()->branch)->first();
        if (isset($setting->id)) {
            return $setting->manage_person;
        }else{
            return 0;
        }
    }
    
}
