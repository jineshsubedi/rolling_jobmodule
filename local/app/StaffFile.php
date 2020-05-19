<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffFile extends Model
{
     protected $table = 'staff_file';  

     protected $fillable = array('adjustment_staff_id', 'filename','wfilename');

     protected $primaryKey = 'id';

}
