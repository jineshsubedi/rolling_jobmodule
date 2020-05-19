<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingMinute extends Model
{
    protected $table = 'meeting_minute';

    protected $fillable = ['branch_id', 'title', 'description', 'meeting_date', 'status'];
}
