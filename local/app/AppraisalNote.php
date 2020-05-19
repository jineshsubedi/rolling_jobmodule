<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalNote extends Model
{
    	protected $table = 'appraisal_note';  
     	protected $fillable = array('note_to', 'note_from', 'rating', 'category', 'remarks', 'hide_staff', 'year', 'month');
     	protected $primaryKey = 'id';
}
