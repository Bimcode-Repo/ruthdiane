<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use App\Models\ProjectSection;
use App\Models\ProjectImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

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

    protected function rules()
    {
        return [
            'title_fr' => 'required|min:3',
            'title_en' => 'required|min:3',
            'title_es' => 'required|min:3',
            'title_it' => 'required|min:3',
            'order' => [
                'required',
                'integer',
                'min:0',
                'unique:projects,order' . ($this->projectId ? ',' . $this->projectId : ''),
            ],
            'newImage' => $this->projectId ? 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif' : 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif',
        ];
    }

    protected $messages = [
        'order.unique' => 'Cet ordre est déjà utilisé par un autre projet. Veuillez choisir un ordre différent.',
    ];

    public function mount($id = null)
    {
        if ($id) {
            $project = Project::with(['sections.images'])->findOrFail($id);
            $this->projectId = $project->id;
            $this->slug = $project->slug;
            $this->title_fr = $project->title_fr;
            $this->title_en = $project->title_en;
            $this->title_es = $project->title_es;
            $this->title_it = $project->title_it;
            $this->image = $project->image;
            $this->order = $project->order;
            $this->is_published = $project->is_published;

            $this->existingSections = $project->sections->map(function ($section) {
                return [
                    'id' => $section->id,
                    'order' => $section->order,
                    'title_fr' => $section->title_fr,
                    'title_en' => $section->title_en,
                    'title_es' => $section->title_es,
                    'title_it' => $section->title_it,
                    'description_fr' => $section->description_fr,
                    'description_en' => $section->description_en,
                    'description_es' => $section->description_es,
                    'description_it' => $section->description_it,
                    'existing_images' => $section->images->toArray(),
                    'new_images' => [],
                ];
            })->toArray();
        } else {
            $maxOrder = Project::max('order');
            $this->order = $maxOrder !== null ? $maxOrder + 1 : 0;
        }
    }

    public function addSection()
    {
        $newSection = [
            'title_fr' => '',
            'title_en' => '',
            'title_es' => '',
            'title_it' => '',
            'description_fr' => '',
            'description_en' => '',
            'description_es' => '',
            'description_it' => '',
            'images' => [],
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
        $sectionId = $this->existingSections[$index]['id'];
        ProjectSection::destroy($sectionId);
        unset($this->existingSections[$index]);
        $this->existingSections = array_values($this->existingSections);
    }

    public function removeExistingImage($sectionIndex, $imageId)
    {
        ProjectImage::destroy($imageId);
        $this->existingSections[$sectionIndex]['existing_images'] = array_filter(
            $this->existingSections[$sectionIndex]['existing_images'],
            fn($img) => $img['id'] != $imageId
        );
        $this->existingSections[$sectionIndex]['existing_images'] = array_values($this->existingSections[$sectionIndex]['existing_images']);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'slug' => $this->slug ?: Str::slug($this->title_fr),
            'title_fr' => $this->title_fr,
            'title_en' => $this->title_en,
            'title_es' => $this->title_es,
            'title_it' => $this->title_it,
            'order' => $this->order,
            'is_published' => $this->is_published,
        ];

        if ($this->newImage) {
            $imageName = time() . '_' . $this->newImage->getClientOriginalName();
            $this->newImage->storeAs('medias/images/projects', $imageName, 'public_root');
            $data['image'] = 'medias/images/projects/' . $imageName;
        } elseif ($this->projectId && $this->image) {
            $data['image'] = $this->image;
        }

        if ($this->projectId) {
            $project = Project::find($this->projectId);
            $project->update($data);
        } else {
            $project = Project::create($data);
        }

        foreach ($this->existingSections as $index => $existingSection) {
            $section = ProjectSection::find($existingSection['id']);

            if (isset($existingSection['new_images'])) {
                foreach ($existingSection['new_images'] as $imageIndex => $image) {
                    if ($image) {
                        $imageName = time() . '_' . $existingSection['id'] . '_' . $imageIndex . '_' . $image->getClientOriginalName();
                        $image->storeAs('medias/images/projects/gallery', $imageName, 'public_root');

                        ProjectImage::create([
                            'section_id' => $section->id,
                            'image' => 'medias/images/projects/gallery/' . $imageName,
                            'order' => $imageIndex,
                        ]);
                    }
                }
            }
        }

        foreach ($this->sections as $index => $sectionData) {
            $section = ProjectSection::create([
                'project_id' => $project->id,
                'order' => $index,
                'title_fr' => $sectionData['title_fr'] ?? null,
                'title_en' => $sectionData['title_en'] ?? null,
                'title_es' => $sectionData['title_es'] ?? null,
                'title_it' => $sectionData['title_it'] ?? null,
                'description_fr' => $sectionData['description_fr'] ?? null,
                'description_en' => $sectionData['description_en'] ?? null,
                'description_es' => $sectionData['description_es'] ?? null,
                'description_it' => $sectionData['description_it'] ?? null,
            ]);

            if (isset($sectionData['images'])) {
                foreach ($sectionData['images'] as $imageIndex => $image) {
                    if ($image) {
                        $imageName = time() . '_' . $section->id . '_' . $imageIndex . '_' . $image->getClientOriginalName();
                        $image->storeAs('medias/images/projects/gallery', $imageName, 'public_root');

                        ProjectImage::create([
                            'section_id' => $section->id,
                            'image' => 'medias/images/projects/gallery/' . $imageName,
                            'order' => $imageIndex,
                        ]);
                    }
                }
            }
        }

        session()->flash('message', $this->projectId ? 'Projet mis à jour avec succès.' : 'Projet créé avec succès.');
        return $this->redirect(route('admin.projects'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.project-form')
            ->layout('layouts.app')
            ->title($this->projectId ? 'Modifier le projet' : 'Créer un projet');
    }
}
