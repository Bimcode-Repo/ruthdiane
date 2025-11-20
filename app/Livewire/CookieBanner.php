<?php

namespace App\Livewire;

use App\Models\CookieConsent;
use Livewire\Component;

class CookieBanner extends Component
{
    public $showBanner = false;
    public $showCustomize = false;
    public $necessary = true;
    public $analytics = false;
    public $marketing = false;

    public function mount()
    {
        $sessionId = session()->getId();
        $consent = CookieConsent::getConsent($sessionId);

        if (!$consent) {
            $this->showBanner = true;
        }
    }

    public function acceptAll()
    {
        $this->necessary = true;
        $this->analytics = true;
        $this->marketing = true;
        $this->saveConsent();
    }

    public function refuseAll()
    {
        $this->necessary = true;
        $this->analytics = false;
        $this->marketing = false;
        $this->saveConsent();
    }

    public function customize()
    {
        $this->showCustomize = true;
    }

    public function saveCustom()
    {
        $this->saveConsent();
    }

    private function saveConsent()
    {
        $sessionId = session()->getId();

        CookieConsent::saveConsent(
            $sessionId,
            $this->necessary,
            $this->analytics,
            $this->marketing,
        );

        $this->showBanner = false;
        $this->showCustomize = false;

        // Recharger la page pour appliquer les scripts
        $this->dispatch("consent-saved");
    }

    public function render()
    {
        return view("livewire.cookie-banner");
    }
}
