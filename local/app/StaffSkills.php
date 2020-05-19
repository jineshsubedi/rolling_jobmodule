<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffSkills extends Model
{
     protected $table = 'staff_skills';  

     protected $fillable = array('staff_id', 'title', 'score', 'weightage', 'potential');

     protected $primaryKey = 'id';

      public function AdjustmentStaff()
	    {
	    	return $this->hasMany('App\Adjustment_staff');
	    }
}
