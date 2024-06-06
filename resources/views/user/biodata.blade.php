<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Biodata</title>
		<link rel="stylesheet" href="../../assets/css/style.css" />
		<link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
		<link
			rel="stylesheet" 
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
	</head>
	<body>
		<script src="/assets/js/script.js"></script>

		<header>
			<div id="header-container">
				<a href="/dashboard" style="display: flex; flex-direction: row; gap: 1rem;">
					<div class="fa fa-chevron-left" style="align-self: center; "></div>
					<h1 style="display: flex;">Kembali Ke Beranda</h1>
				</a>
			</div>
		</header>

		<div id="biodata">
			<div class="container-bio">
				<div class="wrapper-bio">
					<div id="wrapper-sidebar">
						<aside class="side-bio">
							<div class="sidebar-bio">
								<a href="#" class="sidebar-items selected" id="profil" onclick="showForm('profil')">Profil</a>
								<a href="#" class="sidebar-items" id="gambaran-diri" onclick="showForm('gambaran-diri')">Gambaran Diri</a>
								<a href="#" class="sidebar-items" id="gambaran-fisik" onclick="showForm('gambaran-fisik')">Gambaran Fisik</a>
								<a href="#" class="sidebar-items" id="gambaran-keluarga" onclick="showForm('gambaran-keluarga')">Gambaran Keluarga</a>
								<a href="#" class="sidebar-items" id="pendidikan" onclick="showForm('pendidikan')">Pendidikan</a>
								<a href="#" class="sidebar-items" id="ibadah" onclick="showForm('ibadah')">Ibadah</a>
							</div>
						</aside>
						<div
							id="open-sidesoal"
							onclick="openSidebar('wrapper-sidebar', '-230px')"
							style="color: #4b5c98">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
					
					<div class="form-bio" id="profil-form">
						<h1>Biodata</h1>
						<form action="{{ isset($profile) ? route('profile.update', $profile->id) : route('profile.post') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@if(isset($profile))
								@method('PUT')
							@endif
							<!-- Isi form -->
							<div class="field-bio">
								<!-- Input Foto Profil -->
								<div class="foto">
									<p>Foto Profil</p>
									<div class="profile-foto">
										<div class="pilihfoto">
											@if(isset($profile) && $profile->image)
												<img src="{{ asset('image/' . $profile->image) }}" id="profilepic">
											@endif
											<div>
												<label for="input-foto">Upload image</label>
												<input type="file" accept="image/jpeg, image/png, image/jpg" id="input-foto" name="image">
											</div>
										</div>
									</div>
								</div>
								<!-- Input Nama Lengkap -->
								<div class="namalengkap">
									<p>Nama Lengkap</p>
									<input type="text" class="namalengkap-input" placeholder="Masukkan nama lengkap" name="fullname" value="{{ old('fullname', $profile ? $profile->fullname : '') }}" required />
								</div>
								<!-- Input Nomor Telepon -->
								<div class="nomortelepon">
									<p>Nomor Telepon</p>
									<input type="text" class="nomortelepon-input" placeholder="Masukkan nomor telepon" name="phone_number" value="{{ old('phone_number', $profile ? $profile->phone_number : '') }}" required />
								</div>
								<!-- Input Tempat Lahir -->
								<div class="tempatlahir">
									<p>Tempat Lahir</p>
									<input type="text" class="tempatlahir-input" placeholder="Masukkan tempat lahir" name="place_date" value="{{ old('place_date', $profile ? $profile->place_date : '') }}" required />
								</div>
								<!-- Input Tanggal Lahir -->
								<div class="tanggallahir">
									<p>Tanggal Lahir</p>
									<input type="date" class="tanggallahir-input" placeholder="Tanggal lahir" name="birth_date" value="{{ old('birth_date', $profile ? $profile->birth_date : '') }}" required />
								</div>
								<!-- Input Jenis Kelamin -->
								<div class="jeniskelamin">
									<p>Jenis Kelamin</p>
									<div class="pilihanjeniskelamin">
										<div class="pilihan-radio">
											<input type="radio" id="laki-laki" name="gender" value="laki-laki" {{ old('gender', $profile ? $profile->gender : '') == 'laki-laki' ? 'checked' : '' }} required />
											<div class="icon-radio">
												<ion-icon name="man"></ion-icon>
												<label for="laki-laki">Laki-laki</label>
											</div>
										</div>
										<div class="pilihan-radio">
											<input type="radio" id="perempuan" name="gender" value="perempuan" {{ old('gender', $profile ? $profile->gender : '') == 'perempuan' ? 'checked' : '' }} required />
											<div class="icon-radio">
												<ion-icon name="woman"></ion-icon>
												<label for="perempuan">Perempuan</label>
											</div>
										</div>
									</div>
								</div>
								<!-- Input Pekerjaan -->
								<div class="pekerjaan">
									<p>Pekerjaan</p>
									<input type="text" class="pekerjaan-input" placeholder="Masukkan pekerjaan" name="job" value="{{ old('job', $profile ? $profile->job : '') }}" required />
								</div>
								<!-- Input Gaji -->
								<div class="gaji">
									<p>Gaji</p>
									<input type="number" class="gaji-input" placeholder="Masukkan gaji anda perbulan" name="salary" value="{{ old('salary', $profile ? $profile->salary : '') }}" required />
								</div>
								<!-- Input Status Pernikahan -->
								<div class="status">
									<p>Status</p>
									<select class="pilihanstatus" name="married_status" required>
										<option value="" disabled selected {{ !$profile ? 'selected' : '' }}>--- Pilih Status Anda ---</option>
										<option value="Sudah menikah" {{ old('married_status', $profile ? $profile->married_status : '') == 'Sudah menikah' ? 'selected' : '' }}>Sudah Menikah</option>
										<option value="Belum menikah" {{ old('married_status', $profile ? $profile->married_status : '') == 'Belum menikah' ? 'selected' : '' }}>Belum Menikah</option>
										<option value="Janda" {{ old('married_status', $profile ? $profile->married_status : '') == 'Janda' ? 'selected' : '' }}>Cerai</option>
									</select>
								</div>
								<!-- Input Suku -->
								<div class="suku">
									<p>Suku</p>
									<input type="text" class="suku-input" placeholder="Masukkan suku anda" name="ethnic" value="{{ old('ethnic', $profile ? $profile->ethnic : '') }}" required />
								</div>
							</div>
							<!-- Tombol Simpan -->
							<div class="divbutton">
								<button type="submit" class="simpan-btn">Simpan</button>
							</div>
						</form>
					</div>

					<div class="form-bio" id="gambaran-diri-form" style="display: none;">
						<h1>Gambaran Diri</h1>
						<form action="{{ isset($selfApp) ? route('selfapp.update', $selfApp->id) : route('selfapp.post') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@if(isset($selfApp))
								@method('PUT')
							@endif
							<div class="field-bio">
								<div class="motto">
									<p>Motto Diri</p>
									<input type="text" class="motto-input" placeholder="Sebutkan motto diri anda" name="motto" value="{{ old('motto', $selfApp ? $selfApp->motto : '') }}" required />
								</div>
								<div class="targethidup">
									<p>Target Hidup</p>
									<input type="text" class="targethidup-input" placeholder="Sebukan target hidup anda" name="lifegoals" value="{{ old('lifegoals', $selfApp ? $selfApp->lifegoals : '') }}" required />
								</div>
								<div class="hobi">
									<p>Hobi</p>
									<input type="text" class="hobi-input" placeholder="Sebutkan hobi anda" name="hobbies" value="{{ old('hobbies', $selfApp ? $selfApp->hobbies : '') }}" required />
								</div>
								<div class="haldisukai">
									<p>Hal yang disukai</p>
									<input type="text" class="haldisukai-input" placeholder="Jelaskan hal yang disukai anda" name="favThings" value="{{ old('favThings', $selfApp ? $selfApp->favThings : '') }}" required />
								</div>
								<div class="sifatpositif">
									<p>Sifat positif</p>
									<input type="text" class="sifatpositif-input" placeholder="Jelaskan sifat positif anda" name="positiveTraits" value="{{ old('positiveTraits', $selfApp ? $selfApp->positiveTraits : '') }}" required />
								</div>
								<div class="sifatnegatif">
									<p>Sifat negatif</p>
									<input type="text" class="sifatnegatif-input" placeholder="Jelaskan sifat negatif anda" name="negativeTraits" value="{{ old('negativeTraits', $selfApp ? $selfApp->negativeTraits : '') }}" required />
								</div>
								<div class="alasan">
									<p>Alasan taaruf</p>
									<input type="text" class="alasan-input" placeholder="Jelaskan alasan anda taaruf" name="taarufReason" value="{{ old('taarufReason', $selfApp ? $selfApp->taarufReason : '') }}" required />
								</div>
							</div>
							<div class="divbutton">
								<button type="submit" class="simpan-btn">Simpan</button>
							</div>
						</form>
					</div>

					<div class="form-bio" id="gambaran-keluarga-form" style="display: none;">
						<h1>Gambaran Keluarga</h1>
						<div class="field-bio">
							<div class="namaayah">
								<p>Nama ayah</p>
								<input type="text" class="namaayah-input" placeholder="Masukkan nama ayah anda" />
							</div>
							<div class="pekerjaanayah">
								<p>Pekerjaan ayah</p>
								<input type="text" class="pekerjaanayah-input" placeholder="Masukkan pekerjaan ayah anda" />
							</div>
							<div class="namaibu">
								<p>Nama ibu</p>
								<input type="text" class="namaibu-input" placeholder="Masukkan nama ibu anda" />
							</div>
							<div class="pekerjaanibu">
								<p>Pekerjaan ibu</p>
								<input type="text" class="pekerjaanibu-input" placeholder="Masukkan pekerjaan ibu anda" />
							</div>
							<div class="jumlahkakak">
								<p>Jumlah kakak</p>
								<input type="number" class="jumlahkakak-input" placeholder="Berapa jumlah kakak anda" />
							</div>
							<div class="jumlahkakak">
								<p>Jumlah adik</p>
								<input type="number" class="jumlahadik-input" placeholder="Berapa jumlah adik anda" />
							</div>
							<div class="status">
								<p>Tulang punggung keluarga</p>
								<select class="pilihanstatus">
									<option value="-" disabled selected>--- Pilih tulang punggung keluarga ---</option>
  									<option value="Saya">Saya</option>
  									<option value="Ayah">Ayah</option>
  									<option value="Ibu">Ibu</option>
  									<option value="Kakak">Kakak</option>
  									<option value="Adik">Adik</option>
								</select>
							</div>
						</div>
						<div class="divbutton">
						<button type="submit" class="simpan-btn">Simpan</button>
						</div>
					</div>

					<div class="form-bio" id="pendidikan-form" style="display: none;">
						<h1>Pendidikan</h1>
						<div class="field-bio">
							<div class="sekolahdasar">
								<p>Sekolah Dasar (SD)</p>
								<input type="text" class="sekolahdasar-input" placeholder="Dimana anda bersekolah dasar" />
							</div>
							<div class="sekolahmenengahpertama">
								<p>Sekolah Menengah Pertama (SMP)</p>
								<input type="text" class="sekolahmenengahpertama-input" placeholder="Dimana anda bersekolah menengah pertama" />
							</div>
							<div class="sekolahmenengahatas">
								<p>Sekolah Menengah Atas (SMA)</p>
								<input type="text" class="sekolahmenengahatas-input" placeholder="Dimana anda bersekolah menengah atas" />
							</div>
							<div class="perguruantinggis1">
								<p>Perguruan Tinggi (S1)</p>
								<input type="text" class="perguruantinggis1-input" placeholder="Dimana anda bersekolah perguruan tinggi" />
							</div>
							<div class="jurusan">
								<p>Jurusan</p>
								<input type="text" class="jurusans1-input" placeholder="Apa jurusan yang anda ikuti" />
							</div>
							<div class="perguruantinggis2">
								<p>Perguruan Tinggi (S2)</p>
								<input type="text" class="perguruantinggis2-input" placeholder="Dimana anda bersekolah perguruan tinggi" />
							</div>
							<div class="jurusan">
								<p>Jurusan</p>
								<input type="text" class="jurusans1-input" placeholder="Apa jurusan yang anda ikuti" />
							</div>
							<div class="perguruantinggis3">
								<p>Perguruan Tinggi (S3)</p>
								<input type="text" class="perguruantinggis3-input" placeholder="Dimana anda bersekolah perguruan tinggi" />
							</div>
							<div class="jurusan">
								<p>Jurusan</p>
								<input type="text" class="jurusans1-input" placeholder="Apa jurusan yang anda ikuti" />
							</div>
						</div>
						<div class="divbutton">
							<button type="submit" class="simpan-btn">Simpan</button>
							</div>
					</div>

					<div class="form-bio" id="ibadah-form" style="display: none;">
						<h1>Ibadah</h1>
						<div class="field-bio">
							<div class="hafalan">
								<p>Hafalan al-quran</p>
								<input type="text" class="sekolahdasar-input" placeholder="Masukkan hafalan al-quran anda" />
							</div>
							<div class="status">
								<p>Bacaan al-quran</p>
								<select class="pilihanstatus">
									<option value="-" disabled selected>--- Pilih Bacaan Al-quran Anda ---</option>
  									<option value="Lancar">Lancar</option>
  									<option value="Sedang">Sedang</option>
  									<option value="Masih belajar">Masih Belajar</option>
								</select>
							</div>
							<div class="kajianustad">
								<p>Kajian ustad yang diikuti</p>
								<input type="text" class="kajianustad-input" placeholder="Dimana anda bersekolah menengah atas" />
							</div>
							<div class="pertanyaan1">
								<p>Apa pemahaman Anda tentang akhirat dan persiapannya dalam ajaran Islam?</p>
								<input type="text" class="pertanyaan1-input" placeholder="Jelaskan pendapat anda" />
							</div>
							<div class="pertanyaan2">
								<p>Apa yang Anda ketahui tentang proses pencarian pasangan hidup (taaruf) dalam Islam dan bagaimana Anda mempersiapkan diri untuk itu?</p>
								<input type="text" class="pertanyaan2-input" placeholder="Jelaskan pendapat anda" />
							</div>
							<div class="pertanyaan3">
								<p>Bagaimana Anda memahami konsep mahar (maskawin) dalam Islam dan bagaimana Anda menentukan nilai atau jenis mahar yang sesuai?</p>
								<input type="text" class="pertanyaan3-input" placeholder="Jelaskan pendapat anda" />
							</div>
							<div class="pertanyaan4">
								<p>Bagaimana Anda mengatasi konflik antara kebutuhan untuk memenuhi tuntutan dunia modern dengan menjalankan ajaran agama dalam kehidupan sehari-hari?</p>
								<input type="text" class="pertanyaan4-input" placeholder="Jelaskan pendapat anda" />
							</div>
							<div class="pertanyaan5">
								<p>Bagaimana Anda memandang pentingnya kesetiaan dalam pernikahan dalam Islam, terutama dalam konteks modern yang penuh dengan godaan dan tantangan?</p>
								<input type="text" class="pertanyaan5-input" placeholder="Jelaskan pendapat anda" />
							</div>
						</div>
						<div class="divbutton">
							<button type="submit" class="simpan-btn">Simpan</button>
							</div>
					</div>

					<div class="form-bio" id="gambaran-fisik-form" style="display: none;">
						<h1>Gambaran Fisik</h1>
						<form action="{{ isset($physicalApp) ? route('physicalapp.update', $physicalApp->id) : route('physicalapp.post') }}" method="POST" enctype="multipart/form-data">
							@csrf
							@if(isset($physicalApp))
								@method('PUT')
							@endif
							<div class="field-bio">
								<div class="status">
									<p>Warna Kulit</p>
									<select class="pilihanstatus" name="skincolor">
										<option value="-" disabled selected>--- Pilih Warna Kulit Anda ---</option>
										<option value="Putih" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Putih' ? 'selected' : '' }}>Putih</option>
										<option value="Putih Kemerahan" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Putih Kemerahan' ? 'selected' : '' }}>Putih Kemerahan</option>
										<option value="Putih Kecoklatan" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Putih Kecoklatan' ? 'selected' : '' }}>Putih Kecoklatan</option>
										<option value="Coklat Sawo Matang" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Coklat Sawo Matang' ? 'selected' : '' }}>Coklat Sawo Matang</option>
										<option value="Coklat Kehitaman" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Coklat Kehitaman' ? 'selected' : '' }}>Coklat Kehitaman</option>
										<option value="Gelap" {{ old('skincolor', $physicalApp ? $physicalApp->skincolor : '') == 'Gelap' ? 'selected' : '' }}>Gelap</option>
									</select>
								</div>
								<div class="status">
									<p>Warna Rambut</p>
									<select class="pilihanstatus" name="haircolor">
										<option value="-" disabled selected>--- Pilih Warna Rambut Anda ---</option>
										<option value="Hitam" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Hitam' ? 'selected' : '' }}>Hitam</option>
										<option value="Coklat" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Coklat' ? 'selected' : '' }}>Coklat</option>
										<option value="Pirang" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Pirang' ? 'selected' : '' }}>Pirang</option>
										<option value="Coklat Sawo Matang" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Coklat Sawo Matang' ? 'selected' : '' }}>Coklat Sawo Matang</option>
										<option value="Coklat Kehitaman" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Coklat Kehitaman' ? 'selected' : '' }}>Coklat Kehitaman</option>
										<option value="Gelap" {{ old('haircolor', $physicalApp ? $physicalApp->haircolor : '') == 'Gelap' ? 'selected' : '' }}>Gelap</option>
									</select>
								</div>
								<div class="status">
									<p>Tipe Rambut</p>
									<select class="pilihanstatus" name="hairtype">
										<option value="-" disabled selected>--- Pilih Tipe Rambut Anda ---</option>
										<option value="Lurus" {{ old('hairtype', $physicalApp ? $physicalApp->hairtype : '') == 'Lurus' ? 'selected' : '' }}>Lurus</option>
										<option value="Bergelombang" {{ old('hairtype', $physicalApp ? $physicalApp->hairtype : '') == 'Bergelombang' ? 'selected' : '' }}>Bergelombang</option>
										<option value="Ikal" {{ old('hairtype', $physicalApp ? $physicalApp->hairtype : '') == 'Ikal' ? 'selected' : '' }}>Ikal</option>
										<option value="Keriting" {{ old('hairtype', $physicalApp ? $physicalApp->hairtype : '') == 'Keriting' ? 'selected' : '' }}>Keriting</option>
									</select>
								</div>
								<div class="tinggibadan">
									<p>Tinggi Badan (cm)</p>
									<input
										type="number"
										class="tinggibadan-input"
										placeholder="Masukkan tinggi badan anda"
										name="height" value="{{ old('height', $physicalApp ? $physicalApp->height : '') }}" />
								</div>
								<div class="tinggibadan">
									<p>Berat Badan (kg)</p>
									<input
										type="number"
										class="beratbadan-input"
										placeholder="Masukkan berat badan anda"
										name="weight" value="{{ old('weight', $physicalApp ? $physicalApp->weight : '') }}" />
								</div>
								<div class="hobi">
									<p>Jelaskan riwayat penyakit (jika ada)</p>
									<input
										type="text"
										class="hobi-input"
										placeholder="Jelaskan riwayat penyakit anda" 
										name="illness" value="{{ old('illness', $physicalApp ? $physicalApp->illness : '-') }}"/>
								</div>
								<div class="hobi">
									<p>Jelaskan ciri khas anda (jika ada)</p>
									<input
										type="text"
										class="hobi-input"
										placeholder="Jelaskan ciri khas anda"
										name="uniqueTraits" value="{{ old('uniqueTraits', $physicalApp ? $physicalApp->uniqueTraits : '-') }}"/>
								</div>
								<div class="hobi">
									<p>Jelaskan cacat fisik anda (jika ada)</p>
									<input
										type="text"
										class="hobi-input"
										placeholder="Jelaskan cacat fisik anda"
										name="disability" value="{{ old('disability', $physicalApp ? $physicalApp->disability : '-') }}" />
								</div>
							</div>
						
							<div class="divbutton">
								<button type="submit" class="simpan-btn">Simpan</button>
							</div>
					
				</form>
			</div>
			
		</div>

		<!----Icon Jenis Kelamin--->
		<script
			type="module"
			src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
		</script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	
		<script>
			let profilepic = document.querySelector('#profilepic');
			let inputFoto = document.querySelector('#input-foto');

			inputFoto.onchange = function(){
				profilepic.src = URL.createObjectURL(inputFoto.files[0]);
			}

			function showForm(formId) {
				let forms = document.getElementsByClassName('form-bio');
				let sidebarChoice = document.getElementById(formId);
				let sidebars = document.getElementsByClassName('sidebar-items');
				for (let i = 0; i < sidebars.length; i++) {
					sidebars[i].classList.remove('selected');
				}
				sidebarChoice.classList.add('selected');

				for (let i = 0; i < forms.length; i++) {
					forms[i].style.display = 'none';
				}
				
				document.getElementById(formId + '-form').style.display = 'block';

				let newUrl = window.location.href.split('#')[0] + '#' + formId;
   				window.history.pushState({ path: newUrl }, '', newUrl);
			}

			let simpanButton = document.querySelectorAll('.simpan-btn');
			simpanButton.forEach(function(btn) {
				btn.addEventListener("click", function() {
					let konfirmasi = confirm("Apakah yakin semua sudah benar dan ingin disimpan?");
					if (konfirmasi) {
						alert("Data telah disimpan.");
					} else {
						alert("Data batal disimpan");
					}
				});

			});
		</script>
	</body>
</html>
