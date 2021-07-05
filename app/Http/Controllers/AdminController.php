<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Admin;
use App\Model\Floor;
use App\Model\Restaurantcategory;
use App\Model\Restaurant;
use App\Model\Shopcategory;
use App\Model\Shop;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = Admin::count();
        $floor = Floor::count();
        $restaurantcategory = Restaurantcategory::count();
        $restaurant = Restaurant::count();
        $shopcategory = Shopcategory::count();
        $shop = Shop::count();
        return view('backend.dashboard',compact('admin','floor','restaurantcategory','restaurant','shopcategory','shop'));
    }

    public function changepassword()
    {
        return view('backend.setting.admin.changepassword');
    }

    public function updatePassword(Request $request,$id){
        $validatedData = $request->validate([
            'password'=>'required|min:8',
            'confirmpassword'=>'required|min:8',
        ]);

        $admin = Admin::find($id);
        if ($request->password != $request->confirmpassword) {
            return redirect()->back()->with('messege','Password Not Match');
        }else{
            $admin->password = Hash::make($request->password);
            if ($admin->save()) {
                $notification = array(
                    'messege'=>'Password Successfully Updated',
                    'type'=>'info'
                );

                return Redirect()->route('admin.dashboard')->with($notification);
            }
        }
    }

     public function logout()
    {
         Auth::logout();
         return redirect()->to('/baliarcade/admin/login');
    }
}
