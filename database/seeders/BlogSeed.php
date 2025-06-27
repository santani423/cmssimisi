<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $desc = fake()->paragraphs(rand(3, 5), true) . "\n\nDaftar fasilitas utama:\n- " . implode("\n- ", fake()->words(3));
            DB::table('ruang_media')->insert([
                'title' => 'Blog Title ' . ($i + 1),
                'code' => 'code' . ($i + 1),
                'content' => $desc,
                'resume' => $desc,
                'thumbnail_img' => 'assets/item/group126.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
