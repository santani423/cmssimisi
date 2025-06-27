<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemDesc;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Support\Facades\DB;

class PaketOutbond extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itemDestinasi = ItemDesc::where('code', 'des')->first();
        $itemKegiatan = ItemDesc::where('code', 'kgt')->first();
        $itemFasilitas = ItemDesc::where('code', 'fts')->first();

        $typePaket = new TypePaket();
        $typePaket->name = 'OUTBOUND';
        $typePaket->code = 'OB';
        $typePaket->save();

        $paket = new Paket();
        $paket->name = 'PAKET OUTBOND A 
PONDOK ZIDANE SAWANGAN DEPOK 
ONE DAY';
        $paket->code = 'OB-A';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 355000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemKegiatan->id,
                'desc' => '<ol><li>Opening</li><li>Ice Breaking</li><li>Fun Games&nbsp;</li><li>Flying Fox</li><li>Getek</li><li>Spider Web&nbsp;</li><li>Talang Bocor</li><li>Tong Bridge&nbsp;</li><li>Twoline Bridge</li><li>Hidroponik</li><li>Mengenal Hewan Ternak</li><li>Water Park&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC    </li><li>Saung / Aula </li><li>Makan Siang </li><li>Snack 2x  </li><li>Air Mineral Selama Perjalanan </li><li>Tiket Masuk Pondok Zidane   </li><li>Tipping Driver, Tol &amp; Parkir&nbsp;</li><li>P3K ringan </li><li>Tour leader</li><li>Instruktur</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET OUTBOND B 
PONDOK JBOUND BOGOR 
ONE DAY ';
        $paket->code = 'OB-B';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 355000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemKegiatan->id,
                'desc' => '<ol><li>Opening</li><li>Ice Breaking</li><li>Fun Games&nbsp;</li><li>Flying Fox</li><li>Getek</li><li>Spider Web&nbsp;</li><li>Talang Bocor</li><li>Tong Bridge&nbsp;</li><li>Twoline Bridge</li><li>Hidroponik</li><li>Mengenal Hewan Ternak</li><li>Water Park&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC    </li><li>Saung / Aula </li><li>Makan Siang </li><li>Snack 2x  </li><li>Air Mineral Selama Perjalanan </li><li>Tiket Masuk Pondok Zidane   </li><li>Tipping Driver, Tol &amp; Parkir&nbsp;</li><li>P3K ringan </li><li>Tour leader</li><li>Instruktur</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET OUTBOND B 
PONDOK JBOUND BOGOR 
ONE DAY  ';
        $paket->code = 'OB-C';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 375000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemKegiatan->id,
                'desc' => '<ol><li>Ice Breaking </li><li>Stretcing</li><li>Fun Games&nbsp;</li><li>Agro &amp; Agri</li><li>Animal Feeding&nbsp;</li></ol>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC    </li><li>Lunch Box </li><li>Snack 1x  </li><li>Air Mineral Selama Perjalanan  </li><li>Tiket Masuk </li><li>Tiket Masuk Pondok Zidane   </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Instruktur</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  OUTBOND 
CIKOLE LEMBANG BANDUNG';
        $paket->code = 'OB-D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 400000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<div>Cikole Lembang Bandung</div><ol><li>Ice Breaking</li><li>Fun Game</li><li>Team Building</li><li>Personal Game</li><ol><li>Flying Fox 1 Line</li><li>&nbsp;Jembatan Gantung</li><li>Jembatan Tali Dua</li></ol></ol><div>&nbsp;</div>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )     </li><li>Makan 2 x Variatif dan Higienis  </li><li>Snack 1x</li><li>Tiket Masuk </li><li>Minum selama perjalanan   </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        $paket = new Paket();
        $paket->name = 'PAKET  OUTBOND 
CIKOLE LEMBANG BANDUNG';
        $paket->code = 'OB-D';
        $paket->thumbnail_img = 'assets/item/group126.png';
        $paket->type_paket_id = $typePaket->id;
        $paket->start_date_departure = now()->addDays(rand(1, 30))->format('Y-m-d');
        $paket->end_date_departure = now()->addDays(rand(31, 60))->format('Y-m-d');
        $paket->wilayah_id = 1;
        $paket->price = 400000;
        $paket->description = 'Paket A Study Tour Dalam Kota';
        $paket->save();

        DB::table('item_desc_pakets')->insert([
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemDestinasi->id,
                'desc' => '<div>Cikole Lembang Bandung</div><ol><li>Ice Breaking</li><li>Fun Game</li><li>Team Building</li><li>Personal Game</li><ol><li>Flying Fox 1 Line</li><li>&nbsp;Jembatan Gantung</li><li>Jembatan Tali Dua</li></ol></ol><div>&nbsp;</div>',
            ],
            [
                'paket_id' => $paket->id,
                'item_desc_id' => $itemFasilitas->id,
                'desc' => '<ol><li>Bus pariwisata AC ( SHD / HDD / XHD PRIME )     </li><li>Makan 2 x Variatif dan Higienis  </li><li>Snack 1x</li><li>Tiket Masuk </li><li>Minum selama perjalanan   </li><li>Tipping Driver, Tol &amp; Parkir </li><li>P3K ringan </li><li>Tour leader</li><li>Spanduk</li><li>Dokumentasi&nbsp; </li></ol>',
            ],
        ]);

        // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    }
}
