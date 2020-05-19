<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class OrgRating extends Model
{
    protected $table = 'org_rating';  

    protected $fillable = array('client_detail_id', 'overal_rating', 'overal_remarks','others', 'year', 'month', 'day' );

    protected $primaryKey = 'id';

    public static function checkRating($id)
    {
    	return DB::table('org_rating')->where('client_detail_id', $id)->where('month', date('m'))->count();
    }

    public static function countRating($id) 
    {
    	return DB::table('org_rating')->where('client_detail_id', $id)->count();
    }
}
