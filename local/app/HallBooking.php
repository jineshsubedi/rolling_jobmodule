<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HallBooking extends Model
{
    protected $table = 'hall_booking';  
    protected $fillable = array('place_id','hall_id', 'others', 'booked_by', 'booking_date', 'booking_time', 'description', 'to_date', 'to_time', 'purpose', 'other_purpose');
    protected $primaryKey = 'id';

	
}
