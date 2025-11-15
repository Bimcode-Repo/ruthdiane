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
    }

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
    }

    public function render()
    {
        return view('livewire.projet')->layout('components.layouts.app');
    }
}
