<?php

namespace App\Http\Controllers\Backend\Splash;

use App\Http\Controllers\Controller;
use App\SplashScreen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SplashScreenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   public function index(){

        $Splashes = SplashScreen::all();
        return view('backend.splash.index',compact('Splashes'));
   }

   public function store(Request $request){
        $image=$request->file('image');
        if (!empty($image)){
            $imagename=$image->getClientOriginalName();
            $imagename = env('APP_URL').'/images/splash/'.time().'_'.$imagename;
            $image->move(public_path('/images/splash'),$imagename);
        }else{
            $imagename=null;
        }
        $advertise=new SplashScreen();
        $advertise->name=$request->title;
        $advertise->image=$imagename;
        $advertise->save();
        return redirect()->back();
    }

    public function destroy($id){
        $product = SplashScreen::find($id);
        if(File::exists($product->image)) {
            File::delete($product->image);
        }
        $product->delete();
        return back();
    }
}
