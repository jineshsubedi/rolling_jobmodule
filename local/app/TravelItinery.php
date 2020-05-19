<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelItinery extends Model
{
    protected $table = 'travel_itinery';  

    protected $fillable = array('planner_id', 'date', 'travel_from', 'travel_to', 'time_from', 'time_to', 'description');

    protected $primaryKey = 'id';
}
