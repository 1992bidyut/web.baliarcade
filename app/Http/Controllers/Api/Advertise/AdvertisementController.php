<?php

namespace App\Http\Controllers\Api\Advertise;

use App\Advertise;
use App\Http\Controllers\Controller;
use App\SplashScreen;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(){
        $advertises=Advertise::all();
        return response()->json($advertises);
    }

    public function splash(){
        $splash=SplashScreen::all();
        return response()->json($splash);
    }
}
