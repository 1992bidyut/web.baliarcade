<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shopcategory;
use App\Model\Floor;
use Image;

class ShopcategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Shopcategory::all();
    	return view('backend.shop.shopcategory.all',compact('data'));
    }

    public function create()
    {
        $floor = Floor::all();
    	return view('backend.shop.shopcategory.add',compact('floor'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'floor_id'=>'required',
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = new Shopcategory();
        
        $data->floor_id = $request->floor_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
           if ($request->image){
        		$image = $request->image;
    	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
    	        Image::make($image)->resize(500,310)->save("upload/shop_category/".$image_name);
    	        $data->image = env('APP_URL')."/upload/shop_category/".$image_name;
        	}
        if ($data->save()) {
            $notification = array(
                'messege'=>'New Shop Category Successfully Added',
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
        $data = Shopcategory::find($id);
        $floor = Floor::all();
        return view('backend.shop.shopcategory.edit',compact('data','floor'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'floor_id'=>'required',
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = Shopcategory::find($id);
        $data->floor_id = $request->floor_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        
         if ($request->image){
    		$image = $request->image;
	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(500,310)->save("upload/shop_category/".$image_name);
	        $data->image = env('APP_URL')."/upload/shop_category/".$image_name;
    	}
        if ($data->save()) {
            $notification = array(
                'messege'=>'Shop Category Successfully Updated',
                'type'=>'success'
            );
            return Redirect()->route('all.shopcategory')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.shopcategory')->with($notification);        
        }
    }
    public function delete($id)
    {
        $data = Shopcategory::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Shop Category Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('all.shopcategory')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.shopcategory')->with($notification);        
        }
    }
}
