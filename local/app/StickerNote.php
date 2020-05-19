<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StickerNote extends Model
{
     protected $table = 'sticker_note';  
    protected $fillable = array('title', 'detail', 'added_by', 'branch_id','added_date', 'show_date');
    protected $primaryKey = 'id';

   
}
