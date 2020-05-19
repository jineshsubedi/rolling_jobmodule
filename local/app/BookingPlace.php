<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BookingPlace extends Model
{
     protected $table = 'booking_place';  
     protected $fillable = array('id','title');
     protected $primaryKey = 'id';

public static function gettitle($id){
	$booking_place = DB::table('booking_place')->where('id', $id)->first();
	if(isset($booking_place->id)){
		$title = $booking_place->title;
	}
	else{
		$title = '';

	}

	return $title;
}

}
