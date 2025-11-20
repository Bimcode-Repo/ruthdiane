<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route("locale");

        if (!in_array($locale, ["fr", "en", "es", "it"])) {
            abort(400);
        }

        $activeLanguages = activeLanguages();
        if (empty($activeLanguages[$locale])) {
            return redirect("/" . strtolower(defaultLanguage()));
        }

        App::setLocale($locale);
        session(["locale" => strtoupper($locale)]);

        // Définir la locale par défaut pour toutes les générations d'URL
        \Illuminate\Support\Facades\URL::defaults(["locale" => $locale]);

        return $next($request);
    }
}
