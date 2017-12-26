<?php

namespace App\Http\Middleware;

use Closure;

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
      if($level =='Admin' || $level =='Superman'){
          return $next($request);
      }else{
          return abort(404);
      }
    }else{
      return redirect('halamanlogin','refresh');
    }

  }
}
