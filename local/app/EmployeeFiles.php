<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class EmployeeFiles extends Model
{
   protected $table = 'employee_files';  

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'employees_id', 'title', 'file_location'
    ];
    public $timestamps = false;
    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }
    
     public static function getFiles($id = '')
    {
        return DB::table('employee_files')->where('employees_id',$id)->get();
    }
    
}
