<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otrequest extends Model
{
      protected $table = 'otrequest';  
    protected $fillable = array('adjustment_staff_id','login_time','logout_time','holiday','ot_reason','requested_by', 'duration', 'ot_hour', 'status','branch_id', 'ot_date');
    protected $primaryKey = 'id';


     public function adjustmentStaff(){
     	$this->belongsTo('App\Adjustment_staff');
     }

     
}
