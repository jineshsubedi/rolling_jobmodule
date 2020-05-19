<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubordinateRating extends Model
{
    protected $table = 'subordinate_rating';  

    protected $fillable = array('adjustment_staff_id', 'supervisory','leadership','quality','communication','consistency','independent','proactiveness','creativity','supervisory_detail','leadership_detail','quality_detail','communication_detail','consistency_detail','independent_detail','proactiveness_detail','creativity_detail','added_by');
    protected $primaryKey = 'id';
    
    

    public function Staff()
    {
    	return $this->belongsTo('App\Adjustment_staff');
    }
}
