<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shopcategory;
use App\Model\Shop;
use URL;

class ShopcategoryController extends Controller
{
    public function index()
    {
    	$data = Shopcategory::with('floor')->get();
    	return response()->json(array('name'=>'shopcategory','data'=>$data));
    }
    public function show($id)
    {
    	$data = Shop::where('shopcategory_id',$id)->with('floor','shopcategory')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	}
    	return response()->json(array('name'=>'shop','data'=>$data));
    }
}