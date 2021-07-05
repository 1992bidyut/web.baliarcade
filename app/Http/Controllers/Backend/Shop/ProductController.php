<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productcategory;
use App\Model\Shopcategory;
use App\Model\Shop;
use App\Model\Shopproduct;
use Image;
use Auth;


class ProductController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
    	$data = Shopproduct::where('shop_id',Auth::user()->shop_id)->get();

    	return view('backend.shop.product.all',compact('data'));
    }
    public function create()
    {
    	$productcategory = Productcategory::where('shop_id',Auth::user()->shop_id)->get();
    	
    	return view('backend.shop.product.add',compact('productcategory'));
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'price_en'=>'required|numeric',
    		'price_bn'=>'required',
    		'quantity_en'=>'required|numeric',
    		'quantity_bn'=>'required',
    		'productcategory_id'=>'required',
    		'image'=>'required'
    	]);


    	$data = new Shopproduct();

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->shopcategory_id = Auth::user()->shopcategory_id;
    	$data->productcategory_id = $request->productcategory_id;
    	$data->shop_id = Auth::user()->shop_id;
    	$data->price_en = $request->price_en;
    	$data->price_bn = $request->price_bn;
    	$data->quantity_en = $request->quantity_en;
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->quantity_bn = $request->quantity_bn;

    	$data->discount_en = $request->discount_en;
    	$data->discount_bn = $request->discount_bn;
    	$data->size_en = $request->size_en;
    	$data->size_bn = $request->size_bn;
    	$data->color_en = $request->color_en;
    	$data->color_bn = $request->color_bn;
    	$data->warranty_en = $request->warranty_en;
    	$data->warranty_bn = $request->warranty_bn;
    	$data->description_en = $request->description_en;
    	$data->description_en = $request->description_en;
    	$data->description_en = $request->description_en;
    	$data->buying_date = $request->buying_date;
    	$data->expire_date = $request->expire_date;

    	$image = $request->image;
    
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save("upload/shopproduct/".$image_name);
        $data->image = "upload/shopproduct/".$image_name;
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Product Successfully Added',
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
    	$productcategory = Productcategory::where('shop_id',Auth::user()->shop_id)->get();

    	$data = Shopproduct::find($id);
    	return view('backend.shop.product.edit',compact('data','productcategory'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    		'name_en'=>'required',
    		'name_bn'=>'required',
    		'price_en'=>'required|numeric',
    		'price_bn'=>'required',
    		'quantity_en'=>'required|numeric',
    		'quantity_bn'=>'required',
    		'productcategory_id'=>'required'
    		
    	]);


    	$data = Shopproduct::find($id);

    	$data->name_en = $request->name_en;
    	$data->name_bn = $request->name_bn;
    	$data->shopcategory_id = Auth::user()->shopcategory_id;
    	$data->productcategory_id = $request->productcategory_id;
    	$data->shop_id = Auth::user()->shop_id;
    	$data->price_en = $request->price_en;
    	$data->price_bn = $request->price_bn;
    	$data->quantity_en = $request->quantity_en;
    	$data->description_en = $request->description_en;
    	$data->description_bn = $request->description_bn;
    	$data->quantity_bn = $request->quantity_bn;

    	$data->discount_en = $request->discount_en;
    	$data->discount_bn = $request->discount_bn;
    	$data->size_en = $request->size_en;
    	$data->size_bn = $request->size_bn;
    	$data->color_en = $request->color_en;
    	$data->color_bn = $request->color_bn;
    	$data->warranty_en = $request->warranty_en;
    	$data->warranty_bn = $request->warranty_bn;
    	$data->description_en = $request->description_en;
    	$data->description_en = $request->description_en;
    	$data->description_en = $request->description_en;
    	$data->buying_date = $request->buying_date;
    	$data->expire_date = $request->expire_date;

    	$image = $request->image;
    	if ($image) {
    		
    
	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(500,310)->save("upload/shopproduct/".$image_name);
	        unlink($data->image);
	        $data->image = "upload/shopproduct/".$image_name;
    	}
        

        if ($data->save()) {
    		$notification = array(
    			'messege'=>'Product Successfully Updated',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.shop.product')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.shop.product')->with($notification);
        }
    }

    public function delete($id)
    {
    	$data = Shopproduct::find($id);
    	
    	unlink($data->image);
    	
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Product Successfully Deleted',
    			'type'=>'success'
    		);

   			return Redirect()->route('all.shop.product')->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->route('all.shop.product')->with($notification);
        }

    }

    //multiple dependency

    public function getShop($id)
    {
    	

    	$shop = Shop::where('shopcategory_id',$id)->get();
    	return response()->json($shop);
    }
}
