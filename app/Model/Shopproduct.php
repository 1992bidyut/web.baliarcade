<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopproduct extends Model
{
    protected $fillable = ['productcategory_id','shopcategory_id','shop_id','name_en','name_bn','image','price_en','price_bn','quantity_en','quantity_bn','discount_en','discount_bn','size_en','size_bn','color_en','color_bn','warranty_en','warranty_bn','description_en','description_en','rating','buying_date','expire_date'];

    public function shopcategory()
    {
    	return $this->belongsTo(Shopcategory::class);
    }
    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
    public function productcategory()
    {
    	return $this->belongsTo(Productcategory::class);
    }
}
