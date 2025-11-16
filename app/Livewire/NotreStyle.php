<?php

namespace App\Livewire;

use Livewire\Component;

class NotreStyle extends Component
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
    }

    public function render()
    {
        return view('livewire.notre-style')->layout('components.layouts.app');
    }
}
