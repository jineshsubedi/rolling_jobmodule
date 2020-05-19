<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSetting extends Model
{
     protected $table = 'employee_setting';  

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'employees_id', 'travel', 'license', 'licenseof', 'relocation', 'have_vehical', 'vehical', 'searchable', 'confidention', 'alertable'
    ];
    public $timestamps = false;
    public function Employee()
    {
    	return $this->belongsTo('App\Employees');
    }
}
