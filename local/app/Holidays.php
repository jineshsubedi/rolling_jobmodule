<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Holidays extends Model
{
    protected $table = 'holidays';  

     protected $fillable = array('year', 'title','holiday');

     protected $primaryKey = 'id';

     public static function getTitle($id='')
    {
    	$type = DB::table('holidays')->where('id', $id)->first();
    	if (isset($type->title)) {
    		$title = $type->title;
    	}else{
    		$title = '';
    	}

    	return $title;
    }
}
