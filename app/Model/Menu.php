<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menucategory_id','restaurantcategory_id','restaurant_id','name_en','name_bn','image','price_en','price_bn','description_en','description_en','rating'];

    public function restaurantcategory()
    {
    	return $this->belongsTo(Restaurantcategory::class);
    }
    public function restaurant()
    {
    	return $this->belongsTo(Restaurant::class);
    }
    public function menucategory()
    {
    	return $this->belongsTo(Menucategory::class);
    }
}
