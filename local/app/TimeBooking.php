<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeBooking extends Model
{
     protected $table = 'time_booking';  
     protected $fillable = array('place','booked_by', 'booking_date', 'booking_time', 'description', 'to_date', 'to_time');
     protected $primaryKey = 'id';
}
