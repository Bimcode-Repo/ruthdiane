<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("translations", function (Blueprint $table) {
            $table->id();
            $table->string("locale", 5); // fr, en, es, it
            $table->string("group", 50); // messages, validation, etc.
            $table->string("key"); // home, contact_title, etc.
            $table->text("value"); // Translated text
            $table->timestamps();

            // Index pour performance
            $table->unique(["locale", "group", "key"]);
            $table->index(["locale", "group"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("translations");
    }
};
