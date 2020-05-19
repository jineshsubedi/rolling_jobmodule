<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelReply extends Model
{
    protected $table = 'travel_reply';  

    protected $fillable = array('travel_id', 'detail', 'reply_by');
    
    protected $primaryKey = 'id';

    public function travel()
    {
    	return $this->belongsTo('App\Travel');
    }
    public static function countreply($id)
    {
    	$data = TravelReply::where('travel_id', $id)->count();
    	return $data;
    }
}
