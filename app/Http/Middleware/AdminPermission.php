<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPermission
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
        if (Auth::check()) {
            if(Auth::user()->permission != "admin") {
                return response()->json([
                    'message' => 'Departmanınız bu işlemi yapmak için uygun değil'
                ],401);
            }
        }else{
            return redirect()->route('login');
        }

        return $next($request);
    }
}
