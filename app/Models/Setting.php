<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ["key", "value"];

    /**
     * Get a setting value by key
     */
    public static function get(string $key, $default = null)
    {
        return Cache::remember("setting.{$key}", 3600, function () use (
            $key,
            $default,
        ) {
            $setting = static::where("key", $key)->first();

            if (!$setting) {
                return $default;
            }

            // Try to decode JSON
            $decoded = json_decode($setting->value, true);
            return $decoded !== null ? $decoded : $setting->value;
        });
    }

    /**
     * Set a setting value by key
     */
    public static function set(string $key, $value): void
    {
        $value =
            is_array($value) || is_object($value)
                ? json_encode($value)
                : $value;

        static::updateOrCreate(["key" => $key], ["value" => $value]);

        Cache::forget("setting.{$key}");
    }

    /**
     * Toggle a boolean setting
     */
    public static function toggle(string $key): bool
    {
        $current = static::get($key, false);
        $new = !$current;
        static::set($key, $new);
        return $new;
    }
}
