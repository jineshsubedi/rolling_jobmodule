<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class GmailAPI extends Model
{
    protected $table = 'gmail_api';

    protected $fillable = array('staff_id', 'project_id', 'client_id', 'client_secret', 'redirect_url');
    protected $primaryKey = 'id';

    public function adjustment_staff(){
        return $this->belongsTo(Adjustment_staff::class,'staff_id');
    }
}
