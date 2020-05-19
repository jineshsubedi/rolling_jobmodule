<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelerGrade extends Model
{
    protected $table = 'traveler_grade';  

    protected $fillable = array('branch_id', 'title');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TravelerGrade::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }
}
