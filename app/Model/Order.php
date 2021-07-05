<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['email','phone','name','order_date','order_month','order_year','order_status','payment_by','order_type','pay','due','total_quantity','total','grand_total','shipping_cost','shipping_addr'];
}
