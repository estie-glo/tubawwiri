<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('join_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('pays')->nullable();
            $table->string('profil'); // membre, benevole, stagiaire, consultant, ambassadeur
            $table->text('motivation')->nullable();
            $table->string('status')->default('nouveau');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('join_requests');
    }
};
