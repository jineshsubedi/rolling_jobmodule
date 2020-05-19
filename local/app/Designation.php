<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Designation extends Model
{
    protected $table = 'designation';  

    protected $fillable = array('title', 'department_id', 'tor');
    protected $primaryKey = 'id';
    
     public $timestamps = false;

    public function Department()
    {
    	return $this->belongsTo('App\Department');
    }

    public static function getTitle($id)
    {
    	$cur = DB::table('designation')->where('id', $id)->first();
    	if (isset($cur->title)) {
    		$title = $cur->title;
    	} else{
    		$title = '';
    	}
    	return $title;
    }
    public static function getTor($id)
    {
    	$cur = DB::table('designation')->where('id', $id)->first();
    	if (isset($cur->title)) {
    		$tor = $cur->tor;
    	} else{
    		$tor = '';
    	}
    	return $tor;
    }
}
