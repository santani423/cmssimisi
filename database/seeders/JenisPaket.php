<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPaket extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('jenis_pakets')->insert([
            ['name' => 'LDKS', 'code' => 'LDKS'],
            ['name' => 'Study Tour', 'code' => 'ST'],
            ['name' => 'Outbound', 'code' => 'OB'],
            ['name' => 'Wisata', 'code' => 'WS'], 
        ]);
    }
}
