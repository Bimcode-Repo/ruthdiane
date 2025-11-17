<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

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

    protected function rules()
    {
        return [
            'title_fr' => 'required|min:3',
            'title_en' => 'required|min:3',
            'title_es' => 'required|min:3',
            'title_it' => 'required|min:3',
            'content_fr' => 'required|min:10',
            'content_en' => 'required|min:10',
            'content_es' => 'required|min:10',
            'content_it' => 'required|min:10',
            'newImage' => $this->blogId ? 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif' : 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp,avif',
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
            $this->published_at = $blog->published_at?->format('Y-m-d\TH:i');
        }
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
            'content_fr' => $this->content_fr,
            'content_en' => $this->content_en,
            'content_es' => $this->content_es,
            'content_it' => $this->content_it,
            'is_published' => $this->is_published,
            'published_at' => $this->is_published ? ($this->published_at ?: now()) : null,
        ];

        if ($this->newImage) {
            $imageName = time() . '_' . $this->newImage->getClientOriginalName();
            $this->newImage->storeAs('medias/images/blog', $imageName, 'public_root');
            $data['image'] = 'medias/images/blog/' . $imageName;
        } elseif ($this->blogId && $this->image) {
            $data['image'] = $this->image;
        }

        if ($this->blogId) {
            $blog = Blog::find($this->blogId);
            $blog->update($data);
            session()->flash('message', 'Blog mis à jour avec succès.');
        } else {
            Blog::create($data);
            session()->flash('message', 'Blog créé avec succès.');
        }

        return $this->redirect(route('admin.blogs'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.blog-form')
            ->layout('layouts.app')
            ->title($this->blogId ? 'Modifier le blog' : 'Créer un blog');
    }
}
