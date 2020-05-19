<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ClientDetail extends Model
{
     protected $table = 'client_detail';
     protected $fillable = array('id','branch_id', 'staff_id', 'client_name', 'business_nature', 'potentiality', 'interest_level', 'service_type', 'staffs', 'status','priority', 'close_remarks', 'signed_date', 'country', 'exp_date', 'project_leader', 'remarks', 'focal_person', 'phone', 'email', 'status_remarks','address');
     protected $primaryKey = 'id';
     
      public function ClientContactPerson()
     {
     	return $this->hasMany('App\ClientContactPerson');
     }

     public function ClientHistory()
     {
     	return $this->hasMany('App\ClientHistory');
     }

     public static function getName($id='')
     {
          $client = DB::table('client_detail')->select('client_name')->where('id', $id)->first();
          if (isset($client->client_name)) {
               return $client->client_name;
          } else{
               return '';
          }
     }

}
