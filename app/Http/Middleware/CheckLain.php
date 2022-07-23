<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->query->has('lang')) {
            return $next($request);
        }
        return response()->view('p1');
    }


}
