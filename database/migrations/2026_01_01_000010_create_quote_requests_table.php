<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('organisation')->nullable();
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('service_souhaite')->nullable();
            $table->string('budget_estimatif')->nullable();
            $table->string('delai')->nullable();
            $table->text('description_besoin')->nullable();
            $table->string('status')->default('nouveau');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
