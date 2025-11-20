<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CookieConsent extends Model
{
    protected $fillable = [
        "session_id",
        "necessary",
        "analytics",
        "marketing",
        "expires_at",
    ];

    protected $casts = [
        "necessary" => "boolean",
        "analytics" => "boolean",
        "marketing" => "boolean",
        "expires_at" => "datetime",
    ];

    /**
     * Récupérer le consentement pour une session
     */
    public static function getConsent($sessionId)
    {
        return static::where("session_id", $sessionId)
            ->where("expires_at", ">", now())
            ->first();
    }

    /**
     * Sauvegarder ou mettre à jour le consentement
     */
    public static function saveConsent(
        $sessionId,
        $necessary,
        $analytics,
        $marketing,
    ) {
        return static::updateOrCreate(
            ["session_id" => $sessionId],
            [
                "necessary" => $necessary,
                "analytics" => $analytics,
                "marketing" => $marketing,
                "expires_at" => Carbon::now()->addMonths(13),
            ],
        );
    }

    /**
     * Vérifier si une catégorie est consentie
     */
    public function hasConsent($category)
    {
        return $this->$category ?? false;
    }
}
