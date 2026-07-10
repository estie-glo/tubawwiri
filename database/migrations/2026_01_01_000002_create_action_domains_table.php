<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Santé mentale communautaire, Résilience humaine, Parentalité positive,
    // Protection de l'enfant, Leadership féminin, Développement communautaire...
    public function up(): void
    {
        Schema::create('action_domains', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->string('icon')->nullable(); // classe icône ou chemin svg
            $table->text('summary_fr')->nullable();
            $table->text('summary_en')->nullable();
            $table->longText('enjeux_fr')->nullable();
            $table->longText('objectifs_fr')->nullable();
            $table->longText('actions_fr')->nullable();
            $table->longText('publics_cibles_fr')->nullable();
            $table->longText('resultats_attendus_fr')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('action_domains');
    }
};
