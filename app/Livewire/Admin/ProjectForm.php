<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Models\ProjectSection;
use App\Models\ProjectImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Flux\Flux;

class ProjectForm extends Component
{
    use WithFileUploads;

    public $projectId;
    public $slug;
    public $title_fr;
    public $title_en;
    public $title_es;
    public $title_it;
    public $image;
    public $newImage;
    public $order = 0;
    public $is_published = true;

    public $sections = [];
    public $existingSections = [];
    public $uploadKey = 0;

    // Hook pour auto-save des sections existantes (titres, descriptions, images)
    public function updatedExistingSections($value, $key)
    {
        $sectionIndex = explode(".", $key)[0];
        $section = $this->existingSections[$sectionIndex];

        // Auto-save des titres et descriptions
        if (
            strpos($key, ".title_") !== false ||
            strpos($key, ".description_") !== false
        ) {
            $sectionModel = ProjectSection::find($section["id"]);
            $sectionModel->update([
                "title_fr" => $section["title_fr"],
                "title_en" => $section["title_en"],
                "title_es" => $section["title_es"],
                "title_it" => $section["title_it"],
                "description_fr" => $section["description_fr"],
                "description_en" => $section["description_en"],
                "description_es" => $section["description_es"],
                "description_it" => $section["description_it"],
            ]);

            Flux::toast(
                variant: "success",
                text: "Section mise à jour avec succès.",
            );
            return;
        }

        // Auto-save des images
        if (strpos($key, ".new_images") !== false) {
            $sectionIndex = explode(".", $key)[0];

            $section = $this->existingSections[$sectionIndex];
            $imageFiles = $section["new_images"] ?? [];

            if (!empty($imageFiles) && is_array($imageFiles)) {
                $sectionModel = ProjectSection::find($section["id"]);
                $savedCount = 0;

                foreach ($imageFiles as $imageFile) {
                    if ($imageFile && is_object($imageFile)) {
                        $imageName =
                            time() .
                            "_" .
                            uniqid() .
                            "." .
                            $imageFile->extension();
                        $imageFile->storeAs(
                            "medias/images/projects/gallery",
                            $imageName,
                            "public_root",
                        );

                        ProjectImage::create([
                            "section_id" => $sectionModel->id,
                            "image" =>
                                "medias/images/projects/gallery/" . $imageName,
                            "order" => $sectionModel->images()->count(),
                        ]);

                        $savedCount++;
                    }
                }

                // Recharger les images de la section (cela va réinitialiser new_images à [])
                $this->loadExistingSections();

                // Incrémenter la clé pour forcer le reset du composant file-upload
                $this->uploadKey++;

                Flux::toast(
                    variant: "success",
                    text: $savedCount > 1
                        ? "{$savedCount} images ajoutées avec succès à la section."
                        : "Image ajoutée avec succès à la section.",
                );
            }
        }
    }

    // Hook pour auto-save des images des nouvelles sections
    public function updatedSections($value, $key)
    {
        // Les nouvelles sections ne peuvent pas être sauvegardées avant la création de la section
        // On garde le comportement actuel
    }

    // Hook pour auto-save des titres
    public function updatedTitleFr()
    {
        $this->autoSaveProject();
    }

    public function updatedTitleEn()
    {
        $this->autoSaveProject();
    }

    public function updatedTitleEs()
    {
        $this->autoSaveProject();
    }

    public function updatedTitleIt()
    {
        $this->autoSaveProject();
    }

    // Hook pour auto-save du slug
    public function updatedSlug()
    {
        $this->autoSaveProject();
    }

    // Hook pour auto-save de l'ordre
    public function updatedOrder()
    {
        $this->autoSaveProject();
    }

    // Hook pour auto-save du statut de publication
    public function updatedIsPublished()
    {
        $this->autoSaveProject();
    }

    // Méthode d'auto-save pour le projet principal
    protected function autoSaveProject()
    {
        if ($this->projectId) {
            $project = Project::find($this->projectId);
            $project->update([
                "title_fr" => $this->title_fr,
                "title_en" => $this->title_en,
                "title_es" => $this->title_es,
                "title_it" => $this->title_it,
                "slug" => $this->slug ?: Str::slug($this->title_fr),
                "order" => $this->order,
                "is_published" => $this->is_published,
            ]);

            Flux::toast(
                variant: "success",
                text: "Projet mis à jour avec succès.",
            );
        }
    }

