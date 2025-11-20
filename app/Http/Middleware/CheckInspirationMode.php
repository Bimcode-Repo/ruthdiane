<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInspirationMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if inspiration mode is enabled
        if (inspirationMode()) {
            // Redirect public project routes to home
            if ($request->routeIs(["projects", "projet"])) {
                return redirect()->route("home");
            }
        }

        return $next($request);
    }
}
