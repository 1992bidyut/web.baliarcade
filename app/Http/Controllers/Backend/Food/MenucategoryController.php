<?php

namespace App\Http\Controllers\Backend\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Menucategory;
use App\Model\Restaurant;
use Auth;
use Image;

class MenucategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
    	$data = Menucategory::where('restaurant_id',Auth::user()->restaurant_id)->get();
    	return view('backend.food.menucategory.all',compact('data'));
    }
    public function create()
    {
        
    	return view('backend.food.menucategory.add');
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            'image'=>'required'
        ]);

        $data = new Menucategory();
        $data->restaurant_id = Auth::user()->restaurant_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $image = $request->image;
    
        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,310)->save("upload/menucategory/".$image_name);
        $data->image = "upload/menucategory/".$image_name;

        if ($data->save()) {
            $notification = array(
                'messege'=>'New Menu Category Successfully Added',
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
        
        $data = Menucategory::find($id);
        return view('backend.food.menucategory.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            
        ]);

        $data = Menucategory::find($id);
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        
        $image = $request->image;
    	if ($image) {
    		
    
	        $image_name = date('dm').uniqid().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(500,310)->save("upload/menucategory/".$image_name);
	       // unlink($data->image);
	        $data->image = "upload/menucategory/".$image_name;
    	}

        if ($data->save()) {
            $notification = array(
                'messege'=>'Menu Category Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('all.menu.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.menu.category')->with($notification);        
        }
    }
    public function delete($id)
    {
        $data = Menucategory::find($id);
        unlink($data->image);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Menucategory Category Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('all.menu.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.menu.category')->with($notification);        
        }
    }
}
