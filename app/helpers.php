<?php

if (!function_exists("inspirationMode")) {
    /**
     * Check if inspiration mode is enabled
     */
    function inspirationMode(): bool
    {
        return (bool) \App\Models\Setting::get("inspiration_mode", false);
    }
}

if (!function_exists("blogEnabled")) {
    /**
     * Check if blog is enabled
     */
    function blogEnabled(): bool
    {
        return (bool) \App\Models\Setting::get("blog_enabled", true);
    }
}

if (!function_exists("activeLanguages")) {
    /**
     * Get active languages
     */
    function activeLanguages(): array
    {
        return \App\Models\Setting::get("active_languages", [
            "fr" => true,
            "en" => true,
            "es" => true,
            "it" => true,
        ]);
    }
}

if (!function_exists("defaultLanguage")) {
    /**
     * Get default language (first active language)
     */
    function defaultLanguage(): string
    {
        $activeLanguages = activeLanguages();

        // Si FR est actif, c'est la langue par défaut
        if (!empty($activeLanguages["fr"])) {
            return "fr";
        }

        // Sinon, prendre la première langue active
        foreach (["en", "es", "it"] as $lang) {
            if (!empty($activeLanguages[$lang])) {
                return $lang;
            }
        }

        // Par sécurité, retourner FR
        return "fr";
    }
}

if (!function_exists("currentLocale")) {
    /**
     * Get current locale
     */
    function currentLocale(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists("localizedRoute")) {
    /**
     * Generate a localized route
     */
    function localizedRoute(
        string $name,
        array $parameters = [],
        string $locale = null,
    ): string {
        $locale = $locale ?? currentLocale();

        return route($name, array_merge(["locale" => $locale], $parameters));
    }
}
