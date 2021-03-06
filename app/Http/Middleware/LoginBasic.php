<?php

namespace App\Http\Middleware;

use Closure;

class LoginBasic
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
        //判断用户是否登录
        if ( !session('user') ){
            return redirect('admin/login/index');
        }
        return $next($request);
    }
}
