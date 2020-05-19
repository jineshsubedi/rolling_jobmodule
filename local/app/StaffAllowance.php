<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffAllowance extends Model
{
    protected $table = 'staff_allowance';

    protected $fillable = ['staff_id', 'title', 'amount', 'type', 'salary_id'];
}
