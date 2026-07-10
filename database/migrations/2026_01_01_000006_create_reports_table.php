<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Analyses, notes, rapports, statistiques, baromètres, recherches
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->string('type')->default('analyse'); // analyse, note, rapport, barometre
            $table->text('summary_fr')->nullable();
            $table->string('file_path')->nullable(); // PDF téléchargeable
            $table->string('cover_image')->nullable();
            $table->date('published_on')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
