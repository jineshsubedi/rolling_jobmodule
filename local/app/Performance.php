<?php

namespace App;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    protected $table = 'performance';  

    protected $fillable = array('performance_of', 'comment_by', 'comment','comment_rating' );

    public static function checkPerformanceReport($period)
    {
        $day = Carbon::today()->day;
        if($period == 1 && $day > 23 && $day <= 28){
            $month = [1,2,3,4,5,6,7,8,9,10,11,12];
        }elseif($period == 2 && $day > 25 && $day <= 30){
            $month = [3,6,9,12];
        }elseif($period == 3 && $day > 26 && $day <= 30){
            $month = [6, 12];
        }elseif($period == 4 && $day > 26 && $day <= 31){
            $month = [12];
        }else{
            $month = [0];
        }
        $m = Carbon::today()->month;
        if(in_array($m, $month)){
            $quarter = Carbon::today()->format('Y-m');
            $staffs = DB::table('adjustment_staff')->where('supervisor', auth()->guard('staffs')->user()->id)->where('status', 1)->count();
            $check = Performance::where('comment_by', auth()->guard('staffs')->user()->id)->where('created_at', 'LIKE', '%'.$quarter.'%')->count();
            if($staffs == $check){
                return false;
            }
            return true;
        }
        return false;
    }
}
