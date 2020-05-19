<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AppraisalCategory extends Model
{
    	protected $table = 'appraisal_category';  
     	protected $fillable = array('title', 'hide_staff', 'rating', 'added_person');
     	protected $primaryKey = 'id';

     	public static function getTitle($id='')
     	{
     		$title = '';
     		$cat = DB::table('appraisal_category')->select('title')->where('id', $id)->first();
     		if (isset($cat->title)) {
     			$title = $cat->title;
     		}
     		return $title;
     	}
}
