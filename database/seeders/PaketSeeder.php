<?php

namespace Database\Seeders;

use App\Models\ItemDesc;
use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        for ($i = 0; $i < 100; $i++) {
            $id_wilayah = rand(1, 5);
            $id_type_paket = rand(1, 5);
            $paket = Paket::create([
                'name' => 'Paket ' . $i,
                'code' => 'Paket'. $i,
                'thumbnail_img' => 'assets/item/group126.png',
                'pdf' => 'assets/item/sample.pdf',
                'description' => 'Paket ' . $i . ' menawarkan pengalaman luar biasa dengan fasilitas terbaik.',
                'price' => rand(1000000, 10000000), // Harga acak antara 100,000 dan 1,000,000
                'wilayah_id' => $id_wilayah,
                'type_paket_id' => $id_type_paket,
                'start_date_departure' => now()->addDays(rand(1, 30))->format('Y-m-d'),
                'end_date_departure' => now()->addDays(rand(31, 60))->format('Y-m-d'),
                // 'hotel_bintang_1' => rand(0, 1),
                // 'hotel_bintang_2' => rand(0, 1),
                // 'hotel_bintang_3' => rand(0, 1),
                // 'hotel_bintang_4' => rand(0, 1),
                // 'hotel_bintang_5' => rand(0, 1),
                'transportation_ticket' => rand(0, 1),
            ]);

            for ($d = 1; $d <= 6 ; $d++) {
                $desc = fake()->paragraphs(30, true) . "\n\nDaftar fasilitas utama:\n- " . implode("\n- ", fake()->words(3));

                DB::table('item_desc_pakets')->insert([
                    'item_desc_id' => $d,
                    'paket_id' => $paket->id,
                    'desc' => $desc,
                ]);
            }
        }
    }
}
