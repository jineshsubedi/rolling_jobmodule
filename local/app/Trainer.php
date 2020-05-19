<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainer';  

    protected $fillable = array('name', 'designation', 'rate', 'charge_type', 'cv');
    protected $primaryKey = 'id';

    public static function getName($id)
    {
        $data = Trainer::find($id);
        if($data){
            return $data->name;
        }else{
            return null;
        }
    }
}
