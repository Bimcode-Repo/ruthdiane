<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Flux\Flux;

class BlogForm extends Component
{
    use WithFileUploads;

    public $blogId;
    public $slug;
    public $title_fr;
    public $title_en;
    public $title_es;
    public $title_it;
    public $content_fr;
    public $content_en;
    public $content_es;
    public $content_it;
    public $image;
    public $newImage;
    public $is_published = false;
    public $published_at;

    // Hook pour auto-save des titres
    public function updatedTitleFr()
    {
        $this->autoSaveBlog();
    }

    public function updatedTitleEn()
    {
        $this->autoSaveBlog();
    }

    public function updatedTitleEs()
    {
        $this->autoSaveBlog();
    }

    public function updatedTitleIt()
    {
        $this->autoSaveBlog();
    }

    // Hook pour auto-save des contenus
    public function updatedContentFr()
    {
        $this->autoSaveBlog();
    }

    public function updatedContentEn()
    {
        $this->autoSaveBlog();
    }

    public function updatedContentEs()
    {
        $this->autoSaveBlog();
    }

    public function updatedContentIt()
    {
        $this->autoSaveBlog();
    }

    // Hook pour auto-save du slug
    public function updatedSlug()
    {
        $this->autoSaveBlog();
    }

    // Hook pour auto-save du statut de publication
    public function updatedIsPublished()
    {
        $this->autoSaveBlog();
    }

    // Hook pour auto-save de la date de publication
    public function updatedPublishedAt()
    {
        $this->autoSaveBlog();
    }

    // Hook pour auto-save de l'image
    public function updatedNewImage()
    {
        // Valider uniquement l'image
        $this->validateOnly("newImage");

        // Sauvegarder immédiatement si on modifie un article existant
        if ($this->blogId) {
            $imageName =
                time() . "_" . $this->newImage->getClientOriginalName();

            $this->newImage->storeAs(
                "medias/images/blog",
                $imageName,
                "public_root",
            );

            // Supprimer l'ancienne image si elle existe
            if ($this->image && file_exists(public_path($this->image))) {
                unlink(public_path($this->image));
            }

            // Mettre à jour l'article
            $blog = Blog::find($this->blogId);
            $blog->image = "medias/images/blog/" . $imageName;
            $blog->save();

            $this->image = "medias/images/blog/" . $imageName;
            $this->newImage = null;

            Flux::toast(
                variant: "success",
                text: "Image mise à jour avec succès.",
            );
        }
    }

    // Méthode pour supprimer l'image principale
    public function removeMainImage()
    {
        if ($this->blogId && $this->image) {
            // Supprimer le fichier physique
            if (file_exists(public_path($this->image))) {
                unlink(public_path($this->image));
            }

            // Mettre à jour l'article
            $blog = Blog::find($this->blogId);
            $blog->image = null;
            $blog->save();

            $this->image = null;

            Flux::toast(
                variant: "success",
                text: "Image supprimée avec succès.",
            );
        }
    }

    // Méthode d'auto-save pour l'article
    protected function autoSaveBlog()
    {
        if ($this->blogId) {
            $blog = Blog::find($this->blogId);
            $blog->update([
                "title_fr" => $this->title_fr,
                "title_en" => $this->title_en,
                "title_es" => $this->title_es,
                "title_it" => $this->title_it,
                "content_fr" => $this->content_fr,
                "content_en" => $this->content_en,
                "content_es" => $this->content_es,
                "content_it" => $this->content_it,
                "slug" => $this->slug ?: Str::slug($this->title_fr),
                "is_published" => $this->is_published,
                "published_at" => $this->is_published
                    ? ($this->published_at ?:
                    now())
                    : null,
            ]);

            Flux::toast(
                variant: "success",
                text: "Article mis à jour avec succès.",
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
            "content_fr" => "required|min:10",
            "content_en" => "required|min:10",
            "content_es" => "required|min:10",
            "content_it" => "required|min:10",
            "newImage" => $this->blogId
                ? "nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif"
                : "required|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif",
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $blog = Blog::findOrFail($id);
            $this->blogId = $blog->id;
            $this->slug = $blog->slug;
            $this->title_fr = $blog->title_fr;
            $this->title_en = $blog->title_en;
            $this->title_es = $blog->title_es;
            $this->title_it = $blog->title_it;
            $this->content_fr = $blog->content_fr;
            $this->content_en = $blog->content_en;
            $this->content_es = $blog->content_es;
            $this->content_it = $blog->content_it;
            $this->image = $blog->image;
            $this->is_published = $blog->is_published;
            $this->published_at = $blog->published_at?->format("Y-m-d");
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            "slug" => $this->slug ?: Str::slug($this->title_fr),
            "title_fr" => $this->title_fr,
            "title_en" => $this->title_en,
            "title_es" => $this->title_es,
            "title_it" => $this->title_it,
            "content_fr" => $this->content_fr,
            "content_en" => $this->content_en,
            "content_es" => $this->content_es,
            "content_it" => $this->content_it,
            "is_published" => $this->is_published,
            "published_at" => $this->is_published
                ? ($this->published_at ?:
                now())
                : null,
        ];

        if ($this->newImage) {
            $imageName =
                time() . "_" . $this->newImage->getClientOriginalName();
            $this->newImage->storeAs(
                "medias/images/blog",
                $imageName,
                "public_root",
            );
            $data["image"] = "medias/images/blog/" . $imageName;
        } elseif ($this->blogId && $this->image) {
            $data["image"] = $this->image;
        }

        if ($this->blogId) {
            $blog = Blog::find($this->blogId);
            $blog->update($data);
            Flux::toast(
                variant: "success",
                text: "Article mis à jour avec succès.",
            );
        } else {
            Blog::create($data);
            Flux::toast(variant: "success", text: "Article créé avec succès.");
        }

        return $this->redirect(route("admin.blogs"), navigate: true);
    }

    public function render()
    {
        return view("livewire.admin.blog-form")
            ->layout("components.layouts.admin")
            ->title($this->blogId ? 'Modifier l\'article' : "Créer un article");
    }
}
