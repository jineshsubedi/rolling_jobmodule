<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceSetting extends Model
{
     protected $table = 'performance_setting';  

    protected $fillable = array('branch_id', 'title', 'duration', 'parameter');

    protected $primaryKey = 'id';

    
    public function Branch()
    {
    	return $this->belongsTo('App\Branch');
    }
}
