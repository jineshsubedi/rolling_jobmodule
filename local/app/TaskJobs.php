<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class TaskJobs extends Model
{
    protected $table = 'task_job';  

     protected $fillable = array('task_id', 'title','complete_status', 'start_date', 'finish_time', 'description', 'priority','image');

     protected $primaryKey = 'id';

      public function staffTask()
    {
    	return $this->belongsTo('App\StaffTask');
    }

    public static function getJobs($id = '')
    {
    	return DB::table('task_job')->where('task_id', $id)->get();
    }

    public static function getSpan($accept_id,$complete_status,$finish)
    {
    	 if($accept_id == 1)
    	 {
    	 	$value = '';
    	
         if($complete_status == 1) {
            $value  .= '<span class="label label-success">Completed</span>';
        	}
        	elseif($finish < date('Y-m-d')){
            $value .= '<span class="label label-danger">Deadline Crossed</span>';
        	}
            else{
            	$value .= ' <span class="label bg-purple">In Process</span>';
            }
                     
          }
            else{
            	$value = '<span class="label label-warning">Not Accepted</span>';
            }
                      
          return $value;
    }

    public static function getStatusSpan($complete_status,$finish)
    {
      
        $value = '';
         if($complete_status == 1) {
            $value  .= '<span class="label label-success">Completed</span>';
          }
          elseif($finish < date('Y-m-d')){
            $value .= '<span class="label label-danger">Deadline Crossed</span>';
          }
            else{
              $value .= ' <span class="label bg-purple">In Process</span>';
            }
                     
        
                      
          return $value;
    }

    public static function getClass($data)
    {
    	 if($data == 1)
            $class = "low-priority";
         elseif($data == 2)
            $class = "medium-priority";
         elseif($data == 3)
            $class = "high-priority";
         elseif($data == 4)
            $class = "highest-priority";
         else
            $class = "no-priority";
        return $class;
    }

    public static function getPriority($data)
    {
    	 if($data == 1)
            $class = "Low Priority";
         elseif($data == 2)
            $class = "Medium Priority";
         elseif($data == 3)
            $class = "High Priority";
         elseif($data == 4)
            $class = "Highest Priority";
         else
            $class = "No Priority";
        return $class;
    }


    public static function getJobStatus($complete_status,$finish)
    {
    	 
    	
         if($complete_status == 1) {
            $value  = '<span class="label label-success">Completed</span>';
        	}
        	elseif($finish < date('Y-m-d')){
            $value = '<span class="label label-danger">Deadline Crossed</span>';
        	}
            else{
            	$value = ' <span class="label bg-purple">In Process</span>';
            }
                     
          
                      
          return $value;
    }
    
    public static function TotalJob($id)
    {
      return DB::table('task_job')->where('task_id',$id)->count();
    }

    public static function TotalPendingJob($id)
    {
      return DB::table('task_job')->where('task_id',$id)->where('complete_status', '!=', 1)->count();
    }
}
