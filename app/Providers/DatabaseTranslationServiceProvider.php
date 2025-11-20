<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\FileLoader;
use App\Models\Translation;
use Illuminate\Contracts\Translation\Loader;

class DatabaseTranslationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->extend("translation.loader", function ($loader, $app) {
            return new DatabaseTranslationLoader(
                $app["files"],
                $app["path.lang"],
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

class DatabaseTranslationLoader extends FileLoader implements Loader
{
    protected $loadedTranslations = [];

    /**
     * Load the messages for the given locale.
     */
    public function load($locale, $group, $namespace = null)
    {
        // Get file-based translations first
        $fileTranslations = parent::load($locale, $group, $namespace);

        // Only merge database translations for non-namespaced groups
        if ($namespace === null || $namespace === "*") {
            try {
                // Check if we have cached this combination with timestamp
                $cacheKey = "translations.{$locale}.{$group}";
                $timestamp = cache()->get("translations.timestamp", 0);

                // Force reload if timestamp changed or not cached
                if (
                    !isset($this->loadedTranslations[$cacheKey]) ||
                    ($this->loadedTranslations[$cacheKey]["timestamp"] ?? 0) <
                        $timestamp
                ) {
                    // Get database translations (without cache)
                    $dbTranslations = Translation::where("locale", $locale)
                        ->where("group", $group)
                        ->pluck("value", "key")
                        ->toArray();

                    $merged = array_merge($fileTranslations, $dbTranslations);

                    $this->loadedTranslations[$cacheKey] = [
                        "translations" => $merged,
                        "timestamp" => $timestamp,
                    ];

                    return $merged;
                }

                return $this->loadedTranslations[$cacheKey]["translations"];
            } catch (\Exception $e) {
                // If database is not available yet (migrations not run), return file translations
                return $fileTranslations;
            }
        }

        return $fileTranslations;
    }
}
