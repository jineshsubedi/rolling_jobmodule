<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelPlannerComment extends Model
{
    protected $table = 'travel_planner_comment';  

    protected $fillable = array('planner_id', 'detail', 'reply_by');

    protected $primaryKey = 'id';
}