    public function updatedNewImage()
    {
        logger("=== FILE UPLOAD DETECTED ===");
        logger("File name: " . $this->newImage->getClientOriginalName());

        // Valider uniquement l'image
        $this->validateOnly("newImage");

        // Sauvegarder immédiatement si on modifie un projet existant
        if ($this->projectId) {
            $imageName =
                time() . "_" . $this->newImage->getClientOriginalName();

            $this->newImage->storeAs(
                "medias/images/projects",
                $imageName,
                "public_root",
            );

            // Supprimer l'ancienne image si elle existe
            if ($this->image && file_exists(public_path($this->image))) {
                unlink(public_path($this->image));
            }

            // Mettre à jour le projet
            $project = Project::find($this->projectId);
            $project->image = "medias/images/projects/" . $imageName;
            $project->save();

            $this->image = "medias/images/projects/" . $imageName;
            $this->newImage = null;

            Flux::toast(
                variant: "success",
                text: "Image mise à jour avec succès.",
            );
        }
    }

    protected function rules()
    {
        return [
            "title_fr" => "required|min:3",
            "title_en" => "required|min:3",
            "title_es" => "required|min:3",
            "title_it" => "required|min:3",
            "order" => [
                "required",
                "integer",
                "min:0",
                "unique:projects,order" .
                ($this->projectId ? "," . $this->projectId : ""),
            ],
            "newImage" => $this->projectId
                ? "nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif"
                : "required|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif",
        ];
    }

    protected $messages = [
        "order.unique" =>
            "Cet ordre est déjà utilisé par un autre projet. Veuillez choisir un ordre différent.",
    ];

    public function mount($id = null)
    {
        if ($id) {
            $this->projectId = $id;
            $this->loadExistingSections();

            $project = Project::findOrFail($id);
            $this->slug = $project->slug;
            $this->title_fr = $project->title_fr;
            $this->title_en = $project->title_en;
            $this->title_es = $project->title_es;
            $this->title_it = $project->title_it;
            $this->image = $project->image;
            $this->order = $project->order;
            $this->is_published = $project->is_published;
        } else {
            $maxOrder = Project::max("order");
            $this->order = $maxOrder !== null ? $maxOrder + 1 : 0;
        }
    }

    public function loadExistingSections()
    {
        $project = Project::with(["sections.images"])->findOrFail(
            $this->projectId,
        );

        $this->existingSections = $project->sections
            ->map(function ($section) {
                return [
                    "id" => $section->id,
                    "order" => $section->order,
                    "title_fr" => $section->title_fr,
                    "title_en" => $section->title_en,
                    "title_es" => $section->title_es,
                    "title_it" => $section->title_it,
                    "description_fr" => $section->description_fr,
                    "description_en" => $section->description_en,
                    "description_es" => $section->description_es,
                    "description_it" => $section->description_it,
                    "existing_images" => $section->images->toArray(),
                    "new_images" => [],
                ];
            })
            ->toArray();
    }

    public function addSection()
    {
        $newSection = [
            "title_fr" => "",
            "title_en" => "",
            "title_es" => "",
            "title_it" => "",
            "description_fr" => "",
            "description_en" => "",
            "description_es" => "",
            "description_it" => "",
            "images" => [],
        ];

        $this->sections[] = $newSection;

        $this->sections = array_values($this->sections);
    }

    public function removeSection($index)
    {
        unset($this->sections[$index]);
        $this->sections = array_values($this->sections);
    }

    public function removeExistingSection($index)
    {
        $sectionId = $this->existingSections[$index]["id"];
        ProjectSection::destroy($sectionId);
        unset($this->existingSections[$index]);
        $this->existingSections = array_values($this->existingSections);
    }

    public function removeMainImage()
    {
        if ($this->projectId && $this->image) {
            // Supprimer le fichier physique
            if (file_exists(public_path($this->image))) {
                unlink(public_path($this->image));
            }

            // Mettre à jour le projet
            $project = Project::find($this->projectId);
            $project->image = null;
            $project->save();

            $this->image = null;

            Flux::toast(
                variant: "success",
                text: "Image principale supprimée avec succès.",
            );
        }
    }

