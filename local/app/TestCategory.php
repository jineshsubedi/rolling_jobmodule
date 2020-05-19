<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class TestCategory extends Model
{
    protected $table = 'test_category';  

    protected $fillable = array('branch_id', 'title', 'description', 'seo_url');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$cat = DB::table('test_category')->where('id', $id)->first();
    	if (isset($cat->title)) {
    		return $cat->title;
    	}else{
    		return '';
    	}
    }
}