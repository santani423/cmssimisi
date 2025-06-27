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
        Schema::create('our_cleans', function (Blueprint $table) {
            $table->id();
            
            // Data umum mitra kerja sama
            $table->string('name');                           // Nama mitra
            $table->integer('kategori_our_clien_id');                           // Nama mitra
            $table->string('img')->nullable();            // Nama perusahaan (jika berbeda)
            $table->string('company')->nullable();            // Nama perusahaan (jika berbeda)
            $table->string('contact_person')->nullable();     // Nama kontak person
            $table->string('email')->nullable()->unique();    // Email kontak
            $table->string('phone')->nullable();              // Nomor telepon
            
            // Alamat mitra
            $table->text('address')->nullable();

   
            // Status dan keterangan
            $table->boolean('is_active')->default(true);      // Status aktif / non-aktif
            $table->text('notes')->nullable();                // Catatan tambahan
            
            $table->softDeletes();                            // deleted_at untuk soft delete
            $table->timestamps();                             // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_cleans');
    }
};
