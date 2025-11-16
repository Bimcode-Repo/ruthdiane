<?php

namespace App\Livewire;

use Livewire\Component;

class Projet extends Component
{
    public $slug;
    public $currentLanguage = 'FR';

    public function mount($slug)
    {
        $this->slug = $slug;
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
        return view('livewire.projet')->layout('components.layouts.app');
    }
}
