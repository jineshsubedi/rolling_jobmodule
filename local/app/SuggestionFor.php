<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SuggestionFor extends Model
{
     protected $table = 'suggestion_for';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';

    public function SuggestionBox()
    {
    	return $this->hasMany('App\SuggestionBox');
    }


    public static function getTitle($id)
    {
    	$size = DB::table('suggestion_for')->where('id', $id)->first();
    	if (isset($size->title)) {
    		# code...
    		$title = $size->title;
    	}else {
    		$title = '';
    	}

    	return $title;
    }
}
