<?php

namespace App\Http\Middleware;

use Closure;

class PengawasAuth
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
       $user = \Auth::user();
       if($user->isPengawas()){
        return $next($request);
    }else{
            return redirect()->back(); //kembali ke halaan sebelumnya
        }
    }
}
