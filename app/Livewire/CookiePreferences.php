<?php

namespace App\Livewire;

use App\Models\CookieConsent;
use App\Models\AnalyticsScript;
use Livewire\Component;

class CookiePreferences extends Component
{
    public $necessary = true;
    public $analytics = false;
    public $marketing = false;
    public $hasConsent = false;

    public function mount()
    {
        $sessionId = session()->getId();
        $consent = CookieConsent::getConsent($sessionId);

        if ($consent) {
            $this->hasConsent = true;
            $this->necessary = $consent->necessary;
            $this->analytics = $consent->analytics;
            $this->marketing = $consent->marketing;
        }
    }

    public function savePreferences()
    {
        $sessionId = session()->getId();

        CookieConsent::saveConsent(
            $sessionId,
            $this->necessary,
            $this->analytics,
            $this->marketing,
        );

        session()->flash("success", __("messages.cookie_saved_success"));

        // Recharger la page pour appliquer les scripts
        $this->dispatch("consent-saved");
    }

    public function revokeConsent()
    {
        $sessionId = session()->getId();
        $consent = CookieConsent::where("session_id", $sessionId)->first();

        if ($consent) {
            $consent->delete();
        }

        $this->necessary = true;
        $this->analytics = false;
        $this->marketing = false;
        $this->hasConsent = false;

        session()->flash("success", __("messages.cookie_revoked_success"));

        // Recharger la page
        $this->dispatch("consent-saved");
    }

    public function render()
    {
        $scripts = [
            "necessary" => AnalyticsScript::active()
                ->category("necessary")
                ->ordered()
                ->get(),
            "analytics" => AnalyticsScript::active()
                ->category("analytics")
                ->ordered()
                ->get(),
            "marketing" => AnalyticsScript::active()
                ->category("marketing")
                ->ordered()
                ->get(),
        ];

        return view("livewire.cookie-preferences", compact("scripts"))->layout(
            "components.layouts.app",
        );
    }
}
