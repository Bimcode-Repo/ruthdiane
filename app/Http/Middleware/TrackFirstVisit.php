<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackFirstVisit
{
    public function handle(Request $request, Closure $next)
    {
        $visits = session('visits', 0);
        $visits++;

        if ($visits >= 2) {
            session(['visited' => true]);
        }

        session(['visits' => $visits]);

        return $next($request);
    }
}
