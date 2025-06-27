<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class itemDescSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('item_descs')->insert([
            ['name' => 'Tempat', 'code' => 'tmp', 'img' => 'assets/item/group126.png'],
            ['name' => 'Fasilitas', 'code' => 'fts', 'img' => 'assets/item/group126.png'],
            ['name' => 'Kegiatan', 'code' => 'kgt', 'img' => 'assets/item/group126.png'],
            ['name' => 'Destinasi', 'code' => 'des', 'img' => 'assets/item/group126.png'],
            // ['name' => 'OUTBOUND', 'code' => 'des', 'img' => 'assets/item/group126.png'],
        ]);
        // DB::table('item_descs')->insert([
        //     ['name' => 'Destinasi', 'code' => 'des'],
        //     ['name' => 'Penginapan', 'code' => 'png'],
        //     ['name' => 'Akomodasi', 'code' => 'akm'],
        //     ['name' => 'Paket tidak termasuk', 'code' => 'ptt'],
        //     ['name' => 'Keterangan', 'code' => 'ktr'],
        //     ['name' => 'Rundown', 'code' => 'rdw'],
        // ]);
    }
}
