<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('sewa_transportasis', function (Blueprint $table) {
            // Ubah kolom harga_sewa_per_hari jadi VARCHAR(255)
            $table->string('harga_sewa_per_hari', 255)->change();
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::table('sewa_transportasis', function (Blueprint $table) {
            // Kembalikan ke DECIMAL(12,2) seperti semula
            $table->decimal('harga_sewa_per_hari', 12, 2)->change();
        });
    }
};
