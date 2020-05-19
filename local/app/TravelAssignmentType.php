<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelAssignmentType extends Model
{
    protected $table = 'travel_assignment_type';  

    protected $fillable = array('branch_id', 'title');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TravelAssignmentType::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }
}
