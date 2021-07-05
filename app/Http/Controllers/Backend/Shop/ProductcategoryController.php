<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Productcategory;
use App\Model\Shop;
use Auth;

class ProductcategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }
    public function index()
    {
    	$data = Productcategory::where('shop_id',Auth::user()->shop_id)->get();
    	return view('backend.shop.productcategory.all',compact('data'));
    }
    public function create()
    {
        
    	return view('backend.shop.productcategory.add');
    }
    public function store(Request $request)
    {
    	$validatedData = $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = new Productcategory();

        $data->shop_id = Auth::user()->shop_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;

        if ($data->save()) {
            $notification = array(
                'messege'=>'New Product Category Successfully Added',
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
        
        $data = Productcategory::find($id);
        return view('backend.shop.productcategory.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
            
        ]);

        $data = Productcategory::find($id);
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;

        if ($data->save()) {
            $notification = array(
                'messege'=>'Product Category Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('all.product.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.product.category')->with($notification);        
        }
    }
    public function delete($id)
    {
        $data = Productcategory::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Product Category Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('all.product.category')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('all.product.category')->with($notification);        
        }
    }
}
