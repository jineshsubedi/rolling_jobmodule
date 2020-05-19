<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HelpDesk extends Model
{
    protected $table = 'help_desk';  

     protected $fillable = array('task_to', 'task_from','title', 'accept_status', 'priority', 'complete_status', 'start_time', 'finish_time', 'remarks', 'description', 'project', 'kra', 'personal', 'num_task', 'task_id', 'parent_id', 'job_id');

     protected $primaryKey = 'id';

     

    public function taskChat()
    {
    	return $this->hasMany('App\TaskChat');
    }

    public static function countUnaccept()
    {
        return DB::table('help_desk')->where('task_to', auth()->guard('staffs')->user()->id)->where('accept_status', '!=', 1 )->count();
    }
    
    public static function taskDetail($id='')
    {
        $return = '';
        $task = DB::table('help_desk')->where('id', $id)->first();
        if (isset($task->id)) {
            $parent_task = DB::table('staff_task')->where('id',$task->task_id)->first();
            if (isset($parent_task->id)) {
                $from_staff = DB::table('adjustment_staff')->select('name')->where('id',$parent_task->task_from)->first();
                $to_staff = DB::table('adjustment_staff')->select('name')->where('id',$parent_task->task_to)->first();
                $data = $from_staff->name.' given this task to '.$to_staff->name.' on '.$parent_task->start_time.'<br>';
                $return .= $data;
            }

            $parent_job = DB::table('task_job')->where('id',$task->job_id)->first();
            
            if (isset($parent_job->id)) {
                $job_task = DB::table('staff_task')->where('id',$parent_job->task_id)->first();
                $from_staff = DB::table('adjustment_staff')->select('name')->where('id',$job_task->task_from)->first();
                $to_staff = DB::table('adjustment_staff')->select('name')->where('id',$job_task->task_to)->first();
                $data = $from_staff->name.' given a task with title ('.$job_task->title.') this task to '.$to_staff->name.' on '.$parent_job->start_date.'<br>';
                $return .= $data;
            }
            $other = DB::table('help_desk')->where('id', $task->parent_id)->first();
            if (isset($other->id)) {
                $from_staff = DB::table('adjustment_staff')->select('name')->where('id',$other->task_from)->first();
                $to_staff = DB::table('adjustment_staff')->select('name')->where('id',$other->task_to)->first();
                $data = $from_staff->name.' given this task to '.$to_staff->name.' on '.$other->start_time.'<br>';
                $return .= $data;
            }

        }

        return $return;
    }
}
