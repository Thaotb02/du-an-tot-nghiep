<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckMember
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
        if(Auth::user()->role === 1){
              return $next($request);   
            }
            else{
                Auth::logout();
                return redirect()->route('client.loginForm')->with('Bạn nhập sai tài khoản hoặc mật khẩu');
            }
    
    }
     
}
