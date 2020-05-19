<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffKpi extends Model
{
     protected $table = 'staff_kpi';  

     protected $fillable = array('staff_id', 'title');

     protected $primaryKey = 'id';

      public function AdjustmentStaff()
	    {
	    	return $this->hasMany('App\Adjustment_staff');
	    }
}
