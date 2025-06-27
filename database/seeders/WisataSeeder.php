<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemDesc;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Support\Facades\DB;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemDestinasi = ItemDesc::where('code', 'des')->first();
        // $itemDestinasi = ItemDesc::where('code', 'kgt')->first();
        $itemFasilitas = ItemDesc::where('code', 'fts')->first();

        $typePaket = new TypePaket();
        $typePaket->name = 'WISATA';
        $typePaket->code = 'WIS';
        $typePaket->save();

        $paket = new Paket();
        $paket->name = 'PAKET WISATA 
PUNCAK BOGOR 
2D - 1N';
        $paket->code = 'WIS-A';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 800000;
        $paket->description = 'Paket Wisata Puncak Bogor 2D - 1N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Sevillage</li><li>Cibodas / Taman Bunga&nbsp;</li></ol><div>&nbsp;</div>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )     </li><li>Hotel 1 malam  </li><li>Makan 4x Variatif dan Higienis</li><li>Snack 1x  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA 
BANDUNG 
2D - 1N ';
        $paket->code = 'WIS-B';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 900000;
        $paket->description = ' Paket Wisata Bandung 2D - 1N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>D’Castello</li><li>The Great Asia Afrika</li><li>Cihampelas / Cibaduyut&nbsp;</li></ol><div>&nbsp;</div>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )     </li><li>Hotel 1 malam  </li><li>Makan 4x Variatif dan Higienis</li><li>Snack 1x  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA A 
DIENG WONOSOBO 
3 DAY – 2 NIGHT  ';
        $paket->code = 'WIS-C';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1200000;
        $paket->description = 'Paket Wisata Dieng Wonosobo 3D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Komplek Candi Arjuna</li><li>Kawah Sikidang</li><li>Dieng Plateau Theater</li><li>Telaga Warna</li></ol><div>&nbsp;</div>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )     </li><li>Hotel 2 malam  </li><li>Makan 6x Variatif dan Higienis</li><li>Snack 1x  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA B 
EKSPLORE YOGYAKARTA  
3 DAY – 2 NIGHT';
        $paket->code = 'WIS-C';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1300000;
        $paket->description = 'Paket Wisata Eksplore Yogyakarta 3D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Candi Borobudur  </li><li>Heha Sky View </li><li>Tebing Breksi </li><li>Malioboro</li><li>Oleh-Oleh Khas Jogja</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC     </li><li>Hotel 2 malam  </li><li>Makan 7x Variatif dan Higienis</li><li>Snack 1x</li><li>Air Mineral Selama Perjalanan  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA C 
EKSPLORE YOGYAKARTA  
4 DAY – 2 NIGHT';
        $paket->code = 'WIS-D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1600000;
        $paket->description = 'Paket Wisata Eksplore Yogyakarta 4D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Lava Tour   </li><li>Heha Sky View </li><li>Keraton Jogja  </li><li>Candi Prambanan / Candi Borobudur </li><li>Malioboro</li><li>Bakpia Pathok  25 Khas Jogja&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC JB3+     </li><li>Hotel 2 malam  </li><li>Makan 9x Variatif dan Higienis</li><li>Snack 1x</li><li>Air Mineral Selama Perjalanan  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA D  
EKSPLORE YOGYAKARTA - SEMARANG 
4 DAY – 2 NIGHT ';
        $paket->code = 'WIS-E';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1650000;
        $paket->description = 'Paket Wisata Eksplore Yogyakarta 4D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Lava Tour   </li><li>Heha Sky View </li><li>Keraton Jogja  </li><li>Candi Prambanan / Candi Borobudur </li><li>Malioboro</li><li>Bakpia Pathok  25 Khas Jogja&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC JB3+     </li><li>Hotel 2 malam  </li><li>Makan 9x Variatif dan Higienis</li><li>Snack 1x</li><li>Air Mineral Selama Perjalanan  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA 
BROMO – MALANG  
5D – 2N ';
        $paket->code = 'WIS-F';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 1950000;
        $paket->description = 'Paket Wisata Bromo - Malang 5D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Penanjakan 1   </li><li>Kawah Gunung Bromo  </li><li>Bukit Teletubies   </li><li>Pasir Berbisik  </li><li>Batu Night Spectacular</li><li>Museum Angkut</li><li>Wisata Petik Apel Malang&nbsp; </li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC JB3+     </li><li>Hotel 2 malam  </li><li>Makan 9x Variatif dan Higienis</li><li>Snack 1x</li><li>Air Mineral Selama Perjalanan  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET WISATA 
BROMO – MALANG - JOGJA 
5D – 2N';
        $paket->code = 'WIS-G';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 2000000;
        $paket->description = 'Paket Wisata Bromo - Malang - Jogja 5D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li><b>Bromo</b></li><ol><li>Penanjakan 1</li><li>Kawah Gunung Bromo</li><li>Bukit Teletubies</li><li>Pasir Berbisik</li></ol><li><b>Batu Malang</b></li><ol><li>Batu Night Spectacular (BNS)&nbsp;</li><li>Museum Angkut&nbsp;</li><li>Oleh-Oleh Khas Malang</li></ol><li><b>Jogja</b></li><ol><li>Heha Sky View</li><li>Malioboro</li><li>Oleh-Oleh Khas Jogja</li></ol></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC HDD JB3+ (Seat 48/50)     </li><li>Hotel 2 malam Bintang 3  </li><li>Makan 12 x Variatif dan Higienis</li><li>Snack 1x</li><li>Air Mineral Selama Perjalanan  </li><li>Tiket wisata    </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi Foto &amp; Video </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  WISATA A 
