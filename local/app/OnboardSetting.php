<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnboardSetting extends Model
{
    protected $table = 'onboard_setting';
    protected $fillable = array('particular', 'type', 'department_id', 'branch_id');
    protected $primaryKey = 'id';

    public static function checkDepartmentOperation()
    {
    	$data = OnboardSetting::where('department_id', auth()->guard('staffs')->user()->department)->count();
    	if($data > 0)
    	{
    		return true;
    	}
    	return false;
    }
    
}
