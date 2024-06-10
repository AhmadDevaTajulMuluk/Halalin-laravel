<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelatihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pelatihans')->insert([
            ['judul' => 'Bab 1', 'deskripsi' => 'Deskripsi Bab 1', 'file_html' => 'bab1.html'],
            ['judul' => 'Bab 2', 'deskripsi' => 'Deskripsi Bab 2', 'file_html' => 'bab2.html'],
        ]);
    }
}
