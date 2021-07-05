<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Model\Shop;
use App\Model\Restaurant;
use Auth;


class InfoController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index($id)
    {
    	$admin = Admin::find($id);
    	$shop='';
    	$restaurant='';
    	$module = '';
    	if ($admin->shop_id) {
    		$shop = Shop::find($admin->shop_id);
    		$module = 'Shop';
    	}else if($admin->restaurant_id){
    		$restaurant = Restaurant::find($admin->restaurant_id);
    		$module = 'Restaurant';
    	}
    	return view('backend.setting.info.index',compact('shop','restaurant','module'));
    }

    public function update(Request $request,$id)
    {	
    	if (Auth::user()->shop_id) {
    		$validatedData = $request->validate([
	    		'phone_en'=>'required',
	    		'phone_bn'=>'required'
	    	]);

	    	$data = Shop::find($id);
	    	$data->phone_en = $request->phone_en;
	    	$data->phone_bn = $request->phone_bn;
	    	$data->open = $request->open;
	    	$data->description_en = $request->description_en;
	    	$data->description_bn = $request->description_bn;
	    	$data->owner_en = $request->owner_en;
	    	$data->owner_bn = $request->owner_bn;

	    	if ($request->image) {
	    		$image = $request->image;
	    
		        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
		        Image::make($image)->resize(500,310)->save("upload/shop/".$image_name);
		        unlink($data->image);
		        $data->image = "upload/shop/".$image_name;
	    	}

	    	if ($data->save()) {
	    		$notification = array(
	    			'messege'=>'Info Successfully Update',
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
	    }else if(Auth::user()->restaurant_id){
	    	$validatedData = $request->validate([
	    		'phone_en'=>'required',
	    		'phone_bn'=>'required'
	    	]);

	    	$data = Restaurant::find($id);
	    	$data->phone_en = $request->phone_en;
	    	$data->phone_bn = $request->phone_bn;
	    	$data->open = $request->open;
	    	$data->description_en = $request->description_en;
	    	$data->description_bn = $request->description_bn;
	    	$data->owner_en = $request->owner_en;
	    	$data->owner_bn = $request->owner_bn;

	    	if ($request->image) {
	    		$image = $request->image;
	    
		        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
		        Image::make($image)->resize(500,310)->save("upload/restaurant/".$image_name);
		        unlink($data->image);
		        $data->image = "upload/restaurant/".$image_name;
	    	}

	    	if ($data->save()) {
	    		$notification = array(
	    			'messege'=>'Info Successfully Update',
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
    }
}
