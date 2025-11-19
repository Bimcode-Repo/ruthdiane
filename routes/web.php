<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Projet;
use App\Livewire\Contact;
use App\Livewire\Blog;

// Public routes
Route::view('/', 'pages.home')->name('home');
Route::view('/projects', 'pages.projects')->name('projects');
Route::view('/our-style', 'pages.our-style')->name('our-style');
Route::get('/projet/{slug}', Projet::class)->name('projet');
Route::get('/blog/{slug}', Blog::class)->name('blog.show');
Route::view('/about', 'pages.about')->name('about');
Route::get('/contact', Contact::class)->name('contact');

require __DIR__.'/auth.php';
