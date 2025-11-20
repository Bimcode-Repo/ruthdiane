<?php

namespace App\Livewire;

use App\Models\Blog as BlogModel;
use Livewire\Component;
use Livewire\WithPagination;

class BlogArchive extends Component
{
    use WithPagination;

    public function mount()
    {
        app()->setLocale(strtolower(session("locale", "fr")));
    }

    public function render()
    {
        $blogs = BlogModel::where("is_published", true)
            ->latest("published_at")
            ->paginate(12);

        return view("livewire.blog-archive", compact("blogs"))->layout(
            "components.layouts.app",
        );
    }
}
