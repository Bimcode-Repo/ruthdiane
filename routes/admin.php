<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\BlogManager;
use App\Livewire\Admin\BlogForm;
use App\Livewire\Admin\ContactManager;
use App\Livewire\Admin\ProjectManager;
use App\Livewire\Admin\ProjectForm;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group and "admin" prefix.
|
*/

Route::middleware(['auth', 'verified', 'isAdmin'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/blogs', BlogManager::class)->name('admin.blogs');
    Route::get('/blogs/create', BlogForm::class)->name('admin.blogs.create');
    Route::get('/blogs/{id}/edit', BlogForm::class)->name('admin.blogs.edit');
    Route::get('/projects', ProjectManager::class)->name('admin.projects');
    Route::get('/projects/create', ProjectForm::class)->name('admin.projects.create');
    Route::get('/projects/{id}/edit', ProjectForm::class)->name('admin.projects.edit');
    Route::get('/contact', ContactManager::class)->name('admin.contact');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::view('/profile', 'admin.profile')->name('admin.profile');
});
