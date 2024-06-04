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
		<x-navbarustadz></x-navbarustadz>
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
						<div class="layanan-text">
							<h3>Buat CV</h3>
							<hr />
							<p>Buat CV ta’aruf anda agar mendapatkan pasangan yang cocok.</p>
						</div>
					</div>
					<div class="item-box-layanan">
						<div class="layanan-text">
							<h3>Lihat Artikel</h3>
							<hr />
							<p>Lihat artikel terkait dengan pernikahan.</p>
						</div>
					</div>
					<div class="item-box-layanan" >
						<div class="layanan-text">
							<h3>Cari Pasangan</h3>
							<hr />
							<p>Mencari pasangan dengan searching and matching.</p>
						</div>
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
					<div class="item-box" id="testimoni">
						<img src="../assets/images/user.png" alt="group" />
						<div class="testimonial">
							<p class="testimonial-author">Dadang Injeksi</p>
							<p class="testimonial-content">
								"Alhamdulillah berkat website ini saya mendapat pasangan hidup yang cocok"
							</p>
						</div>
					</div>
					<div class="item-box" id="testimoni">
						<img src="../assets/images/user.png" alt="group" />
						<div class="testimonial">
							<p class="testimonial-author">Toha Mukena</p>
							<p class="testimonial-content">"Website pencari jodoh halal terbaik !"</p>
						</div>
					</div>
					<div class="item-box" id="testimoni">
						<img src="../assets/images/user.png" alt="group" />
						<div class="testimonial">
							<p class="testimonial-author">Sutoyo Kabel</p>
							<p class="testimonial-content">"Panjang umur kebaikan, ilmu padi capt"</p>
						</div>
					</div>
				</div>
			</article>
			<article
				id="articles-halalin"
				class="about-halalin-container container-effect"
				style="margin-bottom: 2rem">
				<h2 id="title-dasboard" style="margin: 0; font-size: 42px">Artikel</h2>
				<div class="items-container">
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/gambar-artikel1.png" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/gambar-artikel1.png" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/gambar-artikel1.png" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/gambar-artikel1.png" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/gambar-artikel1.png" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
					<div class="item-box" id="artikelbox">
						<article>
							<img src="../assets/images/manfaatpernikahan.jpg" alt="Artikel" />
							<div class="article-text">
								<h3>Tiga Manfaat Pernikahan dalam Islam, Apa Saja?</h3>
								<p>
									Pernikahan dalam Islam memiliki peran yang sangat penting dalam membentuk
									kehidupan berkeluarga yang harmonis dan memberikan berbagai manfaat bagi individu,
									keluarga, dan masyarakat secara keseluruhan. Dalam ajaran Islam, pernikahan
									dianggap sebagai salah satu ibadah yang dianjurkan, dengan tujuan untuk mencapai
									keberkahan, kestabilan, dan keseimbangan dalam hidup. Dalam penjelasan berikut,
									akan diuraikan secara rinci tiga manfaat pernikahan dalam Islam yang meliputi
									membentuk keluarga yang stabil, mendapatkan keberkahan, dan melengkapi diri serta
									mencapai keseimbangan.
								</p>
							</div>
						</article>
					</div>
				</div>
				<a
					href="/artikel"
					style="
						font-size: 16px;
						font-weight: 400;
						margin-top: 10px;
						text-decoration: none;
						color: #4b4b4b;
						margin: 0;
					">
					Lebih Banyak..
				</a>
			</article>
		</main>

		<x-footer></x-footer>
		<script type="text/javascript" src="../../assets/js/script.js"></script>
	</body>
</html>
