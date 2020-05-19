<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notice';  

    protected $fillable = array('branch_id', 'title', 'description', 'publish_date', 'to_date');

    protected $primaryKey = 'id';

    public static function getNotice()
    {
    	$data = Notice::where('branch_id', auth()->guard('staffs')->user()->branch)
    	->where('publish_date', '<=', Date('Y-m-d'))
    	->where('to_date', '>=', Date('Y-m-d'))->get();
    	if(!$data){
    		return null;
    	}
    	return $data;
    }
}
