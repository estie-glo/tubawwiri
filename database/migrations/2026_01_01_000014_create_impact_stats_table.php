<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ex: "Personnes accompagnées" -> 15000, "Communautés touchées" -> 120
    public function up(): void
    {
        Schema::create('impact_stats', function (Blueprint $table) {
            $table->id();
            $table->string('label_fr');
            $table->string('label_en')->nullable();
            $table->integer('value');
            $table->string('icon')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('impact_stats');
    }
};