BALI - JOGJA 
6 DAY – 2 NIGHT';
        $paket->code = 'WIS-H';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 2450000;
        $paket->description = 'Paket Wisata Bali - Jogja 6D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li>Pura Tanah Lot&nbsp;</li><li>Barong Dance</li><li>Pantai Pandawa&nbsp;</li><li>Garuda Wisnu Kencana (GWK)</li><li>Jimbaran Sunset Dinner&nbsp;</li><li>Desa Penglipuran&nbsp;</li><li>Bedugul Danau Bratan</li><li>Joger Luwus&nbsp;</li><li>Pusat Oleh Oleh Khas Bali Krisna/Agung Bali</li><li>Malioboro</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )</li><li>&nbsp;Hotel 2 malam</li><li>Makan 14x Variatif dan Higienis</li><li>Snack 1x&nbsp;</li><li>Air mineral selama perjalanan</li><li>Tiket wisata&nbsp;</li><li>Tipping Driver, Tol, Parkir dan Peyebrangan ( PP )</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  WISATA B 
BALI - JOGJA   
7 DAY – 3 NIGHT';
        $paket->code = 'WIS-I';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 2700000;
        $paket->description = 'Paket Wisata Bali - Jogja 7D - 3N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li><b>Bali</b></li><ol><li>Tanjung Benoa Water Sport&nbsp;</li><li>Pantai Pandawa</li><li>&nbsp;Garuda Wisnu Kencana (GWK)</li><li>Desa Panglipuran</li><li>Jimbaran Sunset Dinner</li><li>Bedugul Danau Bratan</li><li>Pura Tanah Lot&nbsp;</li><li>Barong Dance&nbsp;</li><li>Pusat Oleh Oleh Khas Bali Krisna/Agung Bali</li><li>Joger Luwus</li></ol><li>&nbsp;Jogja</li><ol><li>Malioboro</li><li>Bakpia Pathok Khas Jogja</li><li>&nbsp;Heha Sky View</li></ol></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )</li><li>&nbsp;Hotel 3 malam</li><li>Makan 18x Variatif dan Higienis</li><li>Snack 1x&nbsp;</li><li>Air mineral selama perjalanan</li><li>Tiket wisata&nbsp;</li><li>Tipping Driver, Tol, Parkir dan Peyebrangan ( PP )</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  TOUR D 
BALI - MALANG 
7 DAY – 3 NIGHT';
        $paket->code = 'WIS-J';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 2800000;
        $paket->description = 'Paket Tour Bali - Malang 7D - 3N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><li><b>Bali</b></li><ol><li>Pura Tanah Lot</li><li>Barong Dance&nbsp;</li><li>Pantai Pandawa</li><li>Pantai Melasti&nbsp;</li><li>Garuda Wisnu Kencana (GWK)&nbsp;</li><li>Jimbaran Sunset Dinner</li><li>Bedugul Danau Bratan</li><li>Joger c</li><li>Pusat Oleh Oleh Khas Bali Krisna/Agung Bali</li></ol><li>&nbsp;<b>Malang</b></li><ol><li>Jatim Park 1 / Museum Angkut</li></ol></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC HDD JB3+ (Seat 48/50)</li><li>&nbsp;Hotel 3 malam</li><li>Makan 17x Variatif dan Higienis</li><li>Snack 1x&nbsp;</li><li>Air mineral selama perjalanan</li><li>Tiket wisata&nbsp;</li><li>Tipping Driver, Tol, Parkir dan Peyebrangan ( PP )</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  PESAWAT 
JAKARTA - BALI 
3D – 2N ';
        $paket->code = 'WIS-K';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 3950000;
        $paket->description = 'Paket Pesawat Jakarta - Bali 3D - 2N';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<ol><ol><li>Pura Tanah Lot</li><li>Barong Dance</li><li>Pantai Pandawa</li><li>Desa Penglipuran</li><li>Garuda Wisnu Kencana (GWK)</li><li>Jimbaran Sunset Dinner&nbsp;</li><li>Joger</li><li>Pusat Oleh Oleh Khas Bali Krisna/Agung Bali</li></ol></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Tiket Pesawat PP (Lion Group/Air Asia)</li><li>Transportasi Bus&nbsp;</li><li>Tiket Objek Wisata&nbsp;</li><li>Hotel 3N (Bintang 3)</li><li>Makan 7 x Variatif dan Higienis&nbsp;</li><li>Snack 1 x&nbsp;</li><li>Air mineral&nbsp;&nbsp;</li><li>P3K ringan</li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi</li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    }
}
