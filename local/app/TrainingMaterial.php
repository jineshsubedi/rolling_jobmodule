<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingMaterial extends Model
{
    protected $table = 'training_material';  

    protected $fillable = array('branch_id', 'publish_by', 'program_id', 'document', 'doc_type', 'type', 'title', 'approval');

    protected $primaryKey = 'id';
}
