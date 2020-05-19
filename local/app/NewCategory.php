<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    protected $table = 'new_category';  

    protected $fillable = array('title');
    protected $primaryKey = 'id';

    public function new_sub_category()
    {
        return $this->hasMany('\App\NewSubCategory', 'new_category_id');
    }
}
