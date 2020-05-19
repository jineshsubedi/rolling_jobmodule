<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'tax';  

    protected $fillable = array('maritial_status','particulars', 'taxable_amount', 'fiscal_year_id', 'percentage', 'income');

    protected $primaryKey = 'id';

    public function fiscal()
    {
        return $this->belongsTo('\App\FiscalYear','fiscal_year_id');
    }
    public static function getTaxSlab($id){
        $tax = Tax::find($id);
        if($tax){
            return $tax->percentage;
        }else{
            return '';
        }
    }
    public static function getCustomeTaxSlab($maritial_status, $percentage){
        $data = Tax::where('maritial_status', $maritial_status)->where('percentage', $percentage)->first();
        return $data->id;
    }
}
