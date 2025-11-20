<?php

namespace App\Livewire;

use App\Models\Blog as BlogModel;
use Livewire\Component;

class Blog extends Component
{
    public $slug;
    public $blog;

    public function mount($slug)
    {
        $this->slug = $slug;

        // On charge juste le blog simple
        $this->blog = BlogModel::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Active la locale selon la session, fallback 'fr'
        app()->setLocale(strtolower(session('locale', 'fr')));
    }

    public function render()
    {
        return view('livewire.blog')->layout('components.layouts.app');
    }
}
