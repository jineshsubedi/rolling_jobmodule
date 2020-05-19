<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    protected $table = 'fiscal_year';  

    protected $fillable = array('title', 'start', 'end','status' );

    protected $primaryKey = 'id';

    public $timestamps = false;
}
