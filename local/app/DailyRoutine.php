<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DailyRoutine extends Model
{
    protected $table = 'daily_routine';

    protected $fillable = ['staff_id', 'en_year', 'en_month','en_day', 'np_year', 'np_month', 'np_day', 'start_time', 'finish_time', 'description', 'kra', 'task_id', 'type', 'status', 'duration', 'estimated_duration', 'remarks'];

    public function staff_kra()
    {
        return $this->belongsTo('\App\StaffKra', 'kra');
    }
    public static function getSubOrdinateTasks()
    {
        return DailyRoutine::leftjoin('adjustment_staff', function($join){
            $join->on('daily_routine.staff_id','=','adjustment_staff.id');
        })
        ->where('adjustment_staff.branch', auth()->guard('staffs')->user()->branch)
        ->where('adjustment_staff.supervisor', auth()->guard('staffs')->user()->id)
        ->whereDate('daily_routine.created_at', '<', Carbon::now())
        ->select('daily_routine.description')
        ->get();
    }
    public static function getStaffTaks($id)
    {
        return DailyRoutine::where('staff_id', $id)->where('status', 0)->select('description')->orderBy('created_at', 'DESC')->get();
    }
    public function adjustment_staff()
    {
        return $this->belongsTo('\App\adjustment_staff', 'staff_id');
    }
}
