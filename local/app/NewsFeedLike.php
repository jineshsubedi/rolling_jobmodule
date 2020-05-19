<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeedLike extends Model
{
    protected $table = 'news_feed_like';  
    protected $fillable = array('staff_id', 'newsfeed_id');
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id')->select('name','id','image');
    }
    public static function checkPostLikeOrNot($newsfeedId)
    {
        return NewsFeedLike::where('newsfeed_id', $newsfeedId)->where('staff_id', auth()->guard('staffs')->user()->id)->first();
    }
}
