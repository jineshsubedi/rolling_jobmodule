<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelRoad extends Model
{
    protected $table = 'travel_road';  

    protected $fillable = array('planner_id', 'vehicle_number', 'driver_name', 'driver_number', 'vendor_name', 'bus_number');

    protected $primaryKey = 'id';
}
