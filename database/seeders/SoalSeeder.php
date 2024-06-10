<?php

namespace Database\Seeders;

use App\Models\Kuis\Soal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $soals = [
            [
                'judul' => 'Pengenalan Dasar-Dasar Menikah',
                'isi' => 'Apa yang dimaksud dengan pernikahan?',
                'jawabans' => [
                    ['teks' => 'Ikatan sah antara dua individu yang diakui oleh agama dan negara', 'benar' => true],
                    ['teks' => 'Hanya sekedar ikatan emosional', 'benar' => false],
                    ['teks' => 'Hubungan persahabatan yang erat', 'benar' => false],
                    ['teks' => 'Kesepakatan bisnis antara dua orang', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Prinsip Dasar Menikah',
                'isi' => 'Apa prinsip dasar yang sangat penting dalam pernikahan?',
                'jawabans' => [
                    ['teks' => 'Komitmen', 'benar' => true],
                    ['teks' => 'Kekayaan', 'benar' => false],
                    ['teks' => 'Kepopuleran', 'benar' => false],
                    ['teks' => 'Kecantikan', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Komunikasi dalam Pernikahan',
                'isi' => 'Apa kunci utama dalam membangun pernikahan yang sehat dan bahagia?',
                'jawabans' => [
                    ['teks' => 'Komunikasi yang efektif', 'benar' => true],
                    ['teks' => 'Mengabaikan masalah', 'benar' => false],
                    ['teks' => 'Selalu menyalahkan pasangan', 'benar' => false],
                    ['teks' => 'Hidup terpisah', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Pengelolaan Keuangan',
                'isi' => 'Apa yang harus dilakukan untuk mengelola keuangan dalam pernikahan?',
                'jawabans' => [
                    ['teks' => 'Membuat anggaran bersama', 'benar' => true],
                    ['teks' => 'Menghabiskan uang tanpa rencana', 'benar' => false],
                    ['teks' => 'Menutupi utang dari pasangan', 'benar' => false],
                    ['teks' => 'Berinvestasi tanpa diskusi', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Menjaga Keharmonisan Pernikahan',
                'isi' => 'Bagaimana cara menjaga keseimbangan antara kehidupan pribadi dan hubungan suami-istri?',
                'jawabans' => [
                    ['teks' => 'Melakukan kegiatan bersama secara rutin', 'benar' => true],
                    ['teks' => 'Mengabaikan pasangan', 'benar' => false],
                    ['teks' => 'Bekerja tanpa henti', 'benar' => false],
                    ['teks' => 'Menghindari komunikasi', 'benar' => false],
                ],
            ],
        ];

        foreach ($soals as $soalData) {
            $soal = Soal::create(['judul' => $soalData['judul'], 'isi' => $soalData['isi']]);
            foreach ($soalData['jawabans'] as $jawabanData) {
                $soal->jawabans()->create($jawabanData);
            }
        }
    }
}
