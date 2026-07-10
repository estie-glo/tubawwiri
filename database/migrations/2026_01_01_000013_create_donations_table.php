<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->decimal('montant', 12, 0)->nullable(); // en FCFA
            $table->string('moyen_paiement')->nullable(); // mtn_momo, orange_money, carte, virement
            $table->string('type_don')->default('ponctuel'); // ponctuel, mensuel, parrainage, entreprise
            $table->string('provider_reference')->nullable(); // ID transaction MoMo/Orange
            $table->string('status')->default('en_attente'); // en_attente, confirme, echoue
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
