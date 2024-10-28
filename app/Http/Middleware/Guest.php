<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class Guest
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
      if($level == 'Guest' || $level == 'Admin' || $level == 'Superman'){
          return $next($request);
      }else{
          return abort(403);
      }
    }else{
      return redirect('halamanlogin');
    }
  }
}
