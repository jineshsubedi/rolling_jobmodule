<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanteenMenu extends Model
{
    protected $table = 'canteen_menu';

    protected $fillable = ['branch_id', 'parent', 'title', 'price','status','aday'];
}
