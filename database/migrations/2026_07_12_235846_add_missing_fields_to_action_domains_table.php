<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('action_domains', function (Blueprint $table) {
            $table->longText('enjeux_en')->nullable()->after('enjeux_fr');
            $table->longText('objectifs_en')->nullable()->after('objectifs_fr');
            $table->longText('actions_en')->nullable()->after('actions_fr');
            $table->longText('publics_cibles_en')->nullable()->after('publics_cibles_fr');
            $table->longText('resultats_attendus_en')->nullable()->after('resultats_attendus_fr');
            $table->longText('appel_partenariat_fr')->nullable()->after('resultats_attendus_en');
            $table->longText('appel_partenariat_en')->nullable()->after('appel_partenariat_fr');
        });
    }

    public function down(): void
    {
        Schema::table('action_domains', function (Blueprint $table) {
            $table->dropColumn([
                'enjeux_en', 'objectifs_en', 'actions_en',
                'publics_cibles_en', 'resultats_attendus_en',
                'appel_partenariat_fr', 'appel_partenariat_en',
            ]);
        });
    }
};