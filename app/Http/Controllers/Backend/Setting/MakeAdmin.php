<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shopcategory;
use App\Model\Shop;
use App\Model\Restaurantcategory;
use App\Model\Restaurant;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class MakeAdmin extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {	
    	$admins = Admin::all();
    	return view('backend.setting.admin.all',compact('admins'));
    }
    public function create()
    {
    	$shopcategories = Shopcategory::all();
    	$restaurantcategories = Restaurantcategory::all();
    	return view('backend.setting.admin.add',compact('shopcategories','restaurantcategories'));
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'name'=>'required',
    		'email'=>'required',
    		'password'=>'required|min:8',
    		'status'=>'required',
    		'type'=>'required',
    	]);

    	$data = new Admin();
    	$data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = Hash::make($request->password);
    	$data->status = $request->status;
    	$data->type = $request->type;

    	if ($data->type == 0) {
    		$data->module = $request->module;
    		$data->shopcategory_id = $request->shopcategory_id;
    		$data->shop_id = $request->shop_id;
    		$data->restaurantcategory_id = $request->restaurantcategory_id;
    		$data->restaurant_id = $request->restaurant_id;
    	}

    	if ($data->save()) {
            $notification = array(
                'messege'=>'New Admin Successfully Added',
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
        $data = Admin::find($id);
        $shopcategories = Shopcategory::all();
        $shops = Shop::all();
        $restaurantcategories = Restaurantcategory::all();
        $restaurants = Restaurant::all();
        return view('backend.setting.admin.edit',compact('data','shops','shopcategories','restaurants','restaurantcategories'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'status'=>'required',
            'type'=>'required',
        ]);

        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        $data->status = $request->status;
        $data->type = $request->type;

        if ($data->type == 0) {
            $data->module = $request->module;
            $data->shopcategory_id = $request->shopcategory_id;
            $data->shop_id = $request->shop_id;
            $data->restaurantcategory_id = $request->restaurantcategory_id;
            $data->restaurant_id = $request->restaurant_id;
        }

        if ($data->save()) {
            $notification = array(
                'messege'=>'Admin Info Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('make.admin')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('make.admin')->with($notification);        
        }
    }

    public function delete($id)
    {
        $data = Admin::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Admin Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('make.admin')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('make.admin')->with($notification);        
        }
    }
}
