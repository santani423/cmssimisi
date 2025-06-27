<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TourPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tour_packages')->insert([ 
            'desc' => 'Jelajahi setiap sudut Indonesia bersama Daffana
                        Nusantara',
            'img_1' => 'assets/item/Bali-Trip-Cost-1 1.png',
            'title_img_1' => 'Paket Tur Bali',
            'img_2' => 'assets/item/gambar all.png',
            'title_img_2' => 'Paket Tur Jawa Bali',
            'img_3' => 'assets/item/gambar all (1).png',
            'title_img_3' => 'Paket Jawa Timur',
            'img_4' => 'assets/item/gambar all (2).png',
            'title_img_4' => 'Paket Jawa Tengah',
            'img_5' => 'assets/item/gambar all (3).png',
            'title_img_5' => 'Sumatera',
            'link_descover_more' => 'https://www.daffanatravel.com/',
        ]); 
    }
}
