<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewEvent extends Model
{
    protected $table = 'new_event';  

    protected $fillable = array('title', 'branch_id', 'description', 'from', 'to', 'attachment');

    protected $primaryKey = 'id';
}
