<?php

namespace App\Http\Controllers\Backend\Advertise;

use App\Advertise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
       $advertises= Advertise::all();
        return view('backend.advertise.index',compact('advertises'));
    }


    public function store(Request $request){
        $image=$request->file('image');
        if (!empty($image)){
            $imagename=$image->getClientOriginalName();
            $imagename = env('APP_URL').'/images/advertise/'.time().'_'.$imagename;
            $image->move(public_path('/images/advertise'),$imagename);
        }else{
            $imagename=null;
        }
        $advertise=new Advertise();
        $advertise->name=$request->title;
        $advertise->image=$imagename;
        $advertise->save();
        return redirect()->back();
    }
    public function destroy($id){
        $product = Advertise::find($id);
        if(File::exists($product->image)) {
            File::delete($product->image);
        }
        $product->delete();
        return back();
    }
}
