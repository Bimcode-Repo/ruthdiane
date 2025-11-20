<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectManager extends Component
{
    use WithPagination;

    public function deleteProject($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->sections()->each(function ($section) {
                $section->images()->delete();
            });
            $project->sections()->delete();
            $project->delete();
            session()->flash("success", "Projet supprimé avec succès.");
        }
    }

    public function render()
    {
        return view("livewire.admin.project-manager", [
            "projects" => Project::with("sections")
                ->orderBy("order", "asc")
                ->orderBy("created_at", "desc")
                ->paginate(10),
        ])
            ->layout("components.layouts.admin")
            ->title("Gestion des Projets");
    }
}
