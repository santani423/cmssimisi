<?php

namespace Database\Seeders;

use App\Models\ItemDesc;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LdksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemTempat = ItemDesc::where('code', 'tmp')->first();
        $itemFasilitas = ItemDesc::where('code', 'fts')->first();
        $itemDestinasi = ItemDesc::where('code', 'des')->first();
        $itemKegiatan = ItemDesc::where('code', 'kgt')->first();

        $typePaket = new TypePaket();
        $typePaket->name = 'LDKS';
        $typePaket->code = 'LDKS';
        $typePaket->save();

        $paket = new Paket();
        $paket->name = 'PAKET  LDKS A 2D 1N ';
        $paket->code = 'LDKS-A-2D1N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;

        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 450000;
        $paket->description = 'Paket LDKS A 2D 1N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => 'Divisi Infanteri 1 / Rindam Jaya ',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Truk Tronton TNI Kapasitas 40</li><li>Penginapan 1 Malam ( Tenda )</li><li>Makan 3 x</li><li>Snack 1x&nbsp;</li><li>Instruktur</li><li>P3K ringan</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);


        

        $paket = new Paket();
        $paket->name = 'PAKET  LDKS B 2D 1N';
        $paket->code =  'LDKS-B-2D1N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id; 
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 500000;
        $paket->description = 'Paket LDKS B 2D 1N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => 'Villa Puncak / Camping Ground',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Truk Tronton TNI Kapasitas 40</li><li>Penginapan 1 Malam ( Tenda / Villa )</li><li>Makan 3 x</li><li>Snack 1x&nbsp;</li><li>Instruktur</li><li>P3K ringan</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);


    
    }
}
