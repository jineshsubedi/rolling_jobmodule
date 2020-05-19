<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustmentrequest extends Model
{
    protected $table = 'adjustmentrequest';  
    protected $fillable = array('adjustment_staff_id','login_time','logout_time','adjustment_reason','time_to_be_adjusted','informed_personnel','remarks','status', 'branch_id', 'ad_date');
    protected $primaryKey = 'id';


     public function adjustmentStaff(){
     	$this->belongsTo('App\Adjustment_staff');
     }

     public static function getStatus($id)
     {
     	if ($id == 0) {
     		$title = '<small class="label label-primary">Waiting for Approval</small>';
     	} elseif ($id == 1) {
     		$title = '<small class="label label-success">Approved by Supervisor</small>';
     	} elseif ($id == 2) {
     		$title = '<small class="label label-success">Approved</small>';
     	} elseif ($id == 3){
     		$title = '<small class="label label-danger">Not Approved by Supervisor</small>';
     	} elseif ($id == 4){
            $title = '<small class="label label-danger">Not Approved by Admin</small>';
        } else{
            $title = '';
        }
     	return $title;
     }
     
     
      public static function getStatusTitle($id)
     {
        if ($id == 0) {
            $title = 'Waiting for Approval';
        } elseif ($id == 1) {
            $title = 'Approved by Supervisor';
        } elseif ($id == 2) {
            $title = 'Approved';
        } elseif ($id == 3){
            $title = 'Not Approve by Supervisor';
        } elseif ($id == 4){
            $title = 'Not Approve by Admin';
        } else{
            $title = '';
        }
        return $title;
     }
}
