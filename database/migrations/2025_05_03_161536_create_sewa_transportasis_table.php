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
        Schema::create('sewa_transportasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit'); // Contoh: "Avanza 2022"
            $table->string('jenis_kendaraan'); // Mobil, motor, bus, dll
            $table->string('merek'); // Toyota, Honda, dll
            $table->string('tipe')->nullable(); // Avanza, Brio, dll
            $table->string('no_polisi')->unique(); // B 1234 XYZ
            $table->integer('tahun')->nullable();
            $table->string('warna')->nullable();
            $table->integer('kapasitas_penumpang')->nullable();
            $table->text('fasilitas')->nullable(); // AC, TV, dll
            $table->decimal('harga_sewa_per_hari', 12, 2);
            $table->boolean('tersedia')->default(true); // Menandakan apakah unit sedang disewa
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable(); // Path gambar kendaraan
            $table->timestamps();
            $table->softDeletes(); // Jika ingin menghapus secara soft
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_transportasis');
    }
};
