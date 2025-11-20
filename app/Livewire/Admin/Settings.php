<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Flux;

#[Layout("components.layouts.admin")]
class Settings extends Component
{
    public bool $inspirationMode = false;
    public bool $blogEnabled = true;
    public array $languages = [];
    public string $linkedinUrl = "";
    public string $instagramUrl = "";
    public string $facebookUrl = "";

    public function mount()
    {
        $this->inspirationMode = (bool) Setting::get("inspiration_mode", false);
        $this->blogEnabled = (bool) Setting::get("blog_enabled", true);

        // Charger les langues actives (par défaut toutes activées)
        $this->languages = Setting::get("active_languages", [
            "fr" => true,
            "en" => true,
            "es" => true,
            "it" => true,
        ]);

        // Charger les URLs des réseaux sociaux
        $this->linkedinUrl = Setting::get("linkedin_url", "");
        $this->instagramUrl = Setting::get("instagram_url", "");
        $this->facebookUrl = Setting::get("facebook_url", "");
    }

    public function updatedInspirationMode($value)
    {
        Setting::set("inspiration_mode", $value);

        Flux::toast(
            text: $value ? "Mode Inspiration activé" : "Mode Projets activé",
            variant: "success",
        );
    }

    public function updatedBlogEnabled($value)
    {
        Setting::set("blog_enabled", $value);

        Flux::toast(
            text: $value ? "Blog activé" : "Blog désactivé",
            variant: "success",
        );
    }

    public function updatedLanguages()
    {
        Setting::set("active_languages", $this->languages);

        Flux::toast(text: "Langues mises à jour", variant: "success");
    }

    public function updatedLinkedinUrl($value)
    {
        $this->validate(["linkedinUrl" => "nullable|url"]);
        Setting::set("linkedin_url", $value);
        Flux::toast(text: "LinkedIn mis à jour", variant: "success");
    }

    public function updatedInstagramUrl($value)
    {
        $this->validate(["instagramUrl" => "nullable|url"]);
        Setting::set("instagram_url", $value);
        Flux::toast(text: "Instagram mis à jour", variant: "success");
    }

    public function updatedFacebookUrl($value)
    {
        $this->validate(["facebookUrl" => "nullable|url"]);
        Setting::set("facebook_url", $value);
        Flux::toast(text: "Facebook mis à jour", variant: "success");
    }

    public function render()
    {
        return view("livewire.admin.settings");
    }
}
