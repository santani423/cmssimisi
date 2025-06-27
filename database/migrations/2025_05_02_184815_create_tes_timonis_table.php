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
        Schema::create('tes_timonis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Nama Timonis
            $table->string('email')->nullable()->unique(); // Email
            $table->string('phone')->nullable(); // Nomor Telepon
            $table->text('tes_timoni')->nullable(); // Alamat
            $table->boolean('is_active')->default(true); // Status aktif
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tes_timonis');
    }
};
