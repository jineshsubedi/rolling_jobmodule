<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContactPerson extends Model
{
    protected $table = 'client_contact_person';  
     protected $fillable = array('id','client_detail_id', 'name', 'designation', 'contact_number', 'email');
     protected $primaryKey = 'id';

     public function ClinentDetail()
     {
     	return $this->belongsTo('App\ClinentDetail');
     }
}
