<?php

namespace App\Livewire\Admin;

use App\Models\AnalyticsScript;
use Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class ScriptForm extends Component
{
    public $scriptId = null;
    public $name = "";
    public $category = "analytics";
    public $script_code = "";
    public $description = "";
    public $is_active = true;
    public $position = 0;

    #[On("openScriptForm")]
    public function loadScript($scriptId = null)
    {
        if ($scriptId) {
            $script = AnalyticsScript::findOrFail($scriptId);
            $this->scriptId = $script->id;
            $this->name = $script->name;
            $this->category = $script->category;
            $this->script_code = $script->script_code;
            $this->description = $script->description;
            $this->is_active = $script->is_active;
            $this->position = $script->position;
        } else {
            $this->reset([
                "scriptId",
                "name",
                "category",
                "script_code",
                "description",
                "position",
            ]);
            $this->is_active = true;
            $this->category = "analytics";
        }
    }

    public function save()
    {
        $validated = $this->validate([
            "name" => "required|string|max:255",
            "category" => "required|in:necessary,analytics,marketing",
            "script_code" => "required|string",
            "description" => "nullable|string",
            "is_active" => "boolean",
            "position" => "integer",
        ]);

        if ($this->scriptId) {
            $script = AnalyticsScript::findOrFail($this->scriptId);
            $script->update($validated);
            $message = "Script '{$this->name}' mis à jour";
        } else {
            AnalyticsScript::create($validated);
            $message = "Script '{$this->name}' créé";
        }

        Flux::toast(text: $message, variant: "success");
        $this->modal("script-form")->close();
        $this->dispatch("scriptSaved")->to(ScriptManager::class);
    }

    public function render()
    {
        return view("livewire.admin.script-form");
    }
}
