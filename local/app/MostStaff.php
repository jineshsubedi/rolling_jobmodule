<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MostStaff extends Model
{
    protected $table = 'most_staff';  

     protected $fillable = array('staff_id', 'sick_leave', 'personal_leave', 'wow_rating', 'kpi_rating', 'help_desk', 'attendance', 'client_rating','achievement','overtime','comp_off','staff_type','av_point');
    protected $primaryKey = 'id';
}
