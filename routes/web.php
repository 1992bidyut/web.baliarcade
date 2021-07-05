<?php

use Illuminate\Support\Facades\Route;
/*
   -----to find route easily, search by keyword------
   ->admin auth
   ->shop module
   ->foodcourt module
   ->setting
*/
   /*
    DB_DATABASE=ringerso_baliarcade
    DB_USERNAME=ringerso_baliarc
    DB_PASSWORD=baliarcade
   */

 Route::get('/', function () {
     return 'Welcome To BaliarCade';
 });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin

Route::prefix('/baliarcade/admin')->group(function () {

	//---------------------------------admin auth routes start------------------------------
	Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
   	Route::post('/login', 'Backend\Auth\LoginController@login');
   	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

   	Route::post('/logout', 'AdminController@logout')->name('admin.logout');
   	Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   	Route::post('/password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   	Route::get('/password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
   	Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('admin.password.update');
   	//------------------------------------admin auth ends here----------------------------------------------




    //-----------------------------shop module route starts here-------------------------------
    //shop category
    Route::get('/add-new-shop-category','Backend\Shop\ShopcategoryController@create')->name('add.new.shopcategory')->middleware('superadmin');
    Route::get('/all-shop-category','Backend\Shop\ShopcategoryController@index')->name('all.shopcategory')->middleware('superadmin');
    Route::post('/store-new-shop-category','Backend\Shop\ShopcategoryController@store')->name('store.shop.category')->middleware('superadmin');
    Route::get('/edit-shop-category/{id}','Backend\Shop\ShopcategoryController@edit')->name('shop.category.edit')->middleware('superadmin');
    Route::post('/update-shop-category/{id}','Backend\Shop\ShopcategoryController@update')->name('update.shop.category')->middleware('superadmin');
    Route::get('/delete-shop-category/{id}','Backend\Shop\ShopcategoryController@delete')->name('shop.category.delete')->middleware('superadmin');

    //shop
    Route::get('/all-shop','Backend\Shop\ShopController@index')->name('all.shop')->middleware('superadmin');
    Route::get('/add-new-shop','Backend\Shop\ShopController@create')->name('add.new.shop')->middleware('superadmin');
    Route::post('/store-shop','Backend\Shop\ShopController@store')->name('store.shop')->middleware('superadmin');
    Route::get('/edit-shop/{id}','Backend\Shop\ShopController@edit')->name('shop.edit')->middleware('superadmin');
    Route::post('/update-shop/{id}','Backend\Shop\ShopController@update')->name('update.shop')->middleware('superadmin');
    Route::get('/delete-shop/{id}','Backend\Shop\ShopController@delete')->name('shop.delete')->middleware('superadmin');

    //product category
    Route::get('/all-product-category','Backend\Shop\ProductcategoryController@index')->name('all.product.category');
    Route::get('/add-new-product-category','Backend\Shop\ProductcategoryController@create')->name('add.new.productcategory');
    Route::post('/store-product-category','Backend\Shop\ProductcategoryController@store')->name('store.product.category');
    Route::get('/edit-product-category/{id}','Backend\Shop\ProductcategoryController@edit')->name('product.category.edit');
    Route::post('/update-product-category/{id}','Backend\Shop\ProductcategoryController@update')->name('update.product.category');
    Route::get('/delete-product-category/{id}','Backend\Shop\ProductcategoryController@delete')->name('product.category.delete');

    //product
    Route::get('/all-product','Backend\Shop\ProductController@index')->name('all.shop.product');
    Route::get('/add-new-product','Backend\Shop\ProductController@create')->name('add.new.product');
    Route::post('/store-product','Backend\Shop\ProductController@store')->name('store.product');
    Route::get('/edit-product/{id}','Backend\Shop\ProductController@edit')->name('product.edit');
    Route::post('/update-product/{id}','Backend\Shop\ProductController@update')->name('update.product');
    Route::get('/delete-product/{id}','Backend\Shop\ProductController@delete')->name('product.delete');

    //multiple dependency
    Route::get('/get/shop/{id}','Backend\Shop\ProductController@getShop');


    //-----------------------------shop module route ends here--------------------------------


    //-----------------------------foodcourt module route starts here--------------------------------------------------
    //restaurant category
    Route::get('/add-new-restaurant-category','Backend\Food\RestaurantcategoryController@create')->name('add.new.restaurant.category')->middleware('superadmin');
    Route::get('/all-restaurant-category','Backend\Food\RestaurantcategoryController@index')->name('all.restaurant.category')->middleware('superadmin');
    Route::post('/store-new-restaurant-category','Backend\Food\RestaurantcategoryController@store')->name('store.restaurant.category')->middleware('superadmin');
    Route::get('/edit-restaurant-category/{id}','Backend\Food\RestaurantcategoryController@edit')->name('restaurant.category.edit')->middleware('superadmin');
    Route::post('/update-restaurant-category/{id}','Backend\Food\RestaurantcategoryController@update')->name('update.restaurant.category')->middleware('superadmin');
    Route::get('/delete-restaurant-category/{id}','Backend\Food\RestaurantcategoryController@delete')->name('restaurant.category.delete')->middleware('superadmin');

    //advertisement
    Route::get('/advertisement','Backend\Advertise\AdvertisementController@index')->name('all.advertisement')->middleware('superadmin');
    Route::post('/advertisement/store','Backend\Advertise\AdvertisementController@store')->name('store.advertise')->middleware('superadmin');
    Route::get('/advertisement/delete/{id}','Backend\Advertise\AdvertisementController@destroy')->name('advertisement.destroy')->middleware('superadmin');



    //Splash Screen
    Route::get('/splashscreen','Backend\Splash\SplashScreenController@index')->name('all.splash_screen')->middleware('superadmin');
    Route::post('/splashscreen/store','Backend\Splash\SplashScreenController@store')->name('store.splash_screen')->middleware('superadmin');
    Route::get('/splashscreen/delete/{id}','Backend\Splash\SplashScreenController@destroy')->name('splash.destroy')->middleware('superadmin');

    //restaurant
    Route::get('/add-new-restaurant','Backend\Food\RestaurantController@create')->name('add.new.restaurant')->middleware('superadmin');
    Route::get('/all-restaurant','Backend\Food\RestaurantController@index')->name('all.restaurant')->middleware('superadmin');
    Route::post('/store-new-restaurant','Backend\Food\RestaurantController@store')->name('store.restaurant')->middleware('superadmin');
    Route::get('/edit-restaurant/{id}','Backend\Food\RestaurantController@edit')->name('restaurant.edit')->middleware('superadmin');
    Route::post('/update-restaurant/{id}','Backend\Food\RestaurantController@update')->name('update.restaurant')->middleware('superadmin');
    Route::get('/delete-restaurant/{id}','Backend\Food\RestaurantController@delete')->name('restaurant.delete')->middleware('superadmin');

    //menu category
    Route::get('/add-new-menu-category','Backend\Food\MenucategoryController@create')->name('add.new.menucategory');
    Route::get('/all-menu-category','Backend\Food\MenucategoryController@index')->name('all.menu.category');
    Route::post('/store-new-menu-category','Backend\Food\MenucategoryController@store')->name('store.menu.category');
    Route::get('/edit-menu-category/{id}','Backend\Food\MenucategoryController@edit')->name('menu.category.edit');
    Route::post('/update-menu-category/{id}','Backend\Food\MenucategoryController@update')->name('update.menu.category');
    Route::get('/delete-menu-category/{id}','Backend\Food\MenucategoryController@delete')->name('menu.category.delete');

    // //menu
    Route::get('/add-new-menu','Backend\Food\MenuController@create')->name('add.new.menu');
    Route::get('/all-menu','Backend\Food\MenuController@index')->name('all.menu');
    Route::post('/store-new-menu','Backend\Food\MenuController@store')->name('store.menu');
    Route::get('/edit-menu/{id}','Backend\Food\MenuController@edit')->name('menu.edit');
    Route::post('/update-menu/{id}','Backend\Food\MenuController@update')->name('update.menu');
    Route::get('/delete-menu/{id}','Backend\Food\MenuController@delete')->name('menu.delete');

    //multiple dependency
    Route::get('/get/restaurant/{id}','Backend\Food\MenuController@getRestaurant');

    //-----------------------------foodcourt module route ends here-----------------------


    //------------------------------Order route starts here-------------------------------
    //pending order
    Route::get('/today-pending-order','Backend\Order\OrderController@todayPendingOrder')->name('today.pending.order');
    Route::get('/all-pending-order','Backend\Order\OrderController@allPendingOrder')->name('all.pending.order');

    //processing order
    Route::get('/today-processing-order','Backend\Order\OrderController@todayProcessingOrder')->name('today.processing.order');
    Route::get('/all-processing-order','Backend\Order\OrderController@allProcessingOrder')->name('all.processing.order');

    //complete order
    Route::get('/today-complete-order','Backend\Order\OrderController@todayCompleteOrder')->name('today.complete.order');
    Route::get('/all-complete-order','Backend\Order\OrderController@allCompleteOrder')->name('all.complete.order');

    //proccesing the order
    Route::get('/order-process/{id}','Backend\Order\OrderController@orderProcess')->name('order.process');
    Route::get('/complete-process/{id}','Backend\Order\OrderController@orderComplete')->name('complete.order');

    //order cancel
    Route::get('/order-delete/{id}','Backend\Order\OrderController@orderDelete')->name('order.delete');

    //order details
    Route::get('/order-details/{id}','Backend\Order\OrderController@orderDetails')->name('order.details');

    //print invoice
    Route::get('/print-invoice/{id}','Backend\Order\OrderController@printInvoice')->name('print.invoice');



    //--------------------------------Order route ends here----------------------------------------

    //------------------------------setting route starts here-------------------------------
    //floor
    Route::get('/floor','Backend\Setting\FloorController@index')->name('floor')->middleware('superadmin');
    Route::get('/add-new-floor','Backend\Setting\FloorController@create')->name('add.new.floor')->middleware('superadmin');
    Route::post('/store-floor','Backend\Setting\FloorController@store')->name('store.floor')->middleware('superadmin');
    Route::get('/edit-floor/{id}','Backend\Setting\FloorController@edit')->name('floor.edit')->middleware('superadmin');
    Route::post('/update-floor/{id}','Backend\Setting\FloorController@update')->name('update.floor')->middleware('superadmin');
    Route::get('/delete-floor/{id}','Backend\Setting\FloorController@delete')->name('floor.delete')->middleware('superadmin');


    //admin setting
    Route::get('/make-another-admin','Backend\Setting\MakeAdmin@index')->name('make.admin')->middleware('superadmin');
    Route::get('/create-another-admin','Backend\Setting\MakeAdmin@create')->name('create.admin')->middleware('superadmin');
    Route::post('/store-another-admin','Backend\Setting\MakeAdmin@store')->name('store.admin')->middleware('superadmin');
    Route::get('/edit-admin/{id}','Backend\Setting\MakeAdmin@edit')->name('edit.admin')->middleware('superadmin');
    Route::post('/update-admin/{id}','Backend\Setting\MakeAdmin@update')->name('update.admin')->middleware('superadmin');
    Route::get('/delete-admin/{id}','Backend\Setting\MakeAdmin@delete')->name('admin.delete')->middleware('superadmin');

    Route::get('/change-password','AdminController@changepassword')->name('change.password');
    Route::post('/update-admin-password/{id}', 'AdminController@updatePassword')->name('update.admin.password');


    //customer
    Route::get('/all-customer','Backend\Customer\CustomerController@index')->name('all.customer');
    Route::get('/delete-customer/{id}','Backend\Customer\CustomerController@delete')->name('customer.delete');


    //cache
    Route::get('/cache','Backend\Setting\CacheController@index')->name('cache');
    Route::get('/clear-cache','Backend\Setting\CacheController@clearCache')->name('clear.cache');
    Route::get('/clear-config-cache','Backend\Setting\CacheController@clearConfigCache')->name('clear.config.cache');
    Route::get('/clear-view-cache','Backend\Setting\CacheController@clearViewCache')->name('clear.view.cache');
    Route::get('/clear-route-cache','Backend\Setting\CacheController@clearRouteCache')->name('clear.route.cache');

    //info
    Route::get('/info/{id}','Backend\Setting\InfoController@index')->name('info');
    Route::post('/update-info/{id}','Backend\Setting\InfoController@update')->name('update.info');

    //--------------------------------setting route ends here----------------------------------------
});
