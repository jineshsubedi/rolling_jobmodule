<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientHistory extends Model
{
    protected $table = 'client_history';  
     protected $fillable = array('id','client_detail_id', 'history_date', 'history', 'added_by','potentiality', 'interest_level','medium','interest', 'next_follow', 'status', 'contact_person');
     protected $primaryKey = 'id';

     public function ClinentDetail()
     {
     	return $this->belongsTo('App\ClinentDetail');
     }

    
}
