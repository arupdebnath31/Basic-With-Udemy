<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

         // Perform action

         if ($request->check_age <= 20) {
            return redirect('home');
        }

         //action done
        return $next($request);
    }
}
