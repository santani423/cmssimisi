<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'logo' => 'assets/logo/logo1.png',
            'favicon' => 'assets/logo/logo1.png',
            'title' => 'Daffana Nusantara',
            'description' => 'Platform perjalanan terbaik di Indonesia.',
            'keywords' => 'travel, nusantara, perjalanan, wisata',
            'address' => 'Jl. KH. Hassyim Ashari Kosambi | No. 41, Poris Plawad, Kec. Cipondoh, Kota Tangerang',
            'phone' => '085716828111', 
            'google_map' => 'https://maps.google.com/?q=-6.200000,106.816666',
            'whatsapp' => '085716828111',
            'instagram' => 'https://instagram.com/davananusantara',
            // 'facebook' => 'https://facebook.com/davananusantara',
            'twitter' => 'https://twitter.com/davananusantara',
            'youtube' => 'https://www.youtube.com/@dn_tour',
            'tiktok' => 'https://tiktok.com/@davananusantara',
            'email' => 'daffanacv@gmail.com',
            // 'linkedin' => 'https://linkedin.com/company/davananusantara',
            // 'telegram' => 'https://t.me/davananusantara',
            // 'pinterest' => 'https://pinterest.com/davananusantara',
            // 'twitch' => 'https://twitch.tv/davananusantara',
            // 'snapchat' => 'https://snapchat.com/add/davananusantara',
            // 'github' => 'https://github.com/davananusantara',
            // 'blog' => 'https://davananusantara.com/blog',
            // 'privacy_policy' => 'https://davananusantara.com/privacy-policy',
            // 'terms_of_service' => 'https://davananusantara.com/terms-of-service',
            // 'about_us' => 'https://davananusantara.com/about-us',
            // 'contact_us' => 'https://davananusantara.com/contact-us',
            // 'faq' => 'https://davananusantara.com/faq',
            // 'help' => 'https://davananusantara.com/help',
            // 'support' => 'https://davananusantara.com/support',
            // 'newsletter' => 'https://davananusantara.com/newsletter',
            // 'sitemap' => 'https://davananusantara.com/sitemap.xml',
            // 'robots_txt' => 'https://davananusantara.com/robots.txt',
            // 'backup' => 'https://davananusantara.com/backup',
            // 'maintenance_mode' => 'off',
            // 'analytics' => 'UA-12345678-9',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
