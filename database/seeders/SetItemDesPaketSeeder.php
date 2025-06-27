<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetItemDesPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('set_item_des_pakets')->insert([
            // LDKS
            [
                'paket_id' => 1,
                'item_desc_id' => 1,
            ],
            [
                'paket_id' => 1,
                'item_desc_id' => 2,
            ],
            // STUDY TOUR
            [
                'paket_id' => 2,
                'item_desc_id' => 2,
            ],
            [
                'paket_id' => 2,
                'item_desc_id' => 4,
            ],
            // Wisata
            [
                'paket_id' => 3,
                'item_desc_id' => 2,
            ],
            [
                'paket_id' => 3,
                'item_desc_id' => 4,
            ],
            // OUTBOND
            [
                'paket_id' => 4,
                'item_desc_id' => 2,
            ],
            [
                'paket_id' => 4,
                'item_desc_id' => 3,
            ],
        ]);
    }
}
