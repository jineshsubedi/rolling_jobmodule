<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'ward';  

    protected $fillable = array('title', 'municipality_id');
    protected $primaryKey = 'id';
}
