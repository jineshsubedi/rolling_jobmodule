<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Imagetool;

class TaskChat extends Model
{
    protected $table = 'task_chat';  

    protected $fillable = array('task_id', 'seen_by','message', 'image', 'chat_from');

    protected $primaryKey = 'id';

    public function staffTask()
    {
    	return $this->belongsTo('App\StaffTask');
    }

    public static function getChats($id = '')
    {
        $chats = DB::table('task_chat')->where('task_id', $id)->get();
        $data = '';
        if (count($chats) > 0) {
            foreach ($chats as $chat) {
                $user = DB::table('adjustment_staff')->select('name','image')->where('id',$chat->staff_id)->first();

                if (is_file(DIR_IMAGE.$user->image)) {
                    
                    $image = Imagetool::mycrop($user->image,128,128);
                } else{
                    
                    $image = Imagetool::mycrop('blank-image.png',128,128);
                }

                if ($chat->staff_id == auth()->guard('staffs')->user()->id) {
                    $class = 'fl-right';
                } else{
                    $class = '';
                }
                $data .= '<div class="direct-chat-msg '.$class. '"><div class="direct-chat-info clearfix"><span class="direct-chat-name pull-left">'.$user->name.'</span><span class="direct-chat-timestamp pull-right">'.$chat->created_at.'</span></div>';
                     
                $data .= '<img class="direct-chat-img" src="'.asset($image).'" alt="message user image"><div class="direct-chat-text">'.$chat->message.' </div></div>';
            }
        } else{
            $data = 'Sorry there is no any message found.';
        }

        return $data;
    }

    public static function getUnreadMessage($id) 
    {
        // return DB::table('task_chat')->where('task_id',$id)->where('status',0)->where('staff_id', auth()->guard('staffs')->user()->id)->count();
        $count=0;
        $task_chats = TaskChat::where('task_id',$id)->get();
        foreach($task_chats as $task_chat){
            if(isset($task_chat) && $task_chat->seen_by){
                $users = json_decode($task_chat->seen_by);
                if (!in_array(auth()->guard('staffs')->user()->id, (array)$users)){
                    $count++;
                }
            }
        }
        return $count;
    }

    public static function countUnreadMessage()
    {
        // return DB::table('task_chat')->where('status',0)->where('staff_id', auth()->guard('staffs')->user()->id)->count();
        $count=0;
        $task_chats = TaskChat::leftjoin('task_chat_group', function($join){
                        $join->on('task_chat.task_id','=','task_chat_group.task_id');
                    })
                    ->where('task_chat_group.staff_id', auth()->guard('staffs')->user()->id)
                    // ->groupBy('task_chat.task_id')
                    ->select('task_chat.*')
                    ->get();
        foreach($task_chats as $task_chat){
            if(isset($task_chat) && $task_chat->seen_by){
                $users = json_decode($task_chat->seen_by);
                if (!in_array(auth()->guard('staffs')->user()->id, (array)$users)){
                    $count++;
                }
            }
        }
        return $count;
    }
    
    public static function getAllUnreadMessage($id)
    {
        // return DB::table('task_chat')->where('task_id',$id)->count();
        $count=0;
        $task_chats = TaskChat::where('task_id', $id)->get();
        foreach($task_chats as $task_chat){
            if(isset($task_chat) && $task_chat->seen_by){
                $users = json_decode($task_chat->seen_by);
                if (in_array(auth()->guard('staffs')->user()->id, (array)$users)){
                    $count++;
                }
            }
        }
        return $count;
    }
}
