<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Champs manquants par rapport à la structure officielle définie dans
    // architecture_TUBAWWIRI (TBW).docx : problème identifié, public concerné,
    // résultats attendus, et les Défis des 3T associés au programme.
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->longText('probleme_fr')->nullable()->after('summary_fr');
            $table->longText('public_concerne_fr')->nullable()->after('probleme_fr');
            $table->longText('resultats_attendus_fr')->nullable()->after('indicateurs_fr');
            // Stocke un tableau JSON, ex: ["tesimama","tolamuke"]
            $table->json('defis_3t')->nullable()->after('resultats_attendus_fr');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['probleme_fr', 'public_concerne_fr', 'resultats_attendus_fr', 'defis_3t']);
        });
    }
};
