<?php

namespace App\View\Components;

use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectHero extends Component
{
    public function __construct(
        public ?Project $project = null
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.hero.project');
    }
}
