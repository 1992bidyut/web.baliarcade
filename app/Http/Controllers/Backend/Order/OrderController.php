<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Orderdetails;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function todayPendingOrder()
    {
    	$order = Order::where('phone','!=',Null)->where('order_date',date('d/m/Y'))->get();
    	return view('backend.order.todayPending',compact('order'));
    }

    public function allPendingOrder()
    {
        $order = Order::where('phone','!=',Null)->get();
        return view('backend.order.allPending',compact('order'));   
    }

    public function todayProcessingOrder()
    {
        $order = Order::where('phone','!=',Null)->where('order_date',date('d/m/Y'))->get();
        return view('backend.order.todayProcessing',compact('order'));
    }

    public function allProcessingOrder()
    {
        $order = Order::where('phone','!=',Null)->get();
        return view('backend.order.allProcessing',compact('order'));
    }

    public function todayCompleteOrder()
    {
        $order = Order::where('phone','!=',Null)->where('order_date',date('d/m/Y'))->get();
        return view('backend.order.todayComplete',compact('order'));
    }

    public function allCompleteOrder()
    {
        $order = Order::where('phone','!=',Null)->get();
        return view('backend.order.allComplete',compact('order'));
    }

    public function orderProcess($id)
    {

        if (Auth::user()->shop_id) {
           $orders = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->get();
           foreach ($orders as $row) {
               $row->status = "Processing";
               $row->save();
           }
        }else if(Auth::user()->restaurant_id){
            $orders = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->get();
           foreach ($orders as $row) {
               $row->status = "Processing";
               $row->save();
           }
        }

        $notification = array(
            'messege'=>'Successfully Done',
            'type'=>'success'
        );

        return Redirect()->back()->with($notification);
        
    }

    public function orderComplete($id)
    {
        if (Auth::user()->shop_id) {
           $orders = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->get();
           foreach ($orders as $row) {
               $row->status = "Complete";
               $row->save();
           }
        }else if(Auth::user()->restaurant_id){
            $orders = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->get();
           foreach ($orders as $row) {
               $row->status = "Complete";
               $row->save();
           }
        }

        $notification = array(
            'messege'=>'Successfully Done',
            'type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function orderDelete($id)
    {
      if (Auth::user()->shop_id) {
         $orders = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->get();
         foreach ($orders as $row) {
             $row->delete();
         }
      }else if(Auth::user()->restaurant_id){
          $orders = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->get();
         foreach ($orders as $row) {
             $row->delete();
         }
      }

      $notification = array(
          'messege'=>'Successfully Done',
          'type'=>'success'
      );

      return Redirect()->back()->with($notification);
    }

    public function orderDetails($id)
    {
      $orders;
      $module;
      $order_id = $id;
      $status;
      $total;
      $info = Order::find($id);
      if (Auth::user()->shop_id) {
         $orders = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->get();
         $status = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->first();
         $total = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->sum('unit_total');
         $module = 'Shop';
      }else if(Auth::user()->restaurant_id){
          $orders = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->get();
          $status = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->first();
          $total = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->sum('unit_total');
          $module = 'Restaurant';
      }
      return view('backend.order.details',compact('info','orders','module','order_id','status','total'));
    }

    public function printInvoice($id)
    {
      $orders;
      $module;
      $order_id = $id;
      $status;
      $total;
      $info = Order::find($id);
      if (Auth::user()->shop_id) {
         $orders = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->get();
         $status = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->first();
         $total = Orderdetails::where('order_id',$id)->where('shop_id',Auth::user()->shop_id)->sum('unit_total');
         $module = 'Shop';
      }else if(Auth::user()->restaurant_id){
          $orders = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->get();
          $status = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->first();
          $total = Orderdetails::where('order_id',$id)->where('restaurant_id',Auth::user()->restaurant_id)->sum('unit_total');
          $module = 'Restaurant';
      }
      return view('backend.order.invoice',compact('info','orders','module','order_id','status','total'));
    }
}
