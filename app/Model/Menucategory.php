<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menucategory extends Model
{
    protected $fillable = ['restaurant_id','name_en','name_bn','image'];

    public function restaurant()
    {
    	return $this->belongsTo(Restaurant::class);
    }
}
