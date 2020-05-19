<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationDocuments extends Model
{
    protected $table = 'information_docuement';  

    
    protected $primaryKey = 'id';
    protected $fillable = [
        'branch_id', 'title','description','document','departments','file_location'
    ];
}
