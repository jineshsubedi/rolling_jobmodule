<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
     protected $table = 'job_location';  

    protected $fillable = array('name');
    protected $primaryKey = 'id';
        public function EmployeeLocation()
    {
    	return $this->hasMany('App\EmployeeLocation');
    }

     public function JobsLocation()
    {
    	return $this->hasMany('App\JobsLocation');
    }

}
