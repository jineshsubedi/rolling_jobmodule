<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class KpiRating extends Model
{
    protected $table = 'kpi_rating';  

    protected $fillable = array('kpi_id', 'rate_by', 'rating', 'rating_detail');
    protected $primaryKey = 'id';
    
    

    public function Kpi()
    {
    	return $this->belongsTo('App\StaffKpi');
    }
    public static function getRating($kpi,$quarter)
    {
        
        $rating = DB::table('kpi_rating')->where('kpi_id', $kpi)->where('created_at', 'LIKE', $quarter.'%')->first();
        
        $data = '0.00';
        if(isset($rating->rating))
        {
            $data = $rating->rating;
        }
        return $data;
    }
    
    
}
