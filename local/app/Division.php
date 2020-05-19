<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'division';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';

    public function DivisionRevenue()
    {
    	return $this->hasMany('App\DivisionRevenue');
    }
}
