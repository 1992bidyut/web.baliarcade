<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productcategory extends Model
{
    protected $fillable = ['shop_id','name_en','name_bn'];

    public function shop()
    {
    	return $this->belongsTo(Shop::class);
    }
}
