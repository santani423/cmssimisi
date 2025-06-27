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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('desc')->nullable();  
            $table->string('img_1')->nullable();  
            $table->string('title_img_1')->nullable();  
            $table->string('img_2')->nullable();  
            $table->string('title_img_2')->nullable();  
            $table->string('img_3')->nullable();  
            $table->string('title_img_3')->nullable();  
            $table->string('img_4')->nullable();  
            $table->string('title_img_4')->nullable();  
            $table->string('img_5')->nullable();  
            $table->string('title_img_5')->nullable();  
            $table->string('link_descover_more')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
