<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{
  
    public function handle($request, Closure $next)
  {

        
              // if(Auth::user()->role == 3){
              //   return $next($request);   
              // }else{
              //   Auth::logout();
              //   return redirect()->route('admin.loginForm');
              // }
             
              if(Auth::user()->role == 3){
                return $next($request);   
              }
              else{
                  Auth::logout();
                  return redirect()->route('admin.loginForm')->with('Bạn nhập sai tài khoản hoặc mật khẩu');
              }
      }
}