<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destrict extends Model
{
    protected $table = 'destrict';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';
}
