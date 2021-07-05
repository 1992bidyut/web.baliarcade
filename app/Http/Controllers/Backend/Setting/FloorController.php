<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Floor;

class FloorController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
        $data = Floor::all();
    	return view('backend.setting.floor.all',compact('data'));
    }

    public function create()
    {
    	return view('backend.setting.floor.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_en' => 'required|unique:floors',
            'name_bn' => 'required|unique:floors',
        ]);

        $data = new Floor();

        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->floor_label = $request->floor_label;

        if ($data->save()) {
            $notification = array(
                'messege'=>'New Floor Successfully Added',
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
        $data = Floor::find($id);
        return view('backend.setting.floor.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name_en' => 'required',
            'name_bn' => 'required',
        ]);

        $data = Floor::find($id);

        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->floor_label = $request->floor_label;

        if ($data->save()) {
            $notification = array(
                'messege'=>'Floor Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('floor')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('floor')->with($notification);        
        }
    }

    public function delete($id)
    {
        $data = Floor::find($id);
        if ($data->delete()) {
            $notification = array(
                'messege'=>'Floor Successfully Deleted',
                'type'=>'success'
            );

            return Redirect()->route('floor')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Unsuccessful',
                'type'=>'error'
            );

            return Redirect()->route('floor')->with($notification);        
        }
    }
}
