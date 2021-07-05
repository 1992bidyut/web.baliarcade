<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menucategory;
use App\Model\Menu;
use App\Model\Restaurant;
use URL;

class MenuController extends Controller
{
    public function index($id)
    {
    	$data = Menucategory::where('restaurant_id',$id)->with('restaurant')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	}
    	return response()->json(array('name'=>'menucategory','data'=>$data));
    }
    public function show($id)
    {
    	$data = Menu::where('menucategory_id',$id)->with('restaurant','restaurantcategory','menucategory')->get();
    	foreach($data as $row){
    	    $row->image = URL::to($row->image);
    	    $row->menu_id = $row->id;
    	}
    	return response()->json($data);
    }
    
    public function getAll(){
        	$data = Menu::with('restaurant','restaurantcategory','menucategory')->get();
        	return response()->json($data);
    }
}