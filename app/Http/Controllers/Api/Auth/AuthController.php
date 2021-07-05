<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Customer;
use App\Model\Verification;
use Mail;
use App\Mail\SendEmailVerification;
use App\Mail\SendPasswordResetCode;
use DB;

class AuthController extends Controller
{
    public function signup(Request $request)
    {	
    	$validatedData = $request->validate([
    		'name'=>'required'
    	]);
    	
    	$data = new Customer();
    	$data->name=$request->name;
    	$data->last_name=$request->last_name;
    	$data->email=$request->email;
    	$data->phone=$request->phone;
    	$data->verify=1;
    	$data->password=Hash::make($request->password);

    	//$token = mt_rand(1000,9999);

    	$data->save();
    	
    	$signupdata=Customer::find($data->id);


    	//$verification = new Verification();

    	//$verification->email = $request->email;
    	//$verification->code = $token;

    	//$verification->save();

    	//Mail::to($request->email)->send(new SendEmailVerification($token));

    // 	return response()->json($signupdata,201);
    return response()->json(['data'=>$signupdata,201]);
    }
    public function verification(Request $request)
    {	
    

    	$data = Customer::where('email',$request->email)->first();

    	$token = Verification::where('email',$request->email)->where('code',$request->code)->first();
    	if ($token) {
    		$data->verify = 1;
    		$data->save();

    		$token->delete();
    		return response()->json($data);
    	}else{
    	    return response(array('msg'=>'Invalid Token'));
    	}

    	
    }

    public function login(Request $request){
    	$validatedData = $request->validate([
    		'phone'=>'required',
    	]);
        $login = Customer::where('phone',$request->phone)->where('verify',1)->first();

        if ($login) {
        	if(Hash::check($request->password,$login->password)){
        		$login->login_status = "success";
        		return response()->json(['data'=>$login,201]);
        	}else{
        	    
        		return response()->json(array('msg'=>'Password Not Matched'));
        	}
            
        }else{
        	return response()->json(array('msg'=>'Phone number is not correct'));
        }
    }
    
    public function updateProfile(Request $request,$id){
        
        
         
        
      //  return $request->all();
        
        if($request->hasFile('image')) {
            $name = time()."_".$request->file('image')->getClientOriginalName();
           $request->file('image')->move(public_path('images'), $name);
        }else{
            
            $name='null';
        }
         
         $data=[
             'name'=>$request->name, 
             'last_name'=>$request->last_name,
             'email'=>$request->email,
             'address'=>$request->address,
             'image'=>'https://baliarcade.xyz/images/'.$name,
        ];
        
        $customer =Customer::find($id)->update($data);
        
        
        // return response()->json(array('massage'=>'Success','data'=>$request->all(),'id'=>$id));
        if($customer){
          return response()->json(array('massage'=>'Success','data'=>$customer,'id'=>$id));
        }else{
            return response()->json(array('massage'=>'Something Wrong','id'=>$id));
        }
         

        
    }

    public function sendpasswordresetcode(Request $request)
    {
    	$validatedData = $request->validate([
    		'email'=>'required|email'
    	]);

    	$token = mt_rand(1000,9999);

    	$check = Customer::where('email',$request->email)->first();

    	if ($check) {
    		$data = array();
    		$data['email'] = $request->email; 
    		$data['token'] = $token;

    		DB::table('password_resets')->insert($data);
    		Mail::to($request->email)->send(new SendPasswordResetCode($token));
    		return response(201);
    	}

    	return response()->json(array('msg'=>'Email Not Matched'));

    }

    public function passwordreset(Request $request)
    {
    	$data = Customer::where('email',$request->email)->first();

    	$token = DB::table('password_resets')->where('email',$request->email)->where('token',$request->token)->first();
    	if ($token) {
    		$data->password = Hash::make($request->password);
    		$data->save();
    		DB::table('password_resets')->where('email',$request->email)->where('token',$request->token)->delete();
    		return response()->json($data);
    	}

    	return response()->json(array('msg'=>'Invalid Token'));
    }


}
