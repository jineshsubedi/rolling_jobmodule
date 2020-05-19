<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Achievements extends Model
{
    protected $table = 'achievements';  

    protected $fillable = array('adjustment_staff_id', 'achievement_category_id', 'status', 'achievement_date', 'added_by','branch_id');

    protected $primaryKey = 'id';

    
    public function AchievementCategory()
    {
    	return $this->belongsTo('App\AchievementCategory');
    }
    public function Staffs()
    {
    	return $this->belongsTo('App\Adjustment_staff');
    }

    public static function checkAchievement($id,$type)
    {
    	$data = 0;
    	$data = DB::table('achievements')->where('adjustment_staff_id', $id)->where('achievement_category_id', $type)->where('status', 1)->where('achievement_date', date('Y-m-d'))->count();
    	return $data;
    }

    public static function countAchievement($id,$type)
    {
        return DB::table('achievements')->where('adjustment_staff_id', $id)->where('achievement_category_id', $type)->count();
    }

}
