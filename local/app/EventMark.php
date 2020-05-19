<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class EventMark extends Model
{
    protected $table = 'event_mark';  

    protected $fillable = array('participant_id','evaluator_id','markOnCategory','average', 'total');
    protected $primaryKey = 'id';

    public static function getMarkByParticipant($id)
    {
        return EventMark::where('participant_id', $id)->get();
    }
}
