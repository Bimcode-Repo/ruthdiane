<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Flux;

#[Layout("components.layouts.admin")]
class UserManager extends Component
{
    use WithPagination;

    public $editingUserId = null;

    public function create()
    {
        $this->editingUserId = null;
        $this->modal("user-form")->show();
    }

    public function edit($userId)
    {
        $this->editingUserId = $userId;
        $this->modal("user-form")->show();
    }

    public function delete($userId)
    {
        $user = User::findOrFail($userId);

        // Empêcher la suppression de son propre compte
        if ($user->id === auth()->id()) {
            Flux::toast(
                text: "Vous ne pouvez pas supprimer votre propre compte",
                variant: "danger",
            );
            return;
        }

        $user->delete();

        Flux::toast(
            text: "Utilisateur supprimé avec succès",
            variant: "success",
        );
    }

    public function userSaved()
    {
        $this->editingUserId = null;
    }

    public function render()
    {
        return view("livewire.admin.user-manager", [
            "users" => User::latest()->paginate(10),
        ]);
    }
}
