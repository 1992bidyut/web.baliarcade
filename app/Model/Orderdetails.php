<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $fillable = ['shop_id','restaurant_id','order_id','product_id','menu_id','unit_quantity','unit_cost','unit_total','status'];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    } 
    public function restaurant()
    {
    	return $this->belongsTo(Restaurant::class);
    }
}
