<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AttendanceMeeting extends Model
{
    protected $table = 'attendance_meeting';  

    protected $fillable = array('adjustment_staff_id','branch_id', 'meeting_date', 'out_time', 'out_location', 'meeting_time', 'meeting_location', 'company', 'outcome', 'meeting_with', 'image', 'in_time', 'in_location');

    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }

    public static function checkOutMeeting($id='')
    {
    	//$meeting = DB::table('attendance_meeting')->where('adjustment_staff_id', $id)->where('meeting_date', date('Y-m-d'))->where('out_time', '!=', '')->where('meeting_time', '')->count();
    	$checkin = DB::table('attendance_meeting')->where('adjustment_staff_id', $id)->where('meeting_date', date('Y-m-d'))->where('out_time', '!=', '')->where('in_time', '')->count();
    	if($checkin > 0) {
    		return '1';
    	} else{
    		return '';
    	}
    }
}
