<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wilayahs')->insert([
            ['name' => 'Jakarta', 'code' => 'JKT'],
            ['name' => 'Banten', 'code' => 'BTN'],
            ['name' => 'Jawa Barat', 'code' => 'JBR'],
            ['name' => 'Jawa Tengah', 'code' => 'JTG'],
            ['name' => 'Jawa Timur', 'code' => 'JT'],
            ['name' => 'Bali', 'code' => 'BLM'],
        ]);
    }
}
