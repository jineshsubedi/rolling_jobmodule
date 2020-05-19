<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
     protected $table = 'branch';  
     protected $fillable = array('id','name', 'parent_branch');
     protected $primaryKey = 'id';

public static function gettitle($id){
	$branch = DB::table('branch')->where('id', $id)->first();
	if(isset($branch->id)){
		$title = $branch->name;
	}
	else{
		$title = '';

	}

	return $title;

}
public static function isParent($branch)
{
	$data = Branch::where('id', $branch)->where('parent_branch', 1)->first();
	if($data){
		return true;
	}else{
		return false;
	}
}
     
}
