<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth:admin');
    }

    public function index()
    {
    	$customer = Customer::all();
    	return view('backend.customer.index',compact('customer'));
    }

    public function delete($id)
    {
    	$data = Customer::find($id);
    	if ($data->delete()) {
    		$notification = array(
    			'messege'=>'Customer Successfully Deleted',
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
}
