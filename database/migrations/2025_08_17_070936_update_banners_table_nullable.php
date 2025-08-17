<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('image_path')->nullable()->change();
            $table->string('code')->nullable()->change();
            $table->string('discover_more')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->boolean('is_active')->default(1)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->string('image_path')->nullable(false)->change();
            $table->string('code')->nullable(false)->change();
            $table->string('discover_more')->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->boolean('is_active')->default(1)->nullable(false)->change();
        });
    }
};
