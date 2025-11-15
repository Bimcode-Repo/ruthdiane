<?php

namespace App\Livewire;

use Livewire\Component;

class About extends Component
{
    public $currentLanguage = 'FR';

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
    }

    public function render()
    {
        return view('livewire.about')->layout('components.layouts.app');
    }
}
