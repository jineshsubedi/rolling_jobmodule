<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DivisionRevenue extends Model
{
    protected $table = 'division_revenue';  

    protected $fillable = array('division_id', 'branch_id', 'revenue', 'direct_expenses', 'indirect_expenses', 'net_profit', 'add_date');
    protected $primaryKey = 'id';

    public function Division()
    {
    	return $this->belongsTo('App\Division');
    }
}
