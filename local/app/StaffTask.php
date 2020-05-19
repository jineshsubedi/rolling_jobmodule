<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class StaffTask extends Model
{
     protected $table = 'staff_task';  

     protected $fillable = array('task_to', 'weightage', 'task_from','title', 'accept_status', 'priority', 'complete_status', 'start_time', 'finish_time', 'remarks', 'description', 'project', 'kra', 'personal', 'num_task', 'parent_id', 'parent_type');

     protected $primaryKey = 'id';

      public function taskJobs()
    {
    	return $this->hasMany('App\TaskJobs');
    }

    public function taskChat()
    {
    	return $this->hasMany('App\TaskChat');
    }

    public static function checkAssign($id='')
    {
        $count = DB::table('staff_task')->where('parent_id',$id)->count();

        $help_count = DB::table('help_desk')->where('task_id',$id)->count();


        return $count + $help_count;
    }

    public static function taskDetail($id='')
    {
        $task = DB::table('staff_task')->where('id', $id)->first();
        if (isset($task->id)) {
            $other = DB::table('staff_task')->where('id', $task->parent_id)->first();
            if (isset($other->id)) {
                $from_staff = DB::table('adjustment_staff')->select('name')->where('id',$other->task_from)->first();
                $to_staff = DB::table('adjustment_staff')->select('name')->where('id',$other->task_to)->first();
                $data = $from_staff->name.' given this task to '.$to_staff->name.' on '.$other->start_time;
                return $data;
            } else{
                return '';
            }
        } else{
            return '';
        }
    }

    public static function countUnaccept()
    {
        return DB::table('staff_task')->where('task_to', auth()->guard('staffs')->user()->id)->where('accept_status', '!=', 1 )->count();
    }
    
    public static function countApproval()
    {
        return DB::table('staff_task')->where('task_from', auth()->guard('staffs')->user()->id)->where('complete',1)->where('complete_status', '!=', 1 )->count();
    }
}
