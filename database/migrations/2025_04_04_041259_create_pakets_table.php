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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->integer('wilayah_id');  
            $table->integer('type_paket_id');  
            $table->string('thumbnail_img');
            $table->string('pdf')->nullable();
            $table->string('name');
            $table->string('start_date_departure');
            $table->string('end_date_departure');
            $table->boolean('transportation_ticket')->default(1);
            $table->string('code');
            $table->text('description');  
            $table->bigInteger('price')->unsigned();  
            $table->integer('minimal_orang')->default(1); // Tambahkan kolom ini
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
