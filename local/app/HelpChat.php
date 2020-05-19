<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class HelpChat extends Model
{
    protected $table = 'help_chat';  

     protected $fillable = array('help_desk_id', 'staff_id','message', 'image', 'chat_from');

     protected $primaryKey = 'id';

      public function staffTask()
    {
    	return $this->belongsTo('App\StaffTask');
    }

     public static function getChats($id = '')
    {
        $chats = DB::table('help_chat')->where('help_desk_id', $id)->get();
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
        
        return DB::table('help_chat')->where('help_desk_id',$id)->where('status',0)->where('staff_id', auth()->guard('staffs')->user()->id)->count();
    }

     public static function getAllUnreadMessage($id)
    {
        
        return DB::table('help_chat')->where('help_desk_id',$id)->count();
    }


    public static function countUnreadMessage()
    {
        return DB::table('help_chat')->where('status',0)->where('staff_id', auth()->guard('staffs')->user()->id)->count();
    }
}
