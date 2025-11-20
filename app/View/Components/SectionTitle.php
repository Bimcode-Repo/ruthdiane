<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class SectionTitle extends Component
{
    public function __construct(
        public string $title,
        public ?string $description = null,
    ) {}

    public function render(): View
    {
        return view('components.sections.title');
    }
}