    public function removeExistingImage($sectionIndex, $imageId)
    {
        ProjectImage::destroy($imageId);
        $this->existingSections[$sectionIndex][
            "existing_images"
        ] = array_filter(
            $this->existingSections[$sectionIndex]["existing_images"],
            fn($img) => $img["id"] != $imageId,
        );
        $this->existingSections[$sectionIndex][
            "existing_images"
        ] = array_values(
            $this->existingSections[$sectionIndex]["existing_images"],
        );
    }

    public function save()
    {
        logger("=== SAVE METHOD CALLED ===");
        logger("newImage exists: " . ($this->newImage ? "YES" : "NO"));

        $this->validate();

        $data = [
            "slug" => $this->slug ?: Str::slug($this->title_fr),
            "title_fr" => $this->title_fr,
            "title_en" => $this->title_en,
            "title_es" => $this->title_es,
            "title_it" => $this->title_it,
            "order" => $this->order,
            "is_published" => $this->is_published,
        ];

        if ($this->newImage) {
            logger("Saving new image...");
            $imageName =
                time() . "_" . $this->newImage->getClientOriginalName();
            logger("Image name: " . $imageName);

            $path = $this->newImage->storeAs(
                "medias/images/projects",
                $imageName,
                "public_root",
            );
            logger("Stored at: " . $path);

            $data["image"] = "medias/images/projects/" . $imageName;
        } elseif ($this->projectId && $this->image) {
            logger("Keeping existing image: " . $this->image);
            $data["image"] = $this->image;
        }

        if ($this->projectId) {
            $project = Project::find($this->projectId);
            $project->update($data);
        } else {
            $project = Project::create($data);
        }

        foreach ($this->existingSections as $index => $existingSection) {
            $section = ProjectSection::find($existingSection["id"]);

            if (isset($existingSection["new_images"])) {
                foreach (
                    $existingSection["new_images"]
                    as $imageIndex => $image
                ) {
                    if ($image) {
                        $imageName =
                            time() .
                            "_" .
                            $existingSection["id"] .
                            "_" .
                            $imageIndex .
                            "_" .
                            $image->getClientOriginalName();
                        $image->storeAs(
                            "medias/images/projects/gallery",
                            $imageName,
                            "public_root",
                        );

                        ProjectImage::create([
                            "section_id" => $section->id,
                            "image" =>
                                "medias/images/projects/gallery/" . $imageName,
                            "order" => $imageIndex,
                        ]);
                    }
                }
            }
        }

        foreach ($this->sections as $index => $sectionData) {
            $section = ProjectSection::create([
                "project_id" => $project->id,
                "order" => $index,
                "title_fr" => $sectionData["title_fr"] ?? null,
                "title_en" => $sectionData["title_en"] ?? null,
                "title_es" => $sectionData["title_es"] ?? null,
                "title_it" => $sectionData["title_it"] ?? null,
                "description_fr" => $sectionData["description_fr"] ?? null,
                "description_en" => $sectionData["description_en"] ?? null,
                "description_es" => $sectionData["description_es"] ?? null,
                "description_it" => $sectionData["description_it"] ?? null,
            ]);

            if (isset($sectionData["images"])) {
                foreach ($sectionData["images"] as $imageIndex => $image) {
                    if ($image) {
                        $imageName =
                            time() .
                            "_" .
                            $section->id .
                            "_" .
                            $imageIndex .
                            "_" .
                            $image->getClientOriginalName();
                        $image->storeAs(
                            "medias/images/projects/gallery",
                            $imageName,
                            "public_root",
                        );

                        ProjectImage::create([
                            "section_id" => $section->id,
                            "image" =>
                                "medias/images/projects/gallery/" . $imageName,
                            "order" => $imageIndex,
                        ]);
                    }
                }
            }
        }

        Flux::toast(
            variant: "success",
            text: $this->projectId
                ? "Projet mis à jour avec succès."
                : "Projet créé avec succès.",
        );

        // Si on crée un nouveau projet, rediriger vers son édition
        if (!$this->projectId) {
            return $this->redirect(
                route("admin.projects.edit", $project->id),
                navigate: true,
            );
        }

        // Si on modifie un projet existant, rester sur la page (pas de redirect)
    }

    public function render()
    {
        return view("livewire.admin.project-form")
            ->layout("components.layouts.admin")
            ->title(
                $this->projectId ? "Modifier le projet" : "Créer un projet",
            );
    }
}
