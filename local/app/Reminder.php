<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminder';  

    protected $fillable = array('staff_id', 'note_id', 'description','status', 'date', 'time' );

    public function user()
    {
        return $this->belongsTo('App\Adjustment_staff','staff_id');
    }
}
