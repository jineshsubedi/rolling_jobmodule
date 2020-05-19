<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $table = 'event_participant';  

    protected $fillable = array('branch_id', 'name');
    protected $primaryKey = 'id';

    public static function getName($id)
    {
        $participant = EventParticipant::find($id);
        return $participant->name;
    }
    public static function getVote($id)
    {
        $participant = EventParticipant::find($id);
        return $participant->vote;
    }
    
}
