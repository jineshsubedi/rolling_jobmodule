<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Adjustmentreason extends Model
{
    protected $table = 'adjustmentreason';  
    protected $fillable = array('title', 'branch_id');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$reason = DB::table('adjustmentreason')->where('id', $id)->first();
    	if (isset($reason->title)) {
    		return $reason->title;
    	} else{
    		return '';
    	}
    }

    
}
