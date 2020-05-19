<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BookingHall extends Model
{
    protected $table = 'booking_hall';  
     protected $fillable = array('place_id','title');
     protected $primaryKey = 'id';

public static function gettitle($id){
	$booking_hall = DB::table('booking_hall')->where('id', $id)->first();
	if(isset($booking_hall->id)){
		$title = $booking_hall->title;
	}
	else{
		$title = '';

	}

	return $title;
}
}
