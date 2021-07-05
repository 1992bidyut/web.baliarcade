<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//advertisement ap
Route::Get('/baliarcade/all/advertise','Api\Advertise\AdvertisementController@index');

//splash Screnn
Route::Get('/baliarcade/all/splash','Api\Advertise\AdvertisementController@splash');

//shop
Route::Get('/baliarcade/all/shop/category','Api\Shop\ShopcategoryController@index');
Route::Get('/baliarcade/all/shop/category/{id}','Api\Shop\ShopcategoryController@show');
Route::Get('/baliarcade/all/product/category/{id}','Api\Shop\ShopController@index');
Route::Get('/baliarcade/all/product/{id}','Api\Shop\ShopController@show');

//food
Route::Get('/baliarcade/all/restaurant/category','Api\Food\RestaurantcategoryController@index');
Route::Get('/baliarcade/all/restaurant/category/{id}','Api\Food\RestaurantcategoryController@show');
Route::Get('/baliarcade/all/menu/category/{id}','Api\Food\MenuController@index');
Route::Get('/baliarcade/all/menu/{id}','Api\Food\MenuController@show');
Route::Get('/baliarcade/all/menu','Api\Food\MenuController@getAll');

Route::Get('/baliarcade/all/restaurant','Api\Food\RestaurantcategoryController@all');
//floor
Route::Get('/baliarcade/all/floor',function(){
    return response()->json(App\Model\Floor::all());
});

//order
Route::Post('/baliarcade/order','Api\Order\OrderController@order');
Route::Post('/baliarcade/order-confirm','Api\Order\OrderController@orderConfirm');

//customer auth

Route::Post('/baliarcade/customer/update/{id}','Api\Auth\AuthController@updateProfile');

Route::Post('/baliarcade/customer/sign-up','Api\Auth\AuthController@signup');
Route::Post('/baliarcade/customer/account-verification','Api\Auth\AuthController@verification');
Route::Post('/baliarcade/customer/login','Api\Auth\AuthController@login');
Route::Post('/baliarcade/customer/password-reset-code','Api\Auth\AuthController@sendpasswordresetcode');
Route::Post('/baliarcade/customer/password-reset','Api\Auth\AuthController@passwordreset');
