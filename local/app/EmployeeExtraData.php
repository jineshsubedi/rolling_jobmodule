<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeExtraData extends Model
{
    protected $table = 'employee_extra_data';  

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'employees_id', 'employee_name', 'strategic_paper', 'presentation_paper'
    ];
    
    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }
    
    
     public static function getStrategic($id)
    {
    	$data = DB::table('employee_extra_data')->where('employees_id', $id)->first();
    	if (isset($data->strategic_paper)) {
    		if (is_file(DIR_IMAGE.$data->strategic_paper)) {
    			return url('image/'.$data->strategic_paper);
    		} else{
    			return '';
    		}
    	}else{
    		return '';
    	}
    }

    public static function getPresentation($id)
    {
    	$data = DB::table('employee_extra_data')->where('employees_id', $id)->first();
    	if (isset($data->presentation_paper)) {
    		if (is_file(DIR_IMAGE.$data->presentation_paper)) {
    			return url('image/'.$data->presentation_paper);
    		} else{
    			return '';
    		}
    	}else{
    		return '';
    	}
    }
    
    public static function checkData($id)
    {
    	$data = DB::table('employee_extra_data')->where('employees_id', $id)->first();
    	if (isset($data->id)) {
    		return 1;
    	} else{
    		return '';
    	}
    }
    
}
