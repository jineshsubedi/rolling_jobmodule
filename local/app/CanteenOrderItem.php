<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanteenOrderItem extends Model
{
    protected $table = 'canteen_order_item';

    protected $fillable = ['canteen_order_id', 'title', 'price','qty'];
}
