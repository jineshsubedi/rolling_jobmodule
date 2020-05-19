<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class OtReason extends Model
{
    protected $table = 'ot_reason';  
    protected $fillable = array('title', 'branch_id');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$reason = DB::table('ot_reason')->where('id', $id)->first();
    	if (isset($reason->title)) {
    		return $reason->title;
    	} else{
    		return '';
    	}
    }
}
