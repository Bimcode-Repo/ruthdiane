<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogManager extends Component
{
    use WithPagination;


    public function deleteBlog($id)
    {
        Blog::destroy($id);
        session()->flash('message', 'Blog supprimé avec succès.');
    }

    public function render()
    {
        return view('livewire.admin.blog-manager', [
            'blogs' => Blog::orderBy('created_at', 'desc')->paginate(10)
        ])->layout('layouts.app')->title('Gestion des Blogs');
    }
}
