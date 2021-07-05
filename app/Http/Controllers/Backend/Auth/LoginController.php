<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin.dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('admin.logout');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request){
        $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return redirect()->back()->withInput($request->only('email','password'))->with('failed','This Cridential Does Not Match Our Own Records');
        }
    }


}
