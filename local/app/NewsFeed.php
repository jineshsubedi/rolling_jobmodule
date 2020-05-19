<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeed extends Model
{
    protected $table = 'news_feed';  
    protected $fillable = array('id', 'staff_id', 'branch_id', 'description', 'image', 'video', 'event', 'to_staff');
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id')->select('name','id','image');
    }
    public function news_feed_like()
    {
        return $this->belongsTo('\App\NewsFeedLike', 'newsfeed_id')->where('staff_id', auth()->guard('staffs')->user()->id);
    }
    public function countLikeInPost($id)
    {
        return NewsFeedLike::where('newsfeed_id', $id)->count();
    }
    public static function checkToStaff($id)
    {
        if($id != auth()->guard('staffs')->user()->id)
        {
            $data = Newsfeed::where('to_staff', $id)->latest()->first();
            if(!$data){
                return null;
            }
            $comment = \App\NewsFeedComment::where('staff_id', auth()->guard('staffs')->user()->id)->where('newsfeed_id', $data->id)->first();
            if(!$comment){
                return $data;
            }else{
                return null;
            }
        }
        return null;  
    }
    public static function isNewsFeedPost()
    {
        $data = Newsfeed::where('to_staff', auth()->guard('staffs')->user()->id)->latest()->first();
        if($data){
            return false;
        }
        return true;
    }
    
}
