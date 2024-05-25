<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencari Pasangan</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body id="page-search">
    <x-navbar></x-navbar>
    <main>
        <div class="container-search">
            <h1 id="h1-search">Mencari Kriteria Pasangan</h1>
            <label for="searchType">Pilih Tipe Pencarian:</label>
            <select id="searchType">
              <option value="physical">Fisik</option>
              <option value="nonPhysical">Non-Fisik</option>
            </select>
      
            <div id="physicalSearch" class="search">
              <h2>Kriteria Fisik</h2>
              <label for="bodyType">Bentuk Fisik:</label>
              <select id="bodyType">
                <option value="" selected disabled>-- Pilih Bentuk Fisik --</option>
                <option value="Kurus">Kurus</option>
                <option value="Atletis">Atletis</option>
                <option value="Normal">Normal</option>
                <option value="Gemuk">Gemuk</option>
                <option value="Sangat Gemuk">Sangat Gemuk</option>
              </select>
              <label for="skinColor">Warna Kulit:</label>
              <select id="skinColor">
                <option value="" selected disabled>-- Pilih Warna Kulit --</option>
                <option value="Putih">Putih</option>
                <option value="Putih Kecoklatan">Putih Kecoklatan</option>
                <option value="Gelap">Gelap</option>
              </select>
              <label for="hairColor">Warna Rambut:</label>
              <select id="hairColor">
                <option value="" selected disabled>-- Pilih Warna Rambut --</option>
                <option value="Coklat">Coklat</option>
                <option value="Hitam">Hitam</option>
                <option value="Pirang">Pirang</option>
              </select>
              <label for="weight">Berat Badan:</label>
              <input type="text" id="weight" />
              <label for="height">Tinggi Badan:</label>
              <input type="text" id="height" />
            </div>
      
            <div id="nonPhysicalSearch" class="search">
              <h2>Kriteria Non-Fisik</h2>
              <label for="age">Umur:</label>
              <input type="text" id="age" />
              <label for="quran">Hafalan:</label>
              <input type="text" id="quran" />
              <label for="Education">Pendidikan:</label>
                  <select id="education">
                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                    <option value="Sarjana">Sarjana</option>
                    <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                    <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                    <option value="Sekolah Dasar">Sekolah Dasar</option>
                  </select>
              <label for="location">Domisili:</label>
              <input type="text" id="location" />
              <label for="occupation">Pekerjaan:</label>
              <input type="text" id="occupation" />
              <label for="maritalStatus">Status:</label>
              <input type="text" id="maritalStatus" />
              <label for="personality">Sifat:</label>
              <input type="text" id="personality" />
              <label for="ethnicity">Suku Bangsa:</label>
              <input type="text" id="ethnicity" />
            </div>
      
            <button id="button-search" onclick="search()">Search</button>
          </div>
          <div id="notFound" class="not-found">Data Tidak Ditemukan</div>
          <div class="container-result">
            <div id="results" class="card-container"></div>
          </div>
          <div id="popupBackdrop" class="popup-backdrop"></div>
    </main>
    <x-footer></x-footer>
    <script type="text/javascript" src="../../assets/js/search.js"></script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>