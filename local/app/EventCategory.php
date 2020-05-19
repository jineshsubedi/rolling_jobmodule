<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'event_category';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
        $data = EventCategory::find($id);
        return $data->title;
    }
}
