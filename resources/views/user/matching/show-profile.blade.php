<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
</head>

<body>
    <div class="page-show">
        <div class="card-lalala">
            <div class="card-header">
                Profil Pengguna: {{ $user->username }}
            </div>
            <div class="card-body">
                <h1 class="mb-4">CV Lengkap</h1>
                <div class="show-profile" id="show-card">                   
                    <h3>Profil</h3>
                    <div class="show-img">
                    <img src="{{ $user && $user->image ? asset('image/' . $user->image) : '/assets/images/defaultpic.png' }}" alt="user" />
                    </div>
                    <p><b>Nama Lengkap:</b> {{ $user->fullname }}</p>
                    <p><b>Username:</b> {{ $user->username }}</p>
                    <p><b>Email:</b> {{ $user->email }}</p>
                    <p><b>Jenis Kelamin:</b> {{ $user->gender }}</p>
                    <p><b>Nomor Telepon:</b> {{ $user->phone_number }}</p>
                    <p><b>Tempat, Tanggal Lahir:</b> {{ $user->place_date }}, {{ \Carbon\Carbon::parse($user->birth_date)->locale('id')->translatedFormat('d F Y') }}</p>
                    <p><b>Jenis Kelamin:</b> {{ $user->gender }}</p>
                    <p><b>Pekerjaan:</b> {{ $user->job }}</p>
                    <p><b>Pendapatan:</b> {{ $user->salary }}</p>
                    <p><b>Status Pernikahan:</b> {{ $user->married_status }}</p>
                    <p><b>Etnis:</b> {{ $user->ethnic }}</p>
                </div>

                <div class="show-self" id="show-card">
                    <h3>Gambaran Diri</h3>
                    <p><b>Motto:</b> {{ $user->motto }}</p>
                    <p><b>Life Goals:</b> {{ $user->lifegoals }}</p>
                    <p><b>Hobi:</b> {{ $user->hobbies }}</p>
                    <p><b>Hal Favorit:</b> {{ $user->favThings }}</p>
                    <p><b>Sifat Positif:</b> {{ $user->positiveTraits }}</p>
                    <p><b>Sifat Negatif:</b> {{ $user->negativeTraits }}</p>
                    <p><b>Alasan Ta'aruf:</b> {{ $user->taarufReason }}</p>
                </div>

                <div class="show-physical" id="show-card">
                    <h3>Informasi Fisik</h3>
                    <p><b>Warna Kulit:</b> {{ $user->skincolor }}</p>
                    <p><b>Warna Rambut:</b> {{ $user->haircolor }}</p>
                    <p><b>Tinggi Badan:</b> {{ $user->height }} cm</p>
                    <p><b>Berat Badan:</b> {{ $user->weight }} kg</p>
                    <p><b>Penyakit:</b> {{ $user->illness }}</p>
                    <p><b>Kecacatan:</b> {{ $user->disability }}</p>
                    <p><b>Ciri Khusus:</b> {{ $user->uniqueTraits }}</p>
                </div>

                <div class="show-education" id="show-card">
                    <h3>Pendidikan</h3>
                    <p><b>Pendidikan Terakhir:</b> {{ $user->last_education }}</p>
                    <p><b>Sekolah Dasar:</b> {{ $user->elementarySchool }}</p>
                    <p><b>Sekolah Menengah Pertama:</b> {{ $user->juniorHighSchool }}</p>
                    <p><b>Sekolah Menengah Atas:</b> {{ $user->seniorHighSchool }}</p>
                    <p><b>Sarjana:</b> {{ $user->collegeS1 }}</p>
                    <p><b>Jurusan Sarjana:</b> {{ $user->majorS1 }}</p>
                    <p><b>Magister:</b> {{ $user->collegeS2 }}</p>
                    <p><b>Jurusan Magister:</b> {{ $user->majorS2 }}</p>
                    <p><b>Doktor:</b> {{ $user->collegeS3 }}</p>
                    <p><b>Jurusan Doktor:</b> {{ $user->majorS3 }}</p>
                </div>

                <div class="show-family" id="show-card">
                    <h3>Gambaran Keluarga</h3><p><b>Nama Ayah:</b> {{ $user->fathers_name }}</p>
                    <p><b>Pekerjaan Ayah:</b> {{ $user->fathers_job }}</p>
                    <p><b>Nama Ibu:</b> {{ $user->mothers_name }}</p>
                    <p><b>Pekerjaan Ibu:</b> {{ $user->mothers_job }}</p>
                    <p><b>Jumlah Saudara Tua:</b> {{ $user->old_siblings }}</p>
                    <p><b>Jumlah Saudara Muda:</b> {{ $user->young_siblings }}</p>
                    <p><b>Tulang Punggung Keluarga:</b> {{ $user->backbone_family }}</p>
                </div>

                <div class="show-religion" id="show-card">
                    <h3>Statistik Agama</h3>
                    <p><b>Hafalan Al-Quran:</b> {{ $user->quranMemory }}</p>
                    <p><b>Tingkat:</b> {{ $user->level }}</p>
                    <p><b>Kajian ustad yang diikuti:</b> <br> {{ $user->answer1 }}</p>
                    <p><b>Apa pemahaman Anda tentang akhirat dan persiapannya dalam ajaran Islam?:</b> <br> {{ $user->answer2 }}</p>
                    <p><b>Apa yang Anda ketahui tentang proses pencarian pasangan hidup (taaruf) dalam Islam dan bagaimana Anda mempersiapkan diri untuk itu?:</b> <br> {{ $user->answer3 }}</p>
                    <p><b>Bagaimana Anda memahami konsep mahar (maskawin) dalam Islam dan bagaimana Anda menentukan nilai atau jenis mahar yang sesuai?:</b> <br> {{ $user->answer4 }}</p>
                    <p><b>Bagaimana Anda mengatasi konflik antara kebutuhan untuk memenuhi tuntutan dunia modern dengan menjalankan ajaran agama dalam kehidupan sehari-hari?:</b> <br> {{ $user->answer5 }}</p>
                    <p><b>Bagaimana Anda memandang pentingnya kesetiaan dalam pernikahan dalam Islam, terutama dalam konteks modern yang penuh dengan godaan dan tantangan?:</b> <br> {{ $user->answer6 }}</p>
                </div>

            </div>
            <div style="display: flex; justify-content: center; gap: 1rem; padding: 2rem 0">
                <a href="{{ route('search') }}" class="btn btn-primary">Kembali</a>
                <a href="" class="btn btn-primary">Ajukan Taaruf</a>
            </div>
        </div>
    </div>
</body>

</html>
