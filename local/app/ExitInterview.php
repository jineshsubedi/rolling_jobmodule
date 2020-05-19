<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExitInterview extends Model
{
	

    protected $table = 'exit_interview';  

    protected $fillable = array('branch_id', 'staffs_id', 'staffs_name', 'interview_date', 'service_tenure', 'received_by', 'description');
    protected $primaryKey = 'id';
}
