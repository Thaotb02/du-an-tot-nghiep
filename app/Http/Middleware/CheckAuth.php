<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAuth
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
//Kiểm tra ng dùng đã đăng nhập hay chưa
        if (Auth::check()) {
              return $next($request);
        }
      return redirect()->route('admin.loginForm');
    }
}
