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
        Schema::create('settings', function (Blueprint $table) {
            $table->id(); 
            $table->string('logo')->nullable(); // Logo website
            $table->string('favicon')->nullable(); // Favicon website
            $table->string('title')->nullable(); // Judul website
            $table->string('description')->nullable(); // Deskripsi website
            $table->string('keywords')->nullable(); // Kata kunci website
            $table->string('address')->nullable(); // Alamat website
            $table->string('phone')->nullable(); // Nomor telepon website
            $table->string('email')->nullable(); // Email website 
            $table->string('google_map')->nullable(); // Google Map website
            $table->string('whatsapp')->nullable(); // Nomor WhatsApp website
            $table->string('instagram')->nullable(); // Akun Instagram website
            // $table->string('facebook')->nullable(); // Akun Facebook website
            $table->string('twitter')->nullable(); // Akun Twitter website
            $table->string('youtube')->nullable(); // Akun YouTube website
            $table->string('tiktok')->nullable(); // Akun TikTok website
            // $table->string('linkedin')->nullable(); // Akun LinkedIn website
            // $table->string('telegram')->nullable(); // Akun Telegram website
            // $table->string('pinterest')->nullable(); // Akun Pinterest website
            // $table->string('twitch')->nullable(); // Akun Twitch website
            // $table->string('snapchat')->nullable(); // Akun Snapchat website 
            // $table->string('github')->nullable(); // Akun GitHub website
            // $table->string('blog')->nullable(); // URL blog website
            // $table->string('privacy_policy')->nullable(); // URL kebijakan privasi website
            // $table->string('terms_of_service')->nullable(); // URL syarat dan ketentuan website
            // $table->string('about_us')->nullable(); // URL tentang kami website
            // $table->string('contact_us')->nullable(); // URL hubungi kami website
            // $table->string('faq')->nullable(); // URL FAQ website
            // $table->string('help')->nullable(); // URL bantuan website
            // $table->string('support')->nullable(); // URL dukungan website
            // $table->string('newsletter')->nullable(); // URL buletin website
            // $table->string('sitemap')->nullable(); // URL peta situs website
            // $table->string('robots_txt')->nullable(); // URL robots.txt website
            // $table->string('backup')->nullable(); // URL cadangan website
            // $table->string('maintenance_mode')->nullable(); // Mode pemeliharaan website
            // $table->string('analytics')->nullable(); // URL analitik website
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
