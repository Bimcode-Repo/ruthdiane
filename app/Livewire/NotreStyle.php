<?php

namespace App\Livewire;

use Livewire\Component;

class NotreStyle extends Component
{
    public $currentLanguage = 'FR';

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
    }

    public function render()
    {
        return view('livewire.notre-style')->layout('components.layouts.app');
    }
}
