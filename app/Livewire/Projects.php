<?php

namespace App\Livewire;

use Livewire\Component;

class Projects extends Component
{
    public $currentLanguage = 'FR';

    public function setLanguage($lang)
    {
        $this->currentLanguage = $lang;
    }

    public function render()
    {
        return view('livewire.projects')->layout('components.layouts.app');
    }
}
