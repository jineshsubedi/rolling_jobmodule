<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffRating extends Model
{
    protected $table = 'staff_rating';  

    protected $fillable = array('client_detail_id', 'overal_rating', 'overal_remarks','others', 'year', 'month', 'day', 'adjustment_staff_id' );

    protected $primaryKey = 'id';
}
