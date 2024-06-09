<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="card mb-5">
            <div class="card-header">
                Profil Pengguna: {{ $user->username }}
            </div>
            <div class="card-body">
                <h1 class="mb-4">CV Lengkap</h1>

                <h3>Profil Pribadi</h3>
                <ul>
                    <li>Nama Lengkap: {{ $user->fullname }}</li>
                    <li>Username: {{ $user->username }}</li>
                    <li>Email: {{ $user->email }}</li>
                    <li>Nomor Telepon: {{ $user->phone_number }}</li>
                    <li>Tempat, Tanggal Lahir: {{ $user->place_date }}, {{ $user->birth_date }}</li>
                    <li>Jenis Kelamin: {{ $user->gender }}</li>
                    <li>Pekerjaan: {{ $user->job }}</li>
                    <li>Pendapatan: {{ $user->salary }}</li>
                    <li>Status Pernikahan: {{ $user->married_status }}</li>
                    <li>Etnis: {{ $user->ethnic }}</li>
                </ul>

                <h3>Pendidikan</h3>
                <ul>
                    <li>Pendidikan Terakhir: {{ $user->last_education }}</li>
                    <li>Sekolah Dasar: {{ $user->elementarySchool }}</li>
                    <li>Sekolah Menengah Pertama: {{ $user->juniorHighSchool }}</li>
                    <li>Sekolah Menengah Atas: {{ $user->seniorHighSchool }}</li>
                    <li>Sarjana: {{ $user->collegeS1 }}</li>
                    <li>Jurusan Sarjana: {{ $user->majorS1 }}</li>
                    <li>Sarjana Muda: {{ $user->collegeS2 }}</li>
                    <li>Jurusan Sarjana Muda: {{ $user->majorS2 }}</li>
                    <li>Doktor: {{ $user->collegeS3 }}</li>
                    <li>Jurusan Doktor: {{ $user->majorS3 }}</li>
                </ul>

                <h3>Kelahiran dan Keluarga</h3>
                <ul>
                    <li>Tempat, Tanggal Lahir: {{ $user->place_date }}, {{ $user->birth_date }}</li>
                    <li>Jenis Kelamin: {{ $user->gender }}</li>
                    <li>Nama Ayah: {{ $user->fathers_name }}</li>
                    <li>Pekerjaan Ayah: {{ $user->fathers_job }}</li>
                    <li>Nama Ibu: {{ $user->mothers_name }}</li>
                    <li>Pekerjaan Ibu: {{ $user->mothers_job }}</li>
                    <li>Jumlah Saudara Tua: {{ $user->old_siblings }}</li>
                    <li>Jumlah Saudara Muda: {{ $user->young_siblings }}</li>
                    <li>Tulang Punggung Keluarga: {{ $user->backbone_family }}</li>
                </ul>

                <h3>Statistik Agama</h3>
                <ul>
                    <li>Hafalan Al-Quran: {{ $user->quranMemory }}</li>
                    <li>Tingkat: {{ $user->level }}</li>
                    <li>Jawaban 1: {{ $user->answer1 }}</li>
                    <li>Jawaban 2: {{ $user->answer2 }}</li>
                    <li>Jawaban 3: {{ $user->answer3 }}</li>
                    <li>Jawaban 4: {{ $user->answer4 }}</li>
                    <li>Jawaban 5: {{ $user->answer5 }}</li>
                    <li>Jawaban 6: {{ $user->answer6 }}</li>
                </ul>

                <h3>Informasi Fisik</h3>
                <ul>
                    <li>Warna Kulit: {{ $user->skincolor }}</li>
                    <li>Warna Rambut: {{ $user->haircolor }}</li>
                    <li>Tinggi Badan: {{ $user->height }} cm</li>
                    <li>Berat Badan: {{ $user->weight }} kg</li>
                    <li>Penyakit: {{ $user->illness }}</li>
                    <li>Kecacatan: {{ $user->disability }}</li>
                    <li>Ciri Khusus: {{ $user->uniqueTraits }}</li>
                </ul>

                <h3>Aplikasi Diri</h3>
                <ul>
                    <li>Motto: {{ $user->motto }}</li>
                    <li>Life Goals: {{ $user->lifegoals }}</li>
                    <li>Hobi: {{ $user->hobbies }}</li>
                    <li>Hal Favorit: {{ $user->favThings }}</li>
                    <li>Sifat Positif: {{ $user->positiveTraits }}</li>
                    <li>Sifat Negatif: {{ $user->negativeTraits }}</li>
                    <li>Alasan Ta'aruf: {{ $user->taarufReason }}</li>
                </ul>
            </div>
            <div style="display: flex; justify-content: center; gap: 1rem; padding: 2rem 0">
                <a href="{{ route('search') }}" class="btn btn-primary">Kembali</a>
                <a href="" class="btn btn-primary">Ajukan Taaruf</a>
            </div>
        </div>
    </div>
</body>

</html>
