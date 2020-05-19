<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingStatus extends Model
{
    protected $table = 'training_status';  

    protected $fillable = array('branch_id', 'title');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TrainingStatus::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }
}
