<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventEvaluator extends Model
{
    protected $table = 'event_evaluator';  

    protected $fillable = array('branch_id', 'name');
    protected $primaryKey = 'id';

    public static function getName($id)
    {
        $data = EventEvaluator::find($id);
        return $data->name;
    }
}
