<?php

namespace App\Livewire;

use Livewire\Component;

class Contact extends Component
{
    public $currentLanguage = 'FR';

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
    }

    public function render()
    {
        return view('livewire.contact')->layout('components.layouts.app');
    }
}
