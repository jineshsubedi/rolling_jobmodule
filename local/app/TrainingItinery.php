<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingItinery extends Model
{
    protected $table = 'training_itinery';  

    protected $fillable = array('training_id', 'date', 'topic', 'start_time', 'end_time', 'duration');

    protected $primaryKey = 'id';

    public static function getTotalDuration($training_id)
    {
    	return TrainingItinery::where('training_id', $training_id)->sum('duration');
    }
}
