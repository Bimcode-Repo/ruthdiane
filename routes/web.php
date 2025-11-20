<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Projet;
use App\Livewire\Contact;
use App\Livewire\Blog;
use App\Livewire\BlogArchive;
use App\Livewire\CookiePreferences;

// Redirection de la racine vers la langue par défaut
Route::get("/", function () {
    $defaultLocale = strtolower(defaultLanguage());
    return redirect("/{$defaultLocale}");
});

// Routes avec préfixe de langue
Route::prefix("{locale}")
    ->where(["locale" => "fr|en|es|it"])
    ->middleware(["setLocale"])
    ->group(function () {
        // Page d'accueil
        Route::view("/", "pages.home")->name("home");

        // Routes protégées par le middleware checkInspirationMode
        Route::middleware(["checkInspirationMode"])->group(function () {
            Route::view("/projects", "pages.projects")->name("projects");
            Route::get("/projet/{slug}", Projet::class)->name("projet");
        });

        // Routes protégées par le middleware checkBlogEnabled
        Route::middleware(["checkBlogEnabled"])->group(function () {
            Route::get("/blog", BlogArchive::class)->name("blog.archive");
            Route::get("/blog/{slug}", Blog::class)->name("blog.show");
        });

        Route::view("/about", "pages.about")->name("about");
        Route::get("/contact", Contact::class)->name("contact");
        Route::view("/legal", "pages.legal")->name("legal");
        Route::get("/cookie-preferences", CookiePreferences::class)->name(
            "cookie.preferences",
        );
    });

require __DIR__ . "/auth.php";
