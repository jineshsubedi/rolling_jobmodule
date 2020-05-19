<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObType extends Model
{
    protected $table = 'ob_type';
    protected $fillable = array('title', 'branch_id');
    protected $primaryKey = 'id';

    public static function getTitle($id)
    {
    	$data = ObType::find($id);
    	if($data){
    		return $data->title;
    	}
    	return null;
    }
}
