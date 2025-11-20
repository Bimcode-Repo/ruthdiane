<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Translation;
use Livewire\Attributes\Computed;
use Flux\Flux;
use Illuminate\Support\Facades\Artisan;

class PersonnalisationManager extends Component
{
    public $selectedLocale = "fr";
    public $selectedCategory = null;
    public $translations = [];
    public $searchTerm = "";

    // Categories organization
    public $categories = [
        "navigation" => [
            "home",
            "projects",
            "about",
            "contact",
            "our_style",
            "styles",
        ],
        "header" => ["site_name", "tagline", "scroll"],
        "sections" => ["blog", "press", "legal_mentions"],
        "contact_page" => [
            "contact_title",
            "form_name",
            "form_email",
            "form_phone",
            "form_message",
            "form_submit",
            "apr_subtitle",
        ],
        "about_page" => [
            "about_title",
            "female_owned_title",
            "female_owned_text",
        ],
        "services" => [
            "our_services",
            "contact_us",
            "discover_more",
            "see_all_styles",
        ],
        "content" => [
            "lorem_short",
            "lorem_medium",
            "lorem_long",
            "lorem_title",
            "lorem_banner_title",
            "lorem_button",
        ],
        "blog" => ["blog_card_title", "blog_card_text", "no_blog_posts"],
        "projects" => [
            "all_projects",
            "project_name",
            "all_styles",
            "style_name",
        ],
        "misc" => [
            "curatorial_text",
            "partner_logo",
            "instagram",
            "inspiration_title",
            "inspiration_description",
        ],
        "contact_messages" => ["contact_success", "contact_error"],
        "cookies" => [
            "cookie_title",
            "cookie_description",
            "cookie_accept",
            "cookie_refuse",
            "cookie_customize",
            "cookie_preferences",
            "cookie_save",
            "cookie_necessary",
            "cookie_necessary_desc",
            "cookie_analytics",
            "cookie_analytics_desc",
            "cookie_marketing",
            "cookie_marketing_desc",
            "cookie_page_title",
            "cookie_page_description",
            "cookie_saved_success",
            "cookie_revoke",
            "cookie_revoke_confirm",
            "cookie_revoked_success",
        ],
    ];

    public function mount()
    {
        $this->selectedCategory = array_key_first($this->categories);
        $this->loadTranslations();
    }

    public function loadTranslations()
    {
        $fileTranslations = $this->getFileTranslations($this->selectedLocale);
        $dbTranslations = Translation::where("locale", $this->selectedLocale)
            ->where("group", "messages")
            ->pluck("value", "key")
            ->toArray();

        // Merge file and database translations
        foreach ($fileTranslations as $key => $value) {
            $this->translations[$key] = $dbTranslations[$key] ?? $value;
        }
    }

    private function getFileTranslations($locale)
    {
        $filePath = lang_path("{$locale}/messages.php");
        return file_exists($filePath) ? require $filePath : [];
    }

    public function updatedSelectedLocale()
    {
        $this->loadTranslations();
    }

    public function updatedSelectedCategory()
    {
        $this->loadTranslations();
    }

    public function saveTranslation($key, $value)
    {
        Translation::set($this->selectedLocale, "messages", $key, $value);

        // Update local state
        $this->translations[$key] = $value;

        // Update timestamp to force reload on next request
        cache()->put("translations.timestamp", now()->timestamp);

        // Dispatch event to update Alpine.js value
        $this->dispatch("translation-updated", key: $key, value: $value);

        Flux::toast(
            text: "Traduction enregistrée avec succès",
            variant: "success",
        );
    }

    public function resetTranslation($key)
    {
        // Delete from database to fallback to file
        Translation::where("locale", $this->selectedLocale)
            ->where("group", "messages")
            ->where("key", $key)
            ->delete();

        // Reload from file
        $fileTranslations = $this->getFileTranslations($this->selectedLocale);
        $this->translations[$key] = $fileTranslations[$key] ?? "";

        Translation::clearCache();

        // Update timestamp to force reload on next request
        cache()->put("translations.timestamp", now()->timestamp);

        Flux::toast(text: "Traduction réinitialisée", variant: "success");
    }

    #[Computed]
    public function filteredTranslations()
    {
        $categoryKeys = $this->categories[$this->selectedCategory] ?? [];
        $filtered = [];

        foreach ($categoryKeys as $key) {
            if (isset($this->translations[$key])) {
                // Filter by search term
                if (
                    empty($this->searchTerm) ||
                    stripos($key, $this->searchTerm) !== false ||
                    stripos($this->translations[$key], $this->searchTerm) !==
                        false
                ) {
                    $filtered[$key] = $this->translations[$key];
                }
            }
        }

        return $filtered;
    }

    public function render()
    {
        return view("livewire.admin.personnalisation-manager")
            ->layout("components.layouts.admin")
            ->title("Personnalisation");
    }
}
