<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class DropboxAPI extends Model
{
    protected $table = 'dropbox_api';

    protected $fillable = array('staff_id', 'access_token');
    protected $primaryKey = 'id';

    public function adjustment_staff(){
        return $this->belongsTo(Adjustment_staff::class,'staff_id');
    }
}
