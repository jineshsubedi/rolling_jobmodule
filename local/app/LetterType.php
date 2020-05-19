<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    protected $table = 'letter_type';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
        $type = LetterType::find($id);
        return $type->title;
    }
}
