<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();

            // Titres multilingues
            $table->string('title_fr');
            $table->string('title_en');
            $table->string('title_es');
            $table->string('title_it');

            // Contenus multilingues
            $table->text('content_fr');
            $table->text('content_en');
            $table->text('content_es');
            $table->text('content_it');

            // Image
            $table->string('image');

            // Statut et publication
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
