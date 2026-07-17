<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->text('summary_en')->nullable()->after('summary_fr');
            $table->longText('objectifs_en')->nullable()->after('objectifs_fr');
            $table->longText('activites_en')->nullable()->after('activites_fr');
            $table->text('beneficiaires_en')->nullable()->after('beneficiaires_fr');
            $table->text('indicateurs_en')->nullable()->after('indicateurs_fr');
            $table->text('partenaires_souhaites_en')->nullable()->after('partenaires_souhaites_fr');
        });
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn([
                'summary_en', 'objectifs_en', 'activites_en',
                'beneficiaires_en', 'indicateurs_en', 'partenaires_souhaites_en',
            ]);
        });
    }
};