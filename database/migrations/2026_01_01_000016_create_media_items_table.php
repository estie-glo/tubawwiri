<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('type')->default('photo'); // photo, video, communique, presse
            $table->string('file_path')->nullable(); // image ou pdf
            $table->string('video_url')->nullable(); // lien YouTube
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_items');
    }
};
