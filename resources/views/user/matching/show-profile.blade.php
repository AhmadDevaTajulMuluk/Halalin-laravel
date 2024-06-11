<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="cd">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
    
        .modal-content {
            background-color: #fff;
            border-radius: 5px;
            width: 300px;
            margin: 20% auto;
            padding: 20px;
        }
    
        .modal-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
    
        .modal-title {
            font-size: 18px;
        }
    
        .modal-body {
            margin-bottom: 20px;
        }
    
        .modal-footer {
            text-align: right;
        }
    
        .btn {
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            color: #fff;
        }
    
        .btn-primary {
            background-color: #007bff;
        }
    
        .btn-secondary {
            background-color: #6c757d;
            margin-right: 10px;
        }
    </style>    
</head>

<body>
    <div class="page-show">
        <div class="card-lalala">
            <div class="card-header">
                Profil Pengguna: {{ $user->username }}
            </div>
            <br>
            <button onclick="window.history.back()" class="back-button">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </button>
            <div class="card-body">
                <h1 class="mb-4">CV Lengkap</h1>
                <div class="show-profile" id="show-card">                   
                    <h3>Profil</h3>
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
            <div style="display: flex; justify-content: center; gap: 2rem; padding: 1rem;">
                <a href="{{ route('search') }}" class="button">Kembali</a>
                <form id="requestForm" action="{{ route('request_taaruf.send', $user->id) }}" method="POST">
                    @csrf
                    <button type="button" class="button" id="confirmBtn">Ajukan Taaruf</button>
                </form>                
            </div>
        </div>
    </div>
    <div id="confirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pengajuan Taaruf</h5>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengajukan taaruf?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="confirmSubmit">Ya, Ajukan Taaruf</button>
                </div>
            </div>
        </div>
    </div>    
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var confirmBtn = document.getElementById('confirmBtn');
        var confirmSubmit = document.getElementById('confirmSubmit');
        var requestForm = document.getElementById('requestForm');
        var confirmModal = document.getElementById('confirmModal');

        confirmBtn.addEventListener('click', function() {
            confirmModal.style.display = 'block';
        });

        confirmSubmit.addEventListener('click', function() {
            requestForm.submit();
        });

        var closeModalButtons = document.querySelectorAll('[data-dismiss="modal"]');
        closeModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                confirmModal.style.display = 'none';
            });
        });
    });
</script>



</html>
