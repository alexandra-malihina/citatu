<?php

namespace App\Http\Middleware;

use Closure;

class SecuredHttp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (!$request->secure()) {
            return redirect()->secure($request->path());
        }
        return $next($request);
      }
}
