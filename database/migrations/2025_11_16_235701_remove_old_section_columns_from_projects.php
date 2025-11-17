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
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'section1_title_fr',
                'section1_title_en',
                'section1_title_es',
                'section1_title_it',
                'section1_description_fr',
                'section1_description_en',
                'section1_description_es',
                'section1_description_it',
                'section2_title_fr',
                'section2_title_en',
                'section2_title_es',
                'section2_title_it',
                'section2_description_fr',
                'section2_description_en',
                'section2_description_es',
                'section2_description_it',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('section1_title_fr')->nullable();
            $table->text('section1_title_en')->nullable();
            $table->text('section1_title_es')->nullable();
            $table->text('section1_title_it')->nullable();
            $table->text('section1_description_fr')->nullable();
            $table->text('section1_description_en')->nullable();
            $table->text('section1_description_es')->nullable();
            $table->text('section1_description_it')->nullable();
            $table->text('section2_title_fr')->nullable();
            $table->text('section2_title_en')->nullable();
            $table->text('section2_title_es')->nullable();
            $table->text('section2_title_it')->nullable();
            $table->text('section2_description_fr')->nullable();
            $table->text('section2_description_en')->nullable();
            $table->text('section2_description_es')->nullable();
            $table->text('section2_description_it')->nullable();
        });
    }
};
