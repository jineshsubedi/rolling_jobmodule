<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
     protected $table = 'employee_address';  

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'employees_id', 'permanent', 'temporary', 'home_phone', 'mobile', 'fax', 'website'
    ];
    public $timestamps = false;
    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }
}
