<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardWinner extends Model
{
     protected $table = 'award_winner';  
     protected $fillable = array('award_category_id','staff_id');
}
