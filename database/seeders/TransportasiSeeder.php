<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TransportasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $jenis_kendaraan = ['Bus', 'Mobil', 'Minibus', 'SUV', 'Van'];
        $merek_kendaraan = ['Toyota', 'Daihatsu', 'Isuzu', 'Mitsubishi', 'Hyundai'];
        $warna_list = ['Putih', 'Hitam', 'Merah', 'Biru', 'Silver'];

        for ($i = 0; $i < 50; $i++) {
            $no_polisi = strtoupper($faker->randomLetter) . ' ' . rand(1000, 9999) . ' ' . strtoupper(Str::random(2));

            DB::table('sewa_transportasis')->insert([
                'nama_unit'           => 'Unit ' . ($i + 1),
                'jenis_kendaraan'     => $faker->randomElement($jenis_kendaraan),
                'merek'               => $faker->randomElement($merek_kendaraan),
                'tipe'                => 'Tipe ' . rand(1, 5),
                'no_polisi'           => $no_polisi,
                'tahun'               => rand(2010, 2023),
                'warna'               => $faker->randomElement($warna_list),
                'kapasitas_penumpang' => rand(4, 30),
                'fasilitas'           => 'AC, Audio, Reclining Seat',
                'harga_sewa_per_hari' => $faker->numberBetween(250000, 1500000),
                'tersedia'            => 1,
                'deskripsi'           => $faker->sentence(10),
                'foto'                => 'assets/item/group126.png',
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
        }
    }
}
