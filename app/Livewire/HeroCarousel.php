<?php

namespace App\Livewire;

use Livewire\Component;

class HeroCarousel extends Component
{
    public $currentSlide = 0;
    public $totalSlides = 3;

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % $this->totalSlides;
    }

    public function goToSlide($index)
    {
        $this->currentSlide = $index;
    }

    public function render()
    {
        return view('livewire.hero-carousel');
    }
}
