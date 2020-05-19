<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class AchievementCategory extends Model
{
     protected $table = 'achievement_category';  

    protected $fillable = array('title', 'branch_id');

    protected $primaryKey = 'id';

    
    public function Achievements()
    {
    	return $this->hasMany('App\Achievements');
    }

    public static function getTitle($id='')
    {
    	$data = '';
    	$ach = DB::table('achievement_category')->where('id', $id)->first();
    	if (isset($ach->id)) {
    		$data = $ach->title;
    	}
    	return $data;
    }
}
