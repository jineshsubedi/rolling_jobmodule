<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BookingPurpose extends Model
{
     protected $table = 'booking_purpose';  
     protected $fillable = array('id','title');
     protected $primaryKey = 'id';

		public static function gettitle($id){
			$booking_purpose = DB::table('booking_purpose')->where('id', $id)->first();
			if(isset($booking_purpose->id)){
				$title = $booking_purpose->title;
			}
			else{
				$title = '';

			}

			return $title;
		}
}
