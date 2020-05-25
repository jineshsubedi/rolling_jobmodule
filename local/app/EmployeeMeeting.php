<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeMeeting extends Model
{
   protected $table = 'employee_meeting';

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'tab_id', 'job_id', 'employee_id', 'topic', 'start_time', 'zoom_id', 'zoom_password', 'zoom_url'
    ];
    public $timestamps = false;
//    public function Employee()
//    {
//    	return $this->belongsTo('App\Employees');
//    }
//
//     public static function getFiles($id = '')
//    {
//        return DB::table('employee_files')->where('employees_id',$id)->get();
//    }
    
}
