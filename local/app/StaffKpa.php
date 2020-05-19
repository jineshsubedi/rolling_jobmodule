<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffKpa extends Model
{
    protected $table = 'staff_kpa';  

     protected $fillable = array('staff_id', 'title', 'kra_id');

     protected $primaryKey = 'id';

      public function AdjustmentStaff()
	    {
	    	return $this->hasMany('App\Adjustment_staff');
	    }
	    
	    
	    public static function getTitle($id='')
	    {
	    	$kra = DB::table('staff_kpa')->select('title')->where('id',$id)->first();
	    	if (isset($kra->title)) {
	    		return $kra->title;
	    	} else{
	    		return '';
	    	}
	    }
}
