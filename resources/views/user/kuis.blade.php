<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../../assets/css/style.css" />
		<link rel="stylesheet" href="pelatihan.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
            <style>
                .choice input[type="radio"] {
                  display: none;
                }
                .choice {
                  cursor: pointer;
                }
                .choice.selected .choice-prefix {
                  background-color: #4b5c98;
                  color: #fff 
                }
              </style>
		<title>Pelatihan</title>
	</head>
	<body id="soal-page">
		<header id="header-soal">
			<div id="header-container">
				<h1 style="padding: 0; margin: 0">Pelatihan Pra-nikah</h1>
				<div>
					{{-- <a href="#" class="button" id="kumpul-btn">Kumpulkan</a> --}}
				</div>
			</div>
		</header>
		<main id="page-soal">
			<div id="popup-overlay" class="popup-overlay"></div>
			<div id="konfirmasi-popup" class="popup">
				<div class="popup-content">
					<p>Apakah Anda yakin ingin mengumpulkan?</p>
					<button id="yes-btn">Ya</button>
					<button style="background-color: #a0a0a0">Tidak</button>
				</div>
			</div>
			<div id="done-popup" class="popup">
				<div class="popup-content">
					<p>Terima kasih, Jawaban berhasil dikumpulkan</p>
					<button>Selesai dan Lihat Hasil</button>
				</div>
			</div>
			<div class="box">
				<div id="side-soal-container">
					<aside class="side-soal">
						<div class="number-soal">
							<h1>Soal</h1>
						</div>
						<div id="number-container">
                            @foreach($soals as $index => $soal)
                                <div class="number-box">{{ $index + 1 }}</div>
                            @endforeach
                        </div>
					</aside>
					<div
						id="open-soal"
						onclick="openSidebar('side-soal-container', '-260px')"
						style="color: #4b5c98">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
				</div>
				<div class="wrapper-soal">
					<form action="{{ route('kuis.store') }}" method="POST">
                        @csrf
                        @foreach($soals as $index => $soal)
                            <div class="soal" id="soal{{ $index }}" data-index="{{ $index }}">
                                <div id="soal-container">
                                    <h1 id="judul-soal">{{ $soal->judul }}</h1>
                                    <p id="isi-soal" style="font-size: 18px">{{ $soal->isi }}</p>
                                </div>
                                <div class="choice-container">
                                    @foreach($soal->jawabans as $jawaban)
                                        <div class="choice">
                                            <p class="choice-prefix">{{ chr(64 + $loop->iteration) }}</p>
                                            <p class="choice-text" id="jawaban" data-number="{{ $jawaban->id }}">
                                                <input type="radio" name="jawaban[{{ $soal->id }}]" value="{{ $jawaban->id }}">
                                                {{ $jawaban->teks }}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="button" id="back-btn" style="display: none;">Back</button>
                        <button type="button" class="button" id="next-btn">Next</button>
                        <button type="submit" class="button" id="kumpul-btn" style="display: none;">Kumpulkan</button>
                    </form>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../../assets/js/script.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
              document.querySelectorAll('.choice').forEach(function(choiceElement) {
                choiceElement.addEventListener('click', function() {
                  // Unselect other choices in the same container
                  const choiceContainer = choiceElement.closest('.choice-container');
                  choiceContainer.querySelectorAll('.choice').forEach(function(el) {
                    el.classList.remove('selected');
                  });
                  
                  // Select this choice
                  choiceElement.classList.add('selected');
                  
                  // Check the hidden radio input
                  const radioInput = choiceElement.querySelector('input[type="radio"]');
                  if (radioInput) {
                    radioInput.checked = true;
                  }
                });
              });
            });
          </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const soalElements = document.querySelectorAll('.soal');
                    let currentSoalIndex = 0;

                    function showSoal(index) {
                        soalElements.forEach(function(soalElement, idx) {
                            if (idx === index) {
                                soalElement.style.display = 'block';
                            } else {
                                soalElement.style.display = 'none';
                            }
                        });

                        if (index === 0) {
                            document.getElementById('back-btn').style.display = 'none';
                        } else {
                            document.getElementById('back-btn').style.display = 'inline-block';
                        }

                        if (index === soalElements.length - 1) {
                            document.getElementById('next-btn').style.display = 'none';
                            document.getElementById('kumpul-btn').style.display = 'inline-block';
                        } else {
                            document.getElementById('next-btn').style.display = 'inline-block';
                            document.getElementById('kumpul-btn').style.display = 'none';
                        }
                    }

                    document.getElementById('next-btn').addEventListener('click', function() {
                        currentSoalIndex++;
                        showSoal(currentSoalIndex);
                    });

                    document.getElementById('back-btn').addEventListener('click', function() {
                        currentSoalIndex--;
                        showSoal(currentSoalIndex);
                    });

                    // Menampilkan soal pertama saat halaman dimuat
                    showSoal(currentSoalIndex);
                });
            </script>
	</body>
</html>
