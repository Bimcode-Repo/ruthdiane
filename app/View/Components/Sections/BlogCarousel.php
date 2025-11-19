<?php

namespace App\View\Components\Sections;

use App\Models\Blog;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogCarousel extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $blogs = Blog::published()->latest('published_at')->take(6)->get();

        return view('components.sections.blog-carousel', compact('blogs'));
    }
}
