<?php

namespace App\Http\Controllers\Backend\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Menucategory;
use App\Model\Restaurantcategory;
use App\Model\Restaurant;
use Image;
use Auth;

class MenuController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data = Menu::where('restaurant_id',Auth::user()->restaurant_id)->get();

    	return view('backend.food.menu.all',compact('data'));
    }

    public function create()
    {
    	
    	$menucategory = Menucategory::all();
    	return view('backend.food.menu.add',compact('menucategory'));
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'price_en'=>'required|numeric',
    		'price_bn'=>'required',
    		'menucategory_id'=>'required',
    		'image'=>'required'
    	]);


    	$data = new Menu();

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->restaurantcategory_id = Auth::user()->restaurantcategory_id;
    	$data->menucategory_id = $request->menucategory_id;
    	$data->restaurant_id = Auth::user()->restaurant_id;
    	$data->price_en = $request->price_en;
    	$data->price_bn = $request->price_bn; 	
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->discount_en = $request->discount_en;
    	$data->discount_bn = $request->discount_bn;
   

    	$image = $request->image;
    
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save("upload/menu/".$image_name);
        $data->image = "upload/menu/".$image_name;
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Menu Successfully Added',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
    	
    	$menucategory = Menucategory::where('restaurant_id',Auth::user()->restaurant_id)->get();
    	

    	$data = Menu::find($id);
    	return view('backend.food.menu.edit',compact('data','menucategory'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'price_en'=>'required|numeric',
    		'price_bn'=>'required',
    		'menucategory_id'=>'required'
    		
    	]);


    	$data = Menu::find($id);

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->restaurantcategory_id = Auth::user()->restaurantcategory_id;
    	$data->menucategory_id = $request->menucategory_id;
    	$data->restaurant_id = Auth::user()->restaurant_id;
    	$data->price_en = $request->price_en;
    	$data->price_bn = $request->price_bn; 	
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->discount_en = $request->discount_en;
    	$data->discount_bn = $request->discount_bn;

    	$image = $request->image;
    	if ($image) {
    		
    
	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(500,310)->save("upload/menu/".$image_name));
	        unlink($data->image);
	        $data->image = "upload/menu/".$image_name;
    	}
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Menu Successfully Updated',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.menu')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.menu')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Menu::find($id);
    	
    	unlink($data->image);
    	
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Menu Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.menu')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.menu')->with($notification);
        }

    }

    // //multiple dependency

    public function getRestaurant($id)
    {
    	$restaurant = Restaurant::where('restaurantcategory_id',$id)->get();
    	return response()->json($restaurant);
    }
}
