<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $currentSlide = 0;
    public $totalSlides = 3;
    public $currentLanguage = 'FR';

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % $this->totalSlides;
    }

    public function goToSlide($index)
    {
        $this->currentSlide = $index;
    }

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
        return view('livewire.welcome')->layout('components.layouts.app');
    }
}
