<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Flux;

class UserForm extends Component
{
    public $userId;
    public $name = "";
    public $email = "";
    public $password = "";
    public $password_confirmation = "";

    public function mount($userId = null)
    {
        $this->userId = $userId;

        if ($userId) {
            $user = User::findOrFail($userId);
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function save()
    {
        $rules = [
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email," . $this->userId,
        ];

        // Si c'est un nouvel utilisateur, le mot de passe est requis
        if (!$this->userId) {
            $rules["password"] = "required|min:8|confirmed";
        } elseif ($this->password) {
            // Si on modifie et qu'un mot de passe est fourni
            $rules["password"] = "min:8|confirmed";
        }

        $this->validate($rules);

        $data = [
            "name" => $this->name,
            "email" => $this->email,
        ];

        if ($this->password) {
            $data["password"] = Hash::make($this->password);
        }

        if ($this->userId) {
            $user = User::findOrFail($this->userId);
            $user->update($data);
            $message = "Utilisateur modifié avec succès";
        } else {
            // Tout nouvel utilisateur est admin
            User::create($data);
            $message = "Utilisateur créé avec succès";
        }

        Flux::toast(text: $message, variant: "success");

        $this->modal("user-form")->close();
        $this->dispatch("userSaved")->to(UserManager::class);
    }

    public function render()
    {
        return view("livewire.admin.user-form");
    }
}
