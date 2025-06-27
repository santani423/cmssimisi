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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id(); 
            $table->text('video')->nullable(); // Path gambar banner
            $table->string('code')->nullable(); // Path gambar banner
            $table->string('discover_more')->nullable(); // discover_more banner
            $table->text('description')->nullable(); // Deskripsi banner 
            $table->string('customer')->nullable(); // discover_more banner
            $table->string('personal_team')->nullable(); // discover_more banner
            $table->string('destinasi_tour')->nullable(); // discover_more banner
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
