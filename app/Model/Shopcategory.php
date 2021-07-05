<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopcategory extends Model
{
    protected $fillable = ['floor_id','name_en','name_bn'];
    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
