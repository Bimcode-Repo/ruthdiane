<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $currentLanguage = 'FR';

    public function mount()
    {
        $this->currentLanguage = session('locale', 'FR');
        app()->setLocale(strtolower($this->currentLanguage));
    }

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
        session(['locale' => $lang]);
        app()->setLocale(strtolower($lang));

        return $this->redirect(request()->header('Referer') ?: '/', navigate: true);
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
