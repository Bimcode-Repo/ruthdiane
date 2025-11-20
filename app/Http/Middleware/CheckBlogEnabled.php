<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBlogEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!blogEnabled()) {
            $locale =
                $request->route("locale") ?? strtolower(defaultLanguage());
            return redirect()->route("home", ["locale" => $locale]);
        }

        return $next($request);
    }
}
