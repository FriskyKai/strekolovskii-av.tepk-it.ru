<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')->nullable()->constrained()->onUpdate('cascade');
            $table->foreignId('photo_id')->nullable()->constrained()->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_photos');
    }
};
