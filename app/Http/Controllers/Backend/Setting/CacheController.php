<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;

class CacheController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	return view('backend.setting.cache.index');
    }

    public function clearCache()
    {
    	Artisan::call('cache:clear');

    	$notification = array(
    	    'messege'=>'Cache Cleared',
    	    'type'=>'info'
    	);

    	return Redirect()->route('cache')->with($notification);
    }

    public function clearConfigCache()
    {
    	Artisan::call('config:clear');

    	$notification = array(
    	    'messege'=>'Config Cache Cleared',
    	    'type'=>'info'
    	);

    	return Redirect()->route('cache')->with($notification);
    }

    public function clearViewCache()
    {
    	Artisan::call('view:clear');

    	$notification = array(
    	    'messege'=>'View Cache Cleared',
    	    'type'=>'info'
    	);

    	return Redirect()->route('cache')->with($notification);
    }

    public function clearRouteCache()
    {
    	Artisan::call('route:clear');

    	$notification = array(
    	    'messege'=>'Route Cache Cleared',
    	    'type'=>'info'
    	);

    	return Redirect()->route('cache')->with($notification);
    }
}
