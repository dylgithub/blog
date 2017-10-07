<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
//        if(isset($_SERVER['HTTP_REFERER'])) {
//            echo $_SERVER['HTTP_REFERER'];
//        }
//        $http_referer=$_SERVER['HTTP_REFERER'];
        if(session('admin')==null){
            return redirect('admin/login')->with('fail','请您先登录！');
        }
        return $next($request);
    }
}
