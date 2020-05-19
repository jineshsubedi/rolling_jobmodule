<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LeaveType extends Model
{
    protected $table = 'leave_type';  

     protected $fillable = array('title', 'number_of_days', 'before_days', 'eligible', 'continious_leave', 'accrual_amount', 'branch_id');
    protected $primaryKey = 'id';

    public static function getTitle($id='')
    {
    	$type = DB::table('leave_type')->where('id', $id)->first();
    	if (isset($type->title)) {
    		$title = $type->title;
    	}else{
    		$title = '';
    	}

    	return $title;
    }
    
    
}
