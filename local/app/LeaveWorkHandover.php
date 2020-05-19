<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LeaveWorkHandover extends Model
{
    protected $table = 'leave_work_handover';  

    protected $fillable = array('handover_to', 'leave_request_id', 'accept_status', 'description');
    protected $primaryKey = 'id';
    
    public function leaveRequest()
    {
    	return $this->belongsTo('App\LeaveRequest');
    }

    public static function getAllRequest()
    {
    	return DB::table('leave_work_handover')->where('handover_to', auth()->guard('staffs')->user()->id)->where('accept_status', 0)->count();
    }


    public static function getStatus($id)
    {
    	$hand = DB::table('leave_work_handover')->where('id', $id)->first();
    	if (isset($hand->id)) {
    		if ($hand->accept_status == 1) {
    			$status = '<span class="label bg-green">Accepted</span>';
    		} elseif ($hand->accept_status == 2) {
    			$status = '<span class="label bg-red pointer" onclick="viewAcceptStatus('.$id.')">Decline</span><input type="hidden" id="acpt_status_'.$id.'" value="'.$hand->description.'">';
    		} else{
    			$status = '<span class="label bg-blue">Waiting</span>';
    		}
    	} else{
    		$status = '';
    	}

    	return $status;
    }
}
