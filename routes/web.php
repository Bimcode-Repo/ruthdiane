<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Welcome;
use App\Livewire\Projects;
use App\Livewire\NotreStyle;
use App\Livewire\Projet;
use App\Livewire\About;
use App\Livewire\Contact;

// Public routes
Route::get('/', Welcome::class);
Route::get('/projects', Projects::class);
Route::get('/our-style', NotreStyle::class);
Route::get('/projet/{slug}', Projet::class);
Route::get('/about', About::class);
Route::get('/contact', Contact::class);

// Protected routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
