<?php

namespace App\Http\Controllers\Backend\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Restaurantcategory;
use App\Model\Floor;

class RestaurantcategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
    	$data = Restaurantcategory::all();
    	return view('backend.food.restaurantcategory.all',compact('data'));
    }
    public function create()
    {
        $floor = Floor::all();
    	return view('backend.food.restaurantcategory.add',compact('floor'));
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    	    'floor_id'=>'required',
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = new Restaurantcategory();
        $data->floor_id = $request->floor_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;

        if ($data->save()) {
            $notification = array(
                'messege'=>'New Restaurant Category Successfully Added',
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
    	$data = Restaurantcategory::find($id);
    	$floor = Floor::all();
    	return view('backend.food.restaurantcategory.edit',compact('data','floor'));
    }

    public function update(Request $request,$id)
    {
    	$validatedData = $request->validate([
    	    'floor_id'=>'required',
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = Restaurantcategory::find($id);
        
        $data->floor_id = $request->floor_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;

        if ($data->save()) {
            $notification = array(
                'messege'=>'New Restaurant Category Successfully Update',
                'type'=>'success'
            );

            return Redirect()->route('all.restaurant.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.restaurant.category')->with($notification);        
        }
    }

    public function delete($id)
    {
    	$data = Restaurantcategory::find($id);
    	if ($data->delete()) {
            $notification = array(
                'messege'=>'New Restaurant Category Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('all.restaurant.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.restaurant.category')->with($notification);        
        }
    }
}
