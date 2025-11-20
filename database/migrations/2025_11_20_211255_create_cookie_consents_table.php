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
        Schema::create("cookie_consents", function (Blueprint $table) {
            $table->id();
            $table->string("session_id")->unique();
            $table->boolean("necessary")->default(true);
            $table->boolean("analytics")->default(false);
            $table->boolean("marketing")->default(false);
            $table->timestamp("expires_at");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cookie_consents");
    }
};
