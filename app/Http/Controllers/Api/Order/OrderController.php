<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Orderdetails;
use DB;

class OrderController extends Controller
{
    public function order(Request $request)
    {
    	$order = new Order();

    	$order->email = $request->email;
    	$order->order_date = date('d/m/Y');
    	$order->order_month = date('m/Y');
    	$order->order_year = date('Y');
    	$order->total_quantity = $request->total_quantity;
    	$order->total = $request->total;
    	$order->shipping_cost = $request->shipping_cost;
    	$order->grandtotal = $request->grandtotal;
    	

    	$order->save();


    	$order_id = Order::where('email',$request->email)->orderBy('id','DESC')->first();

     	$data = array();



    // 	foreach ($request->foods as $value) {
    		
    // 		$data['order_id'] = $order_id->id;
    // 		$data['food_id'] = $value['food_id'];
    // 		$data['unit_quantity'] = $value['unit_quantity'];
    // 		$data['unitcost'] = $value['unitcost'];
    // 		$data['unit_total'] = $value['unit_total'];

    // 		$insert=DB::table('orderdetails')->insert($data);
    // 	}
    // 	return response(201);
    	
    	if ($request->items[0]['shop_id']) {
    		$shop_id_data = str_replace('[','',$request->items[0]['shop_id']);
        	$shop_id_data = str_replace(']','',$shop_id_data);
        	$shop_id = explode(",", $shop_id_data);
    	}

        if ($request->items[0]['restaurant_id']) {
        	$restaurant_id_data = str_replace('[','',$request->items[0]['restaurant_id']);
        	$restaurant_id_data = str_replace(']','',$restaurant_id_data);
        	$restaurant_id = explode(",", $restaurant_id_data);
        }
        
        if ($request->items[0]['product_id']) {
        	$product_id_data = str_replace('[','',$request->items[0]['product_id']);
        	$product_id_data = str_replace(']','',$product_id_data);
        	$product_id = explode(",", $product_id_data);
        }

        if ($request->items[0]['menu_id']) {
        	$menu_id_data = str_replace('[','',$request->items[0]['menu_id']);
        	$menu_id_data = str_replace(']','',$menu_id_data);
        	$menu_id = explode(",", $menu_id_data);
        }
        
        $unit_quantity_data = str_replace('[','',$request->items[0]['unit_quantity']);
        $unit_quantity_data = str_replace(']','',$unit_quantity_data);
        $unit_quantity = explode(",", $unit_quantity_data);
        
        $unit_cost_data = str_replace('[','',$request->items[0]['unit_cost']);
        $unit_cost_data = str_replace(']','',$unit_cost_data);
        $unit_cost = explode(",", $unit_cost_data);
        
        $unit_total_data = str_replace('[','',$request->items[0]['unit_total']);
        $unit_total_data = str_replace(']','',$unit_total_data);
        $unit_total = explode(",", $unit_total_data);
        
        for ($i=0; $i <count($unit_cost) ; $i++) { 
            $data['order_id'] = $order_id->id;
            if ($request->items[0]['shop_id']) {
             	$data['shop_id'] = $shop_id[$i];
            }
            if ($request->items[0]['restaurant_id']) {
            	$data['restaurant_id'] = $restaurant_id[$i];
            }
            if ($request->items[0]['product_id']) {
             	$data['product_id'] = $product_id[$i];
            }
            if ($request->items[0]['menu_id']) {
            	$data['menu_id'] = $menu_id[$i];
            }
            $data['unit_quantity'] = $unit_quantity[$i];
            $data['unit_cost'] = $unit_cost[$i];
            $data['unit_total'] = $unit_total[$i];
            $insert=DB::table('orderdetails')->insert($data);
             
         }
         
        return response(201);
    	

    }
    
    public function orderConfirm(Request $request)
    {
        $order = Order::where('email',$request->email)->orderBy('id','DESC')->first();
        
        $order->phone = $request->phone;
        $order->name = $request->name;
        $order->order_status = 'Pending';
        $order->payment_by = $request->payment_by;
        $order->order_type = $request->order_type;
        $order->shipping_addr = $request->shipping_addr;
        $order->pay = $request->pay;
        
        $order->save();
        
        return response()->json($order);
        
        
    }
    
}
