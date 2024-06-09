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
                'judul' => 'Soal 1',
                'isi' => 'Apa yang dimaksud dengan Laravel?',
                'jawabans' => [
                    ['teks' => 'Framework PHP', 'benar' => true],
                    ['teks' => 'Bahasa Pemrograman', 'benar' => false],
                    ['teks' => 'Database', 'benar' => false],
                    ['teks' => 'Server', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Soal 2',
                'isi' => 'Apa yang dimaksud dengan MVC?',
                'jawabans' => [
                    ['teks' => 'Model View Controller', 'benar' => true],
                    ['teks' => 'Model View Component', 'benar' => false],
                    ['teks' => 'Main View Controller', 'benar' => false],
                    ['teks' => 'Module View Controller', 'benar' => false],
                ],
            ],
            [
                'judul' => 'Soal 3',
                'isi' => 'Apa yang dimaksud dengan taaruf?',
                'jawabans' => [
                    ['teks' => 'Gatau', 'benar' => false],
                    ['teks' => 'Begitulah', 'benar' => false],
                    ['teks' => 'Cari jodoh', 'benar' => true],
                    ['teks' => 'blablalba', 'benar' => false],
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
