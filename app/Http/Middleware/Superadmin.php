<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class Admin
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
    if($request->session()->has('role')){
      $level =  $request->session()->get('role');
      $hakakes = "";
      if(Cache::has('akses')){
        $hakakes = Cache::get('akses');
      }
      if($level =='Superman' || $level =='Admin'){
          return $next($request);
      }else{
          return abort(403);
      }
    }else{
      return redirect('halamanlogin');
    }
  }
}
