<?php

namespace Database\Seeders;

use App\Http\Controllers\KategoriOurClientController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OurCleanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Bank HSBC',
                'file' => 'BankHSBC.png'
            ],
            [
                'name' => 'Bank IMB Niaga',
                'file' => 'BankIMBNiaga.jpg'
            ],
            [
                'name' => 'BKAD',
                'file' => 'bkad.jpeg'
            ],
            [
                'name' => 'Dinas Pariwisata Kab. Bekasi',
                'file' => 'DinasPariwisataKabBekasi.png'
            ],
            [
                'name' => 'Dinas Pendidikan Kab. Tangerang',
                'file' => 'DinasPendidikanKabTangerang.jpg'
            ],
            [
                'name' => 'Dinas Pendidikan Kota Tangsel',
                'file' => 'DinasPendidikanKotaTangsel.jpg'
            ],
            [
                'name' => 'Kemendikbud Ristek',
                'file' => 'KemendikbudRistek.webp'
            ],
            [
                'name' => 'LKC Dompet Dhuafa',
                'file' => 'LKCDhompetDhuafa.png'
            ],
            [
                'name' => 'PT Cita Cerdas Inovasi',
                'file' => 'PTCitaCerdasInovasi.png'
            ],
            [
                'name' => 'PT Eonchemicals Putra',
                'file' => 'PTEonchemicalsPutra.jpg'
            ],
        ];
        DB::table('kategori_our_clients')->insert([
            [
                'name' => "Instansi Pemerintah",
            ],
        ]);
        foreach ($data as $key => $value) {
            DB::table('our_cleans')->insert([
                [
                    'name' => $value['name'],
                    'img' => 'assets/ourClean/InstansiPerusahaan/' . $value['file'],
                    'kategori_our_clien_id' => 1,
                ],
            ]);
        }
        //  luar negri

        $data = [
            [
                'name' => 'JPAN SABAH',
                'file' => 'JPANSABAH.png'
            ],
            [
                'name' => 'RSOG',
                'file' => 'RSOG.avif'
            ],
            [
                'name' => 'SGPP',
                'file' => 'SGPP.png'
            ],
        ];
        DB::table('kategori_our_clients')->insert([
            [
                'name' => "Luar Negri",
            ],
        ]);
        foreach ($data as $key => $value) {
            DB::table('our_cleans')->insert([
                [
                    'name' => $value['name'],
                    'img' => 'assets/ourClean/LuarNegeri/' . $value['file'],
                    'kategori_our_clien_id' => 2,
                ],
            ]);
        }
        //   sekolah universitas

        $data = [
            ['name' => 'MAN 2 Kota Tangerang', 'file' => 'MAN2KotaTangerang.jpg'],
            ['name' => 'MI Mubtadi I', 'file' => 'MIMubtadiI.png'],
            ['name' => 'Ponpes An Nuqthah', 'file' => 'Ponpes An Nuqthah.png'],
            ['name' => 'Ponpes Al Amanah Al Ghontory', 'file' => 'PonpesAlAmanahAlGhontory.jpg'],
            ['name' => 'SDN Cipete 2 & 3', 'file' => 'SDNCipete2&3.png'],
            ['name' => 'SDN Poris Plawad 6', 'file' => 'SDNPorisPlawad6.jpg'],
            ['name' => 'SMA & SMK Yapera', 'file' => 'SMA&SMKYapera.png'],
            ['name' => 'SMA 1 Kota Tangerang', 'file' => 'SMA1KotaTangerang.png'],
            ['name' => 'SMAN 12 Tangerang', 'file' => 'SMAN12Tangerang.png'],
            ['name' => 'SMK Al Muin', 'file' => 'SMKAlMuin.jpg'],
            ['name' => 'SMK Ariya Metta', 'file' => 'SMKAriyaMetta.png'],
            ['name' => 'SMK Global Mandiri', 'file' => 'SMKGlobalMandiri.png'],
            ['name' => 'SMK Jakarta III', 'file' => 'SMKJakartaIII.png'],
            ['name' => 'SMK Kesehatan Asy-Syifa', 'file' => 'SMKKesehatanAsy-Syifa.webp'],
            ['name' => 'SMK Kesehatan Letris Indonesia 1', 'file' => 'SMKKesehatanLetrisIndonesia1.png'],
            ['name' => 'SMK Kesehatan Letris Indonesia 2', 'file' => 'SMKKesehatanLetrisIndonesia2.jpg'],
            ['name' => 'SMK Letris Indonesia 1', 'file' => 'SMKLetrisIndonesia1.jpg'],
            ['name' => 'SMK Letris Indonesia 2', 'file' => 'SMKLetrisIndonesia2.jpg'],
            ['name' => 'SMKN 3 Tangerang', 'file' => 'SMKN3Tangerang.jpg'],
            ['name' => 'SMKN 6 Tangsel', 'file' => 'SMKN6Tangsel.png'],
            ['name' => 'SMK YP Karya', 'file' => 'SMKYPKarya.png'],
            ['name' => 'SMK Yuppentek 4 & 6', 'file' => 'SMKYuppentek4&6.jpg'],
            ['name' => 'SMP & SMK Bina Insan Tangerang', 'file' => 'SMP&SMKBinaInsanTangerang.jpg'],
            ['name' => 'SMP Islam Al Sukro Universal', 'file' => 'SMPIslamAlSukroUniversal.jpg'],
            ['name' => 'SMPN 14 Tangerang', 'file' => 'SMPN14Tangerang.png'],
            ['name' => 'SMPN 2 Pagedangan', 'file' => 'SMPN2Pagedangan.png'],
            ['name' => 'SMPN 3 Pagedangan', 'file' => 'SMPN3Pagedangan.jpg'],
            ['name' => 'STIKES Banten', 'file' => 'STIKESBanten.png'],
            ['name' => 'Universitas Muhammadiyah (UMT)', 'file' => 'UnivMuhammadiyah (UMT).png'],
        ];

        DB::table('kategori_our_clients')->insert([
            [
                'name' => "Sekolah / Universitas",
            ],
        ]);
        foreach ($data as $key => $value) {
            DB::table('our_cleans')->insert([
                [
                    'name' => $value['name'],
                    'img' => 'assets/ourClean/sekolahUniversitas/' . $value['file'],
                    'kategori_our_clien_id' => 3,
                ],
            ]);
        }
    }
}
