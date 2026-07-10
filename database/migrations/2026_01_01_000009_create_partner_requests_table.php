<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partner_requests', function (Blueprint $table) {
            $table->id();
            $table->string('organisation');
            $table->string('nom_responsable');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('type_partenariat')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('nouveau'); // nouveau, en_cours, traite
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partner_requests');
    }
};
