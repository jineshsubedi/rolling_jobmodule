<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $table = 'training_program';  

    protected $fillable = array('branch_id', 'title', 'status');

    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = TrainingProgram::find($id);
    	if($data)
    	{
    		return $data->title;
    	}
    	return '';
    }
    public function training()
    {
        return $this->hasMany('App\Training', 'program_id');
    }
}
