<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObStaff extends Model
{
    protected $table = 'ob_staff';
    protected $fillable = array('branch_id', 'department_id','staff_id', 'particular', 'type', 'detail', 'from', 'to', 'from_status', 'to_status');
    protected $primaryKey = 'id';

    public static function countMyUnAcceptAsset()
    {
    	$data = ObStaff::where('staff_id', auth()->guard('staffs')->user()->id)->where('from_status', 0)->count();
    	return $data;
    }
}
