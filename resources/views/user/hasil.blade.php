<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    <link rel="stylesheet" href="pelatihan.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
        .answer-prefix.dipilih {
            background-color: #4b5c98; 
            color:  #fff;
        }
    </style>
    <title>Pelatihan</title>
  </head>
  <body>
    <header id="header-soal">
      <div id="header-container">
        <h1 style="padding: 0; margin: 0">Hasil Pelatihan</h1>
      </div>
    </header>
    <main id="page-hasil">
        <div class="box">
          <div id="side-soal-container">
            <aside class="side-soal">
              <div class="skor">
                <h1>SKOR</h1>
              </div>
              <div class="nilai">
                <h1>{{ $nilai }}</h1>
              </div>
              <div class="summary">
                <div class="summary-true">
                  <p>Benar</p>
                  <p class="answer-true">{{ $jumlah_benar }}</p>
                </div>
                <div class="summary-false">
                  <p>Salah</p>
                  <p class="answer-true">{{ $jumlah_salah }}</p>
                </div>
              </div>
              <div class="keterangan">
                  @if($nilai >= 70)
                      <p style="font-size: 15px; text-align: center;">Skor anda memenuhi kriteria, anda telah menyelesaikan pelatihan ini. Selamat!!!</p><br>
                      <a class="button"  id="menuPelatihan" href="/pelatihan/bab/3">Menu Pelatihan</a>
                  @else
                      <p style="font-size: 15px; text-align: center;">Maaf, skor anda tidak memenuhi kriteria untuk melanjutkan ke pelatihan berikutnya.</p><br>
                      <a class="button" id="menuPelatihan" href="/pelatihan/bab/3">Kembali ke Soal</a>
                  @endif
              </div>
            </aside>
            <div id="open-soal" onclick="openSidebar('side-soal-container', '-260px')">
              <img src="../../assets/images/dropdown.png" alt="" width="10px" />
            </div>
          </div>
          <div class="wrapper-soal">
            @foreach($jawabanDiberikan as $jawaban)
              @if(is_object($jawaban))
                <div class="soal" id="soal">
                  <div id="soal-container">
                    <div class="@if($jawaban->benar) benar @else salah @endif">
                      <h1>
                        @if($jawaban->benar)
                          <i class="fa-solid fa-check"></i> Benar
                        @else
                          <i class="fa-solid fa-xmark"></i> Salah
                        @endif
                      </h1>
                    </div>
                    <h1 id="judul-soal">{{ $jawaban->soal->judul }}</h1>
                    <p id="isi-soal" style="font-size: 18px">{{ $jawaban->soal->isi }}</p>
                  </div>
                  <div class="choice-container">
                    @foreach($jawaban->soal->jawabans as $jawaban_pilihan)
                      <div class="choice">
                        <p class="answer-prefix @if(in_array($jawaban_pilihan->id, $jawabanDipilih)) dipilih @endif">
                            {{ chr(64 + $loop->iteration) }}{{ $jawaban_pilihan->prefix }}
                        </p>
                        <p class="jawab-text">{{ $jawaban_pilihan->teks }}</p>
                      </div>
                    @endforeach
                  </div>
                </div>
              @else
                <p>Jawaban tidak ditemukan.</p>
              @endif
            @endforeach
          </div>
        </div>
      </main>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
  </body>
</html>
