<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HrLetter extends Model
{
    protected $table = 'hr_letter';  

    protected $fillable = array('letter_type_id', 'branch_id', 'department_id', 'description', 'letter_handler', 'signature');
    protected $primaryKey = 'id';
    
}
