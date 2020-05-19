<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelAssignmentCategory extends Model
{
    protected $table = 'travel_assignment_category';  

    protected $fillable = array('branch_id', 'title');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TravelAssignmentCategory::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }
}
