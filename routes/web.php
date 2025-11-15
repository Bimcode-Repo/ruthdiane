<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Welcome;
use App\Livewire\Projects;
use App\Livewire\NotreStyle;
use App\Livewire\Projet;
use App\Livewire\About;
use App\Livewire\Contact;

Route::get('/', Welcome::class);
Route::get('/projects', Projects::class);
Route::get('/notre-style', NotreStyle::class);
Route::get('/projet/{slug}', Projet::class);
Route::get('/about', About::class);
Route::get('/contact', Contact::class);
