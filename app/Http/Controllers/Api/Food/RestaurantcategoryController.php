<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restaurantcategory;
use App\Model\Restaurant;
use App\Model\Floor;
use URL;

class RestaurantcategoryController extends Controller
{
    public function index()
    {
    	$data = Restaurantcategory::with('floor')->get();
    	return response()->json(array('name'=>'restaurantcategory','data'=>$data));
    }
    public function show($id)
    {
    	$data = Restaurant::where('restaurantcategory_id',$id)->with('floor')->with('restaurantcategory')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	}
    	return response()->json(array('name'=>'restaurant','data'=>$data));
    }
    
    public function all()
    {
    	$data = Restaurant::with('restaurantcategory')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	}
    	return response()->json(array('name'=>'restaurant','data'=>$data));
    }
    
}