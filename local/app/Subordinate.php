<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subordinate extends Model
{
    protected $table = 'subordinate';  

    protected $fillable = array('comment_to', 'comment_by', 'comment','comment_rating' );
}
