<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsScript extends Model
{
    protected $fillable = [
        "name",
        "category",
        "script_code",
        "description",
        "is_active",
        "position",
    ];

    protected $casts = [
        "is_active" => "boolean",
        "position" => "integer",
    ];

    /**
     * Scope pour les scripts actifs
     */
    public function scopeActive($query)
    {
        return $query->where("is_active", true);
    }

    /**
     * Scope pour les scripts par catégorie
     */
    public function scopeCategory($query, $category)
    {
        return $query->where("category", $category);
    }

    /**
     * Scope pour trier par position
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy("position")->orderBy("created_at");
    }
}
