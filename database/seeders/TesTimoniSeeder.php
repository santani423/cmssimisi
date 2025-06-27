<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TesTimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tes_timonis')->insert([
            [
                'name'       => 'John Doe',
                'email'      => 'john@example.com',
                'phone'      => '081234567890',
                'tes_timoni' => 'Layanan yang diberikan sangat memuaskan, saya akan merekomendasikan kepada teman-teman.',
                'is_active'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Jane Smith',
                'email'      => 'jane@example.com',
                'phone'      => '082112345678',
                'tes_timoni' => 'Tim sangat profesional dan cepat tanggap terhadap kebutuhan saya.',
                'is_active'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name'       => 'Budi Santoso',
                'email'      => 'budi@example.com',
                'phone'      => '085212345678',
                'tes_timoni' => 'Terima kasih atas bantuannya, prosesnya sangat mudah dan jelas.',
                'is_active'  => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
