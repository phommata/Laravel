<?php

namespace App\Http\Middleware;

use Closure;

class Demo
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
        if ($request->is('articles/create') && $request->has('foo')){ // stuck in loop if all routes
                                                                        // /articles/create
            return redirect('articles');
        }

        return $next($request);
    }
}
