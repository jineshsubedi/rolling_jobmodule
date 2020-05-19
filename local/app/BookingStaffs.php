<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class BookingStaffs extends Model
{
    protected $table = 'booking_staffs';  
     protected $fillable = array('booking_id','staff_id', 'status','remarks');
     protected $primaryKey = 'id';


     public static function allApprovalWaiting($id)
     {
          $booking = DB::table('hall_booking')->select('id')->where('booking_date', '>=', date('Y-m-d'))->get();
          $booking_id = [];
          foreach ($booking as $key => $value) {
               $booking_id[] = $value->id;
          }
     	$waiting = DB::table('booking_staffs')->whereIn('booking_id',$booking_id)->where('staff_id', $id)->where('status', 0)->count();
     	return $waiting;
     }

     public static function ApprovalWaiting($meeting)
     {
     	$waiting = DB::table('booking_staffs')->where('booking_id',$meeting)->where('status', 0)->count();
     	return $waiting;
     }

     public static function ApprovalAccepted($meeting)
     {
     	$waiting = DB::table('booking_staffs')->where('booking_id',$meeting)->where('status', 1)->count();
     	return $waiting;
     }

     public static function ApprovalRejected($meeting)
     {
     	$waiting = DB::table('booking_staffs')->where('booking_id',$meeting)->where('status', 2)->count();
     	return $waiting;
     }
}
