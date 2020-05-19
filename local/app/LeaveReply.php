<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveReply extends Model
{
    protected $table = 'leave_reply';  

    protected $fillable = array('leave_request_id', 'detail', 'reply_by');
    protected $primaryKey = 'id';

    public function leave_request()
    {
    	return $this->belongsTo('App\LeaveRequest');
    }
    public static function countreply($id)
    {
    	$data = LeaveReply::where('leave_request_id', $id)->count();
    	return $data;
    }
}
