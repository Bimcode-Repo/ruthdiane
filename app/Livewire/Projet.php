<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Projet extends Component
{
    public $slug;
    public $project;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->project = Project::with(['sections.images'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $currentLanguage = session('locale', 'FR');
        app()->setLocale(strtolower($currentLanguage));
    }

    public function render()
    {
        return view('livewire.projet')->layout('components.layouts.app');
    }
}
