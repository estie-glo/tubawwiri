<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title_fr');
            $table->text('description_en')->nullable()->after('description_fr');
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title_fr');
            $table->text('summary_en')->nullable()->after('summary_fr');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->text('content_en')->nullable()->after('content_fr');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->text('excerpt_en')->nullable()->after('excerpt_fr');
        });

        Schema::table('categories', function (Blueprint $table) {
            if (! Schema::hasColumn('categories', 'name_en')) {
                $table->string('name_en')->nullable()->after('name_fr');
            }
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'description_en']);
        });

        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'summary_en']);
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn(['content_en']);
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['excerpt_en']);
        });

        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'name_en')) {
                $table->dropColumn(['name_en']);
            }
        });
    }
};
