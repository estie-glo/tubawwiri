<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('training_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('niveau')->nullable();
            $table->string('mode')->nullable(); // presentiel, en_ligne
            $table->string('status')->default('nouveau');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('training_enrollments');
    }
};
