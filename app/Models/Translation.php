<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Translation extends Model
{
    protected $fillable = ["locale", "group", "key", "value"];

    /**
     * Get translation value
     */
    public static function get(
        string $locale,
        string $group,
        string $key,
    ): ?string {
        $cacheKey = "translation.{$locale}.{$group}.{$key}";

        return Cache::remember($cacheKey, 3600, function () use (
            $locale,
            $group,
            $key,
        ) {
            return self::where("locale", $locale)
                ->where("group", $group)
                ->where("key", $key)
                ->value("value");
        });
    }

    /**
     * Set translation value
     */
    public static function set(
        string $locale,
        string $group,
        string $key,
        string $value,
    ): self {
        $translation = self::updateOrCreate(
            ["locale" => $locale, "group" => $group, "key" => $key],
            ["value" => $value],
        );

        // Clear cache
        Cache::forget("translation.{$locale}.{$group}.{$key}");
        Cache::forget("translations.{$locale}.{$group}");

        return $translation;
    }

    /**
     * Get all translations for a locale and group
     */
    public static function getGroup(string $locale, string $group): array
    {
        $cacheKey = "translations.{$locale}.{$group}";

        return Cache::remember($cacheKey, 3600, function () use (
            $locale,
            $group,
        ) {
            return self::where("locale", $locale)
                ->where("group", $group)
                ->pluck("value", "key")
                ->toArray();
        });
    }

    /**
     * Clear all translation cache
     */
    public static function clearCache(): void
    {
        Cache::flush();
    }
}
