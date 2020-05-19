<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanteenOrder extends Model
{
    protected $table = 'canteen_order';
          

    protected $fillable = ['branch_id', 'staff_id', 'cash_cr', 'item_id', 'price', 'en_year', 'en_month', 'en_day','np_year', 'np_month', 'np_day', 'amount', 'status', 'title', 'qty','order_date'];
}
