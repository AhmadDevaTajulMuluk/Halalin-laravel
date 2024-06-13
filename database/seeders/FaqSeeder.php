<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('faqs')->insert([
            ['question' => 'Apa itu Halalin?', 'answer' => 'Halalin adalah aplikasi untuk mencari pasangan hidup sesuai syariat Islam.'],
            ['question' => 'Bagaimana cara menggunakan Halalin?', 'answer' => 'Anda dapat mendaftar, membuat profil, dan mulai mencari pasangan.'],
            ['question' => 'Apakah Halalin gratis?', 'answer' => 'Ya, Halalin dapat digunakan secara gratis.'],
            ['question' => 'Apakah data saya aman di Halalin?', 'answer' => 'Ya, kami menjaga kerahasiaan data Anda dengan sangat serius.'],
            ['question' => 'Bagaimana cara mengubah profil saya?', 'answer' => 'Anda dapat mengubah profil Anda melalui menu pengaturan di aplikasi.'],
            ['question' => 'Bagaimana cara saya ingin mendaftar menjadi ustadz di website Halalin?', 'answer' => 'Anda dapat menghubungi layanan pelanggan kami melalui email support@halalin.com.'],
        ]);
    }
}
