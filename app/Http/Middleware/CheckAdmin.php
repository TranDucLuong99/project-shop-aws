<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::check() && $request->user()->role < 2){
            return $next($request);
        }
        return redirect('admin/order/order')->with('info', __('Bạn không có quyền thực hiện chức năng này!!!'));
    }
}
