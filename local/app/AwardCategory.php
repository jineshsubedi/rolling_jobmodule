<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AwardCategory extends Model
{
     protected $table = 'award_category';  
     protected $fillable = array('title','staff_id','branch_id','award_date');

     public static function getTitle($id='')
     {
     	$data = '';
     	$cat = DB::table('award_category')->where('id', $id)->first();
     	if (isset($cat->title)) {
     		$data = $cat->title;
     	}
     	return $data;
     }
}
