<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_pakets')->insert([
            ['name' => 'LDKS', 'code' => 'LDKS'],
            ['name' => 'Study Tour', 'code' => 'ST'],
            ['name' => 'Outbound', 'code' => 'OB'],
            ['name' => 'Wisata', 'code' => 'WS'], 
        ]);
        
    }
}
