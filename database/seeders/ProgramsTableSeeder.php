<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $programs = [
            [
                'nama_program' => 'Creative, Critical & Structured Thinking',
                'deskripsi' => 'Mengembangkan kemampuan berpikir kreatif, kritis, dan terstruktur untuk solusi inovatif.',
                'slug' => Str::slug('Creative, Critical & Structured Thinking'),
                'pdf_path' => 'uploads/programs/beasiswa_pintar.pdf',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_program' => 'Customer Behavior in the Digital World',
                'deskripsi' => 'Memahami perilaku konsumen di era digital untuk strategi bisnis yang efektif.',
                'slug' => Str::slug('Customer Behavior in the Digital World'),
                'pdf_path' => 'uploads/programs/pelatihan_digital_umkm.pdf',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nama_program' => 'Executive Management Modules',
                'deskripsi' => 'Modul manajemen eksekutif yang disesuaikan dengan kebutuhan spesifik organisasi.',
                'slug' => Str::slug('Executive Management Modules'),
                'pdf_path' => 'uploads/programs/inkubator_startup.pdf',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('programs')->insert($programs);
    }
}
