<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestionBox extends Model
{
    protected $table = 'suggestion_box';  

    protected $fillable = array('branch_id', 'staffs_id', 'suggestion_for_id', 'staffs_name', 'hide_name', 'description');
    protected $primaryKey = 'id';

     public function SuggestionReply()
    {
    	return $this->hasMany('App\SuggestionReply');
    }
    
}
