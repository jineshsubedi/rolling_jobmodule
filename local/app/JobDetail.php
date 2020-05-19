<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
     protected $table = 'job_detail';  

    
   
    protected $fillable = [
        'jobs_id', 'detail_type', 'detail_date', 'description', 'success_message', 'error_message'
    ];
    
}
