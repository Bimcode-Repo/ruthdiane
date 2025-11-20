<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $currentLanguage = "FR";
    public $availableLanguages = [];

    public function mount()
    {
        // Récupérer les langues actives depuis les settings
        $activeLanguages = activeLanguages();

        $this->availableLanguages = [
            "FR" => !empty($activeLanguages["fr"]),
            "EN" => !empty($activeLanguages["en"]),
            "ES" => !empty($activeLanguages["es"]),
            "IT" => !empty($activeLanguages["it"]),
        ];

        // Définir la langue par défaut
        $defaultLang = strtoupper(defaultLanguage());
        $this->currentLanguage = session("locale", $defaultLang);

        // Si la langue actuelle n'est pas disponible, basculer sur la langue par défaut
        if (empty($this->availableLanguages[$this->currentLanguage])) {
            $this->currentLanguage = $defaultLang;
            session(["locale" => $defaultLang]);
        }

        app()->setLocale(strtolower($this->currentLanguage));
    }

    public function setLanguage($lang)
    {
        // Vérifier que la langue est active
        if (empty($this->availableLanguages[$lang])) {
            return;
        }

        $locale = strtolower($lang);

        // Construire la nouvelle URL avec la locale
        $currentPath = request()->path();
        $segments = explode("/", $currentPath);

        // Remplacer le premier segment (la locale actuelle) par la nouvelle
        if (in_array($segments[0], ["fr", "en", "es", "it"])) {
            $segments[0] = $locale;
        } else {
            array_unshift($segments, $locale);
        }

        $newUrl = "/" . implode("/", $segments);

        // Rediriger vers la nouvelle URL
        return redirect($newUrl);
    }

    public function render()
    {
        return view("livewire.language-switcher");
    }
}
