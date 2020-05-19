<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsFeedComment extends Model
{
    protected $table = 'news_feed_comment';  
    protected $fillable = array('staff_id', 'newsfeed_id','parent_id','description');
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('\App\Adjustment_staff', 'staff_id')->select('name','id','image');
    }
}
