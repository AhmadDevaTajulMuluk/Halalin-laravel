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
                        <input type="text" class="sifatnegatif-input" placeholder="Jelaskan sifat negatif anda" name="negativeTraits" value="{{ old('negativeTraits', $selfApp ? $selfApp->negative : '') }}" required />
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
            </form>
        </div>
        <div class="divbutton">
            <button type="submit" class="simpan-btn">Simpan</button>
        </div>

		<script>
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
			}
		</script>
	</body>
</html>
