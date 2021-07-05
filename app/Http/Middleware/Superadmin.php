<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Superadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->type == 1) {

            return $next($request);
        }
        $notification = array(
            'messege'=>'You Do Not Have Permission' ,
            'type'=>'error'
        );

        return Redirect()->back()->with($notification);

    }
}
