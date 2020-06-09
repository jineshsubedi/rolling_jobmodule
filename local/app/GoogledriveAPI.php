<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class GoogledriveAPI extends Model
{
    protected $table = 'googledrive_api';

    protected $fillable = array('staff_id', 'client_id', 'client_secret', 'refresh_token', 'drive_folder_id');
    protected $primaryKey = 'id';
    public function adjustment_staff(){
        return $this->belongsTo(Adjustment_staff::class,'staff_id');
    }
}
