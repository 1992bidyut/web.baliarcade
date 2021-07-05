<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =['email','name','address','password','phone','image','verify'];
}
