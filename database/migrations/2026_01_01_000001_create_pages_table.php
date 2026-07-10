<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Pages institutionnelles : Accueil, Qui sommes-nous, Notre approche,
    // Domaines d'action, Programmes, TBW Consulting, TBW Academy, Contact...
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // ex: qui-sommes-nous
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->string('meta_title_fr')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->string('meta_description_fr')->nullable();
            $table->string('meta_description_en')->nullable();
            $table->longText('content_fr')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
