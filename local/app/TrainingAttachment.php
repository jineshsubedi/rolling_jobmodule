<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingAttachment extends Model
{
    protected $table = 'training_attachment';  

    protected $fillable = array('training_id', 'attachment', 'extension');
    protected $primaryKey = 'id';
}
