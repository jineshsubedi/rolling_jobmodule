<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionReply extends Model
{
    protected $table = 'suggestion_reply';  

    protected $fillable = array('suggestion_box_id', 'detail', 'reply_by');
    protected $primaryKey = 'id';

     public function SuggestionBox()
    {
    	return $this->belongsTo('App\SuggestionBox');
    }
}
