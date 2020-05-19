<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewSubCategory extends Model
{
    protected $table = 'new_sub_category';  

    protected $fillable = array('new_category_id', 'title');
    protected $primaryKey = 'id';
}
