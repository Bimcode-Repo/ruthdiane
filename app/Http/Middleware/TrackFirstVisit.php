<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackFirstVisit
{
    public function handle(Request $request, Closure $next)
    {
        // session()->forget('visited');

        if (!session()->has('visited')) {
            session(['visited' => true]);
        }
        return $next($request);
    }
}
