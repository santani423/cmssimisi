<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutAsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            'video' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Hh5k0Aep2hQ?si=9M14Q2SnnLq9Q-A3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            // 'code' => 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDJ8fGJhbm5lcnxlbnwwfHx8fDE2ODQ1NTY3MjM&ixlib=rb-4.0.3&q=80&w=1080',
            'discover_more' => 'Discover More',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'customer' => '8',
            'personal_team' => '8',
            'destinasi_tour' => '15',
        ]);
    }
}
