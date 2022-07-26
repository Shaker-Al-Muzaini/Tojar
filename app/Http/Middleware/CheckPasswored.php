<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPasswored
{

    public function handle(Request $request, Closure $next)
    {
        if ($request->api_passwored !== env('API_PASSWORD')) {
            return response()->json(['messages' => 'اكتب كلمه السر+كس امك يا ابو عمر.']);
        }

        return $next($request);
    }
}
