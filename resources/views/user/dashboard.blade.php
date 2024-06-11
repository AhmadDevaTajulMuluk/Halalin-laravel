<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
		<link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<title>Dashboard</title>
	</head>
	<body>
		@if (session('errorTaaruf'))
			<div id="error-alert" style="display: flex; width: 100%; justify-content: center; transition: 5s ease; z-index: 9999; position: fixed; top: 20;">
				<div class="alert alert-danger" style="text-align: center; width: 50%; padding: 40px 0;">
					{{ session('errorTaaruf') }}
				</div>
			</div>
			<script>
				// Setelah 3 detik, sembunyikan pesan error
				setTimeout(function() {
					var errorAlert = document.getElementById('error-alert');
					errorAlert.style.transform = 'translateY(-500px)';
				}, 2000);
			</script>
		@endif
		@if (session('successTaaruf'))
			<div id="success-alert" style="display: flex; width: 100%; justify-content: center; transition: 5s ease; z-index: 9999; position: fixed; top: 20;">
				<div class="alert alert-success" style="text-align: center; width: 50%; padding: 40px 0;">
					{{ session('successTaaruf') }}
				</div>
			</div>
			<script>
				// Setelah 3 detik, sembunyikan pesan success
				setTimeout(function() {
					var successAlert = document.getElementById('success-alert');
					successAlert.style.transform = 'translateY(-500px)';
				}, 2000);
			</script>
		@endif
		@if (session('error'))
			<div id="error-alert" style="display: flex; width: 100%; justify-content: center; transition: 5s ease; z-index: 9999; position: fixed; top: 20;">
				<div class="alert alert-danger" style=" text-align: center; width: 30%; padding: 40px 0;">
					{{ session('error') }}
				</div>
			</div>
			<script>
				// Setelah 3 detik, sembunyikan pesan error
				setTimeout(function() {
					var errorAlert = document.getElementById('error-alert');
					errorAlert.style.transform = 'translateY(-500px)';
				}, 2000);
			</script>
		@endif
		<div id="next-page-container" onclick="closeTabNavigator('next-page-container')">
			<div id="next-page">
				<p>Buat akun untuk melanjutkan</p>
				<a href="../views/pages/register.html" class="button">Register</a>
				<p>
					Sudah punya akun?
					<a href="../views/pages/login.html" class="login">Login</a>
				</p>
			</div>
		</div>
		{{-- manggil navbar --}}
		<x-navbar :profile="$profile"></x-navbar>
		<main id="page-dashboard">
			<article id="promotion-container">
				<div id="promotion-text">
					<h1
						style="
							font-size: 65px;
							margin: 10px;
							padding-inline: 80px;
							text-align: center;
							color: #4b5c98;
						">
						Langkah Halal Mencari Cinta Sejati
					</h1>
					<p style="font-size: 20px; margin: 10px; text-align: center">
						Temukan jodohmu dengan aplikasi Halalin
					</p>
					<a
						href="{{ route('search') }}"
						class="button"
						style="display: flex; padding: 0.8rem 1.2rem; margin: 1rem 0">
						Cari Pasangan
					</a>
				</div>
			</article>
			<article id="about-halalin" class="about-halalin-container container-effect">
				<h2 style="margin: 0; font-size: 42px">Tentang Halalin</h2>
				<p style="font-size: 18px; color: #4b4b4b; font-weight: 400; margin: 0">
					Halalin merupakan website yang dikembangkan untuk menghubungkan seseorang yang serius
					dalam mencari pasangan hidup dan sesuai dengan syariat islam. Website ini dapat menjadi
					solusi untuk mereka yang merasa kesulitan dalam mencari pasangan sehidup sematinya.
					Website ini hadir untuk membantu orang mencapai sebuah keharusan yang wajib dilaksanakan
					oleh tiap umat muslim, yaitu menikah.
				</p>
			</article>
			<article id="services-halalin" class="about-halalin-container container-effect">
				<h2 id="title-dasboard" style="margin: 0; font-size: 42px">Layanan Kami</h2>
				<div class="items-container">
					<div class="item-box-layanan">
						<a href="{{ route('biodata') }}" class="layanan-text">
							<div class=>
								<h3>Buat CV</h3>
								<hr />
								<p>Buat CV ta’aruf anda agar mendapatkan pasangan yang cocok.</p>
							</div>
						</a>
					</div>
					<div class="item-box-layanan">
						<a href="{{ route('artikel') }}" class="layanan-text">
							<div>
								<h3>Lihat Artikel</h3>
								<hr />
								<p>Lihat artikel terkait dengan pernikahan.</p>
							</div>
						</a>
					</div>
					<div class="item-box-layanan" >
						<a href="{{ route('search') }}" class="layanan-text">
							<div>
								<h3>Cari Pasangan</h3>
								<hr />
								<p>Mencari pasangan dengan searching and matching.</p>
							</div>
						</a>
					</div>
					<div class="item-box-layanan">
						<div class="layanan-text">
							<h3>Latihan Pranikah</h3>
							<hr />
							<p>Ikuti Pelatihan Pranikah sekarang.</p>
						</div>
					</div>
				</div>
			</article>
			<article id="comments-halalin" class="about-halalin-container container-effect">
				<h2 id="title-dasboard" style="margin: 0; font-size: 42px">Apa Kata Mereka</h2>
				<div class="items-container">
					@if($testimoni->isEmpty())
						<div style="display: flex; justify-content: center; align-items: center; height: 200px;">
							<p>Belum ada testimoni yang tersedia.</p>
						</div>
					@else
						@foreach($testimoni as $testimonial)
							<div class="item-box" id="testimoni">
								<img src="{{ $testimonial->image ? asset('images/testimoni/' . $testimonial->image) : asset('assets/images/user.png') }}" alt="Testimoni" />
								<div class="testimonial">
									<p class="testimonial-author">{{ $testimonial->author }}</p>
									<p class="testimonial-content">"{{ $testimonial->content }}"</p>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</article>
			<article id="articles-halalin" class="about-halalin-container container-effect" style="margin-bottom: 2rem">
				<h2 id="title-dasboard" style="margin: 0; font-size: 42px">Artikel</h2>
				<div class="items-container">
					@if($articles->isEmpty())
						<div style="display: flex; justify-content: center; align-items: center; height: 200px;">
							<p>Belum ada artikel yang tersedia.</p>
						</div>
					@else
						@foreach($articles as $article)
							<div class="item-box" id="artikelbox">
								<article>
									<img src="{{ asset('image/' . $article->article_image) }}" alt="Artikel" />
									<div class="article-text">
										<h3>{{ $article->title }}</h3>
										<p>{{ Str::limit($article->content, 150) }}</p>
										<a href="{{ route('artikel.show', $article->article_id) }}" class="button">Selengkapnya</a>
									</div>
								</article>
							</div>
						@endforeach
					@endif
				</div>
				<a href="{{ route('artikel') }}" style="font-size: 16px; font-weight: 400; margin-top: 10px; text-decoration: none; color: #4b4b4b; margin: 0;">
					Lebih Banyak..
				</a>
			</article>
		</main>
		<x-footer></x-footer>
		<script type="text/javascript" src="../../assets/js/script.js"></script>
	</body>
</html>
