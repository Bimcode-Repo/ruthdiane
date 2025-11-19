<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MobileMenu extends Component
{
    public function __construct(
        public string $active = 'home'
    ) {}

    public function render(): View
    {
        return view('components.navigation.mobile');
    }
}
