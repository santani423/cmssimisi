<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemDesc;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Support\Facades\DB;

class paketStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemTempat = ItemDesc::where('code', 'des')->first();
        $itemFasilitas = ItemDesc::where('code', 'fts')->first();

        $typePaket = new TypePaket();
        $typePaket->name = 'STUDY TOUR';
        $typePaket->code = 'ST';
        $typePaket->save();

        $paket = new Paket();
        $paket->name = 'PAKET  A STUDY TOUR DALAM KOTA';
        $paket->code = 'ST-A-1D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 275000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Gajah</li><li>Museum Satria Mandala</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>&nbsp;Bus Pariwisata AC</li><li>Makan Siang&nbsp;</li><li>Snack</li><li>Tiket wisata&nbsp;</li><li>LKS &amp; Name Tag&nbsp;</li><li>Minum selama perjalanan</li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan&nbsp;</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi </li></ol>',
            ],
        ]);

        $paket = new Paket();
        $paket->name = 'PAKET  B STUDY TOUR DALAM KOTA';
        $paket->code = 'ST-B-1D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 300000;
        $paket->description = 'Paket B Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>TMII</li><ol><li>Museum Prajurit</li><li>Museum Iptek&nbsp;</li></ol></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )</li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag</li><li>Minum selama perjalanan </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);


        $paket = new Paket();
        $paket->name = 'PAKET  C STUDY TOUR DALAM KOTA';
        $paket->code = 'ST-C-1D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 400000;
        $paket->description = 'Paket C Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Sea Word Ancol </li><li>Gelanggang Samudra</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME ) </li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag </li><li>Minum selama perjalanan</li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------

        $paket = new Paket();
        $paket->name = 'PAKET  A STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-A-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 350000;
        $paket->description = 'Paket A Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Zoology  </li><li>Kebun Raya Bogor&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag</li><li>Minum selama perjalanan </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  B STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-B-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 350000;
        $paket->description = 'Paket B Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Istana Presiden Cipanas</li><li>Cibodas</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag</li><li>Minum selama perjalanan </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  C STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-C-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 350000;
        $paket->description = 'Paket C Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Geologi  / Museum Asia Afrika </li><li>Cihampelas</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag</li><li>Minum selama perjalanan </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  D STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-D-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 375000;
        $paket->description = 'Paket C Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Geologi  / Museum Asia Afrika</li><li>Farm House / Floating Market </li><li>Cihampelas</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan Siang</li><li>Snack</li><li>Tiket wisata</li><li>LKS &amp; Name Tag</li><li>Minum selama perjalanan </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  E STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-C-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 475000;
        $paket->description = 'Paket C Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Geologi  / Museum Asia Afrika</li><li>Farm House / Floating Market </li><li>Cihampelas</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan 2 x Variatif dan Higienis</li><li>Snack 1x </li><li>Tiket wisata</li><li>Minum selama perjalanan</li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);
        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  F STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-F-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 475000;
        $paket->description = 'Paket C Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Museum Geologi  / Museum Asia Afrika</li><li>Farm House / Floating Market </li><li>Cihampelas</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan 2 x Variatif dan Higienis</li><li>Snack 1x </li><li>Tiket wisata</li><li>Minum selama perjalanan</li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);
        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  G STUDY TOUR ONE DAY BOGOR';
        $paket->code = 'ST-G-2D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 455000;
        $paket->description = 'Paket G Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Membatik Trusmi / Keraton Kasepuhan</li><li>Kampung Sabin</li><</ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Makan 2 x Variatif dan Higienis</li><li>Snack 1x </li><li>Tiket wisata</li><li>Minum selama perjalanan</li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);
        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET STUDY TOUR BANDUNG 2D - 1N ';
        $paket->code = 'ST-2D-1N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 900000;
        $paket->description = 'Paket G Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Puspa Iptek</li><li>Museum Geologi / Museum Asia Afrika  </li><li>The Great Asia Afrika</li><li>Cihampelas / Cibaduyut </li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Hotel 1 malam</li><li>Makan 4x Variatif dan Higienis </li><li>Snack 1x</li><li>Tiket wisata </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET STUDY TOUR SUKABUMI 2D - 1N ';
        $paket->code = 'ST-3D-1N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 900000;
        $paket->description = 'Paket G Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Pabrik Yakult</li><li>Situ Gunung  </li><li>Chevilly</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )   </li><li>Hotel 1 malam</li><li>Makan 4x Variatif dan Higienis </li><li>Snack 1x</li><li>Tiket wisata </li><li>Tipping Driver, Tol &amp; Parkir</li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp;</li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET STUDY TOUR EKSPLORE YOGYAKARTA 3 DAY – 2 NIGHT  ';
        $paket->code = 'ST-3D-2N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1300000;
        $paket->description = 'Paket G Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Candi Prambanan</li><li>&nbsp;Keraton Jogja</li><li>Heha Sky View</li><li>Malioboro</li><li>Oleh-Oleh Khas Jogja&nbsp; </li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC  </li><li>Hotel 2 malam  </li><li>Makan 7x Variatif dan Higienis</li><li>Snack 1x </li><li>Air Mineral Selama Perjalanan </li><li>Tiket wisata  </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET STUDY TOUR JOGJA  B 
DESA WISATA YOGYAKARTA  
4 DAY – 2 NIGHT  ';
        $paket->code = 'ST-4D-2N';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1550000;
        $paket->description = 'Paket G Study Tour One Day Bogor';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemTempat->id,
                'desc' => '<ol><li>Desa Wisata</li><ol><li>&nbsp;Atraksi Bajak Sawah/Tanam Padi</li><li> Menangkap Ikan</li><li>&nbsp;Tracking</li><li>Belajar Gamelan</li><li>Belajar membuat produk&nbsp;</li><li>Kreasi Janur&nbsp;</li></ol><li>&nbsp;Lava Tour Merapi </li><li>Malioboro </li><li>Bakpia  Khas Jogja</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC  </li><li>Hotel 2 malam  </li><li>Makan 9x Variatif dan Higienis</li><li>Snack 1x </li><li>Air Mineral Selama Perjalanan </li><li>Tiket wisata  </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // ------------------------------------------------------------------------------------------
    }
}
