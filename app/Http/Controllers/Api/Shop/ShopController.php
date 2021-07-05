<?php

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shop;
use App\Model\Productcategory;
use App\Model\Shopproduct;
use URL;

class ShopController extends Controller
{
    public function index($id)
    {
    	$data = Productcategory::where('shop_id',$id)->with('shop')->get();
    	return response()->json(array('name'=>'productcategory','data'=>$data));
    }
    public function show($id)
    {
    	$data = Shopproduct::where('productcategory_id',$id)->with('shop')->with('shopcategory')->with('productcategory')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	    $row->product_id = $row->id;
    	}
    	return response()->json($data);
    }
}
