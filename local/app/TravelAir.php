<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelAir extends Model
{
    protected $table = 'travel_air';  

    protected $fillable = array('planner_id', 'airline_name', 'flight_number', 'departure_on', 'arrival_on');

    protected $primaryKey = 'id';
}
