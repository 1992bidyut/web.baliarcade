<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shopcategory;
use App\Model\Floor;
use App\Model\Shop;
use Image;

class ShopController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$data = Shop::all();	
    	return view('backend.shop.shops.all',compact('data'));
    }

    public function create()
    {
    	$shopcategory = Shopcategory::all();
    	$floor = Floor::all();
       	return view('backend.shop.shops.add',compact('shopcategory','floor'));
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'shopcategory_id'=>'required',
    		'floor_id'=>'required',
    		'phone_en'=>'required',
    		'phone_bn'=>'required',
    		'image'=>'required'
    	]);

    	$data = new Shop();

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->shopcategory_id = $request->shopcategory_id;
    	$data->floor_id = $request->floor_id;
    	$data->phone_en = $request->phone_en;
    	$data->phone_bn = $request->phone_bn;
    	$data->open = $request->open;
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->owner_en = $request->owner_en;
    	$data->owner_bn = $request->owner_bn;

    	$image = $request->image;
    
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save("upload/shop/".$image_name);
        $data->image = "upload/shop/".$image_name;
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Shop Successfully Added',
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
    	$shopcategory = Shopcategory::all();
    	$floor = Floor::all();

    	$data = Shop::find($id);

    	return view('backend.shop.shops.edit',compact('shopcategory','floor','data'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'shopcategory_id'=>'required',
    		'floor_id'=>'required',
    		'phone_en'=>'required',
    		'phone_bn'=>'required'
    	]);

    	$data = Shop::find($id);

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->shopcategory_id = $request->shopcategory_id;
    	$data->floor_id = $request->floor_id;
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
    			'messege'=>'Shop Successfully Update',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.shop')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.shop')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Shop::find($id);
    	unlink($data->image);
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Shop Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.shop')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.shop')->with($notification);
        }
    }
}
