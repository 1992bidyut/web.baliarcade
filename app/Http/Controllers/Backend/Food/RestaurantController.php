<?php

namespace App\Http\Controllers\Backend\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restaurant;
use App\Model\Restaurantcategory;
use App\Model\Floor;
use Image;

class RestaurantController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data = Restaurant::all();	
    	return view('backend.food.restaurant.all',compact('data'));
    }

    public function create()
    {
    	$restaurantcategory = Restaurantcategory::all();
    	$floor = Floor::all();
       	return view('backend.food.restaurant.add',compact('restaurantcategory','floor'));
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'restaurantcategory_id'=>'required',
    		'floor_id'=>'required',
    		'phone_en'=>'required',
    		'phone_bn'=>'required',
    		'image'=>'required'
    	]);

    	$data = new Restaurant();

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->restaurantcategory_id = $request->restaurantcategory_id;
    	$data->floor_id = $request->floor_id;
    	$data->phone_en = $request->phone_en;
    	$data->phone_bn = $request->phone_bn;
    	$data->open = $request->open;
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->owner_en = $request->owner_en;
    	$data->owner_bn = $request->owner_bn;
    	$data->ratting = $request->ratting_en;

    	$image = $request->image;
    
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save("upload/restaurant/".$image_name);
        $data->image = "upload/restaurant/".$image_name;
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Restaurant Successfully Added',
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
    	$restaurantcategory = Restaurantcategory::all();
    	$floor = Floor::all();

    	$data = Restaurant::find($id);

    	return view('backend.food.restaurant.edit',compact('restaurantcategory','floor','data'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'restaurantcategory_id'=>'required',
    		'floor_id'=>'required',
    		'phone_en'=>'required',
    		'phone_bn'=>'required'
    	]);

    	$data = Restaurant::find($id);

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->restaurantcategory_id = $request->restaurantcategory_id;
    	$data->floor_id = $request->floor_id;
    	$data->phone_en = $request->phone_en;
    	$data->phone_bn = $request->phone_bn;
    	$data->open = $request->open;
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->owner_en = $request->owner_en;
    	$data->owner_bn = $request->owner_bn;
    	$data->ratting = $request->ratting_en;

    	if ($request->image) {
    		$image = $request->image;
    
	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(500,310)->save("upload/restaurant/".$image_name);
	        unlink($data->image);
	        $data->image = "upload/restaurant/".$image_name;
    	}

    	if ($data->save()) {
    		$notification = array(
    			'messege'=>'Restaurant Successfully Update',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.restaurant')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.restaurant')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Restaurant::find($id);
    	unlink($data->image);
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Restaurant Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.restaurant')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.restaurant')->with($notification);
        }
    }
}
