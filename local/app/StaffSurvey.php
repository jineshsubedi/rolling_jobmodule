<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffSurvey extends Model
{
    protected $table = 'staff_survey';  

    protected $fillable = array('adjustment_staff_id', 'others', 'year', 'month', 'day', 'branch_id');

    protected $primaryKey = 'id';
}
