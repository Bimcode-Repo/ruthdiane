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
        Project::destroy($id);
        session()->flash('message', 'Projet supprimé avec succès.');
    }

    public function render()
    {
        return view('livewire.admin.project-manager', [
            'projects' => Project::orderBy('order', 'asc')->orderBy('created_at', 'desc')->paginate(10)
        ])->layout('layouts.app')->title('Gestion des Projets');
    }
}
