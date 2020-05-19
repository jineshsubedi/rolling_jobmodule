<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskChatGroup extends Model
{
    protected $table = 'task_chat_group'; 
    protected $fillable = array('task_id', 'staff_id', 'root');
    protected $primaryKey = 'id';
    
    public function staff()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id');
    }
    public static function getMembers($id)
    {
        // return TaskChatGroup::where('task_id',$id)->where('root', 1)->get();
        return TaskChatGroup::where('task_id',$id)->get();
    }
}
