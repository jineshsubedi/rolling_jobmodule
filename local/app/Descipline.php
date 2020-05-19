<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descipline extends Model
{
    protected $table = 'decipline';  

    protected $fillable = array('adjustment_staff_id', 'title', 'detail', 'added_by');
    protected $primaryKey = 'id';
    
    

    public function Staff()
    {
    	return $this->belongsTo('App\Adjustment_staff');
    }
}
