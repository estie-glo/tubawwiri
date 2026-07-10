<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Familles résilientes, Écoles résilientes, Défi TESIMAMA, Parents TBW, etc.
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('action_domain_id')->nullable()->constrained()->nullOnDelete();
            $table->string('slug')->unique();
            $table->string('title_fr');
            $table->string('title_en')->nullable();
            $table->text('summary_fr')->nullable();
            $table->longText('objectifs_fr')->nullable();
            $table->longText('activites_fr')->nullable();
            $table->string('duree')->nullable();
            $table->text('beneficiaires_fr')->nullable();
            $table->text('indicateurs_fr')->nullable();
            $table->text('partenaires_souhaites_fr')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
