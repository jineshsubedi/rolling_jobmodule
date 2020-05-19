<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceRating extends Model
{
    protected $table = 'performance_rating';  

    protected $fillable = array('performance_setting_id', 'adjustment_staff_id', 'rating', 'rating_date','rated_by');

    protected $primaryKey = 'id';

    
    public function PerformanceSating()
    {
    	return $this->belongsTo('App\PerformanceSating');
    }
}
