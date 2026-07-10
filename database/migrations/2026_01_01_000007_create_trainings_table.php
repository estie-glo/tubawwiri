<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->text('description_fr')->nullable();
            $table->string('level')->nullable(); // débutant, intermédiaire, avancé
            $table->string('mode')->default('en_ligne'); // presentiel, en_ligne
            $table->string('duree')->nullable();
            $table->decimal('price', 10, 0)->nullable(); // en FCFA
            $table->string('cover_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
