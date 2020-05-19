<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeedNotification extends Model
{
    protected $table = 'news_feed_notification';  
    protected $fillable = array('newsfeed_id', 'staff_id', 'branch_id', 'type', 'message');
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id')->select('name','id','image');
    }
}
