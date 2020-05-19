<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class StaffKra extends Model
{
     protected $table = 'staff_kra';  

     protected $fillable = array('staff_id', 'title', 'weightage');

     protected $primaryKey = 'id';

      public function AdjustmentStaff()
	    {
	    	return $this->hasMany('App\Adjustment_staff');
	    }
	    
	    
	    public static function getTitle($id='')
	    {
	    	$kra = DB::table('staff_kra')->select('title')->where('id',$id)->first();
	    	if (isset($kra->title)) {
	    		return $kra->title;
	    	} else{
	    		return '';
	    	}
	    }
	    
	    public static function getPercent($id)
	    {
	        $kra = DB::table('staff_kra')->where('id', $id)->first();
	         $dat = '0.00';
	        if(isset($kra->id))
	        {
	            $total_task = DB::table('staff_task')->where('task_to',$kra->staff_id)->where('kra', '>', '0')->count();
	            $total_kratask = DB::table('staff_task')->where('task_to',$kra->staff_id)->where('kra',$kra->id)->count();
	            if($total_kratask > 0){
	            $dat = ($total_kratask * 100) / $total_task ;
	            $dat = number_format($dat, 2, '.', '');
	            }
	        } 
	        
	        return $dat;
	    }
}
