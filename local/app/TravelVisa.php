<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelVisa extends Model
{
    protected $table = 'travel_visa';  

    protected $fillable = array('planner_id', 'department_id', 'staff_id');

    protected $primaryKey = 'id';
}
