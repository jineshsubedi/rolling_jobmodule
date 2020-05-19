<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelerPosition extends Model
{
    protected $table = 'traveler_position';  

    protected $fillable = array('branch_id', 'title');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TravelerPosition::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }

    public static function getAllPositions()
    {
        $data = TravelerPosition::where('branch_id', auth()->guard('staffs')->user()->branch)->orderBy('title', 'asc')->get();
        return $data;
    }
}
