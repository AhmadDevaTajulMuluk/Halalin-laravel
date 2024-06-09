<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="pelatihan.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
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
                    <p style="font-size: 15px">Skor anda memenuhi kriteria, anda berhak untuk lanjut ke pelatihan berikutnya.</p>
                    <button id="menuPelatihan" onclick="kePelatihan()">Menu Pelatihan</button>
                @else
                    <p style="font-size: 15px">Maaf, skor anda tidak memenuhi kriteria untuk melanjutkan ke pelatihan berikutnya.</p>
                    <button id="menuPelatihan" onclick="kePelatihan()">Kembali ke Soal</button>
                @endif
            </div>
          </aside>
          <div
            id="open-soal"
            onclick="openSidebar('side-soal-container', '-260px')"
          >
            <img src="../../assets/images/dropdown.png" alt="" width="10px" />
          </div>
        </div>
        <div class="wrapper-soal">
        @foreach($jawaban as $jawaban)
          <div class="soal" id="soal">
                <div id="soal-container">
                <div class="@if(isset($jawaban) && $jawaban instanceof App\Jawaban && $jawaban->benar) benar @else salah @endif">
                    <h1>
                        @if(isset($jawaban) && $jawaban instanceof App\Jawaban && $jawaban->benar)
                            <i class="fa-solid fa-check"></i>
                        Benar
                        @else
                            <i class="fa-solid fa-xmark"></i>
                            Salah
                        @endif
                    </h1>
                </div>

                <h1 id="judul-soal">{{ isset($jawaban) && $jawaban instanceof App\Jawaban && $jawaban->soal->judul }}</h1>
                <p id="isi-soal" style="font-size: 18px">
                    {{ isset($jawaban) && $jawaban instanceof App\Jawaban && $jawaban->soal->isi }}
                </p>
                </div>
                <div class="choice-container">
                    @if(isset($jawaban) && $jawaban instanceof App\Jawaban && $jawaban->soal && $jawaban->soal->jawabans)
    @foreach($jawaban->soal->jawabans as $jawaban_pilihan)
                    <div class="choice">
                        <p class="answer-prefix">{{ $jawaban_pilihan->prefix }}</p>
                        <p class="jawab-text">{{ $jawaban_pilihan->teks }}</p>
                    </div>
    @endforeach
@endif
                    
                </div>
          </div>
          @endforeach
        </div>
      </div>
    </main>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
  </body>
</html>
