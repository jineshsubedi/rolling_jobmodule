<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyTaskChat extends Model
{
    protected $table = 'daily_task_chat';

    protected $fillable = ['daily_task_id', 'chat_from', 'staff_id','message', 'status'];

    public static function getUnreadMessages($id)
    {
        return DailyTaskChat::where('daily_task_id',$id)->where('status', 0)->where('staff_id', auth()->guard('staffs')->user()->id)->count();
    }
    public function user()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'chat_from');
    }
}
