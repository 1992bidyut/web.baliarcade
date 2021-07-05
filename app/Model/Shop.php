<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['name_en','name_bn','shopcategory_id','floor_id','phone_en','phone_bn','open','image','description_en','description_bn','owner_en','owner_bn'];

    public function shopcategory()
    {
    	return $this->belongsTo(Shopcategory::class);
    }
    public function floor()
    {
    	return $this->belongsTo(Floor::class);
    }
    public function admin()
    {
    	return $this->hasMany(Admin::class);
    }
}
