<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TypeEkosistemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_ekosistems')->insert([
            [
                'nama_type_ekosistem' => 'Pertanian',
                'slug' => 'pertanian',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_type_ekosistem' => 'Perikanan',
                'slug' => 'perikanan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_type_ekosistem' => 'Peternakan',
                'slug' => 'peternakan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_type_ekosistem' => 'Perkebunan',
                'slug' => 'perkebunan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_type_ekosistem' => 'Kehutanan',
                'slug' => 'kehutanan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
