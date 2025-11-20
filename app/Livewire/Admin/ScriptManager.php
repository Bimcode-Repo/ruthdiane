<?php

namespace App\Livewire\Admin;

use App\Models\AnalyticsScript;
use Flux;
use Livewire\Component;

class ScriptManager extends Component
{
    public $scripts;
    public $editingScriptId = null;

    public function mount()
    {
        $this->loadScripts();
    }

    public function loadScripts()
    {
        $this->scripts = AnalyticsScript::ordered()->get();
    }

    public function create()
    {
        $this->editingScriptId = null;
        $this->dispatch("openScriptForm", scriptId: null);
    }

    public function edit($scriptId)
    {
        $this->editingScriptId = $scriptId;
        $this->dispatch("openScriptForm", scriptId: $scriptId);
    }

    public function toggleActive($scriptId)
    {
        $script = AnalyticsScript::findOrFail($scriptId);
        $script->update(["is_active" => !$script->is_active]);

        $this->loadScripts();

        Flux::toast(
            text: $script->is_active
                ? "Script '{$script->name}' activé"
                : "Script '{$script->name}' désactivé",
            variant: "success",
        );
    }

    public function delete($scriptId)
    {
        $script = AnalyticsScript::findOrFail($scriptId);
        $name = $script->name;
        $script->delete();

        $this->loadScripts();

        Flux::toast(text: "Script '{$name}' supprimé", variant: "success");
    }

    public function scriptSaved()
    {
        $this->loadScripts();
    }

    public function render()
    {
        return view("livewire.admin.script-manager")
            ->layout("components.layouts.admin")
            ->title("Gestion des Scripts");
    }
}
