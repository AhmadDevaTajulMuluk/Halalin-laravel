<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencari Pasangan</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body id="page-search">
    {{-- @dd($profile) --}}
    <x-navbar :profile="$profile"></x-navbar>
    <main>
        <div class="container-search">
            <h1 id="h1-search">Mencari Kriteria Pasangan</h1>
            <form action="{{ route('search.partner') }}" method="POST">
              @csrf
              <label for="searchType">Pilih Tipe Pencarian:</label>
              <select id="searchType" name="searchType">
                <option value="" selected>-- Pilih Tipe Pencarian --</option>
                <option value="physical">Fisik</option>
                <option value="nonPhysical">Non-Fisik</option>
              </select>
        
              <div id="physicalSearch" class="search" style="display: none;">
                <h2>Kriteria Fisik</h2>
                <label for="skincolor">Warna Kulit:</label>
                <select id="skincolor" name="skincolor">
                  <option value="" selected disabled>-- Pilih Warna Kulit --</option>
                  <option value="Putih" >Putih</option>
                  <option value="Putih Kecoklatan" >Putih Kecoklatan</option>
                  <option value="Gelap" >Gelap</option>
                </select>
                <label for="haircolor">Warna Rambut:</label>
                <select id="haircolor" name="haircolor">
                  <option value="" selected disabled>-- Pilih Warna Rambut --</option>
                  <option value="Coklat" >Coklat</option>
                  <option value="Hitam" >Hitam</option>
                  <option value="Pirang" >Pirang</option>
                </select>
                <label for="minWeight">Berat Badan (minimal):</label>
                <input type="text" id="minWeight" placeholder="Masukkan berat badan minimal" name="minWeight" />
                <label for="maxWeight">Berat Badan (maksimal):</label>
                <input type="text" id="maxWeight" placeholder="Masukkan berat badan maksimal" name="maxWeight" />
                <label for="minHeight">Tinggi Badan (minimal):</label>
                <input type="text" id="minHeight" placeholder="Masukkan tinggi badan minimal" name="minHeight" />
                <label for="maxHeight">Tinggi Badan (maksimal):</label>
                <input type="text" id="maxHeight" placeholder="Masukkan tinggi badan maksimal" name="maxHeight" />
              </div>
        
              <div id="nonPhysicalSearch" class="search" style="display:none;">
                <h2>Kriteria Non-Fisik</h2>
                <label for="minAge">Umur (minimal):</label>
                <input type="text" id="minAge" name="minAge" value="0" />
                <label for="maxAge">Umur (maksimal):</label>
                <input type="text" id="maxAge" name="maxAge" value="100" />
                <label for="quran">Minimal Hafalan:</label>
                <input type="text" id="quran" name="minHafalan" value="0" />
                <label for="Education">Pendidikan:</label>
                    <select id="education" name="last_education">
                      <option value="">-- Pilih Pendidikan Terakhir --</option>
                      <option value="Sarjana">Sarjana</option>
                      <option value="Sekolah Menengah Atas">Sekolah Menengah Atas</option>
                      <option value="Sekolah Menengah Pertama">Sekolah Menengah Pertama</option>
                      <option value="Sekolah Dasar">Sekolah Dasar</option>
                    </select>
                <label for="location">Domisili:</label>
                <input type="text" id="location" name="place_date" />
                <label for="maritalStatus">Status:</label>
                    <select id="maritalStatus" name="married_status">
                      <option value="">-- Pilih Status --</option>
                      <option value="Belum menikah">Belum menikah</option>
                      <option value="Sudah menikah">Sudah menikah</option>
                      <option value="Cerai">Cerai</option>
                    </select>
              </div>
              <button id="button-search" type="submit">Search</button>
            </form>
          </div>
          <div class="container-result">
            <div id="results" class="card-container">
              @isset($results)
                @foreach($results as $result)
                <div class="card">
                  <div style="margin : 1rem">
                    <h2>{{ $result->fullname }}</h2>
                    @php
                        $birthdate = new DateTime($result->birth_date);
                        $today = new DateTime('today');
                        $age = $birthdate->diff($today)->y;
                    @endphp
                    <p>Umur: {{ $age }}</p>
                    <p>Tempat Lahir: {{ $result->place_date }}</p>
                    <p>Pendidikan: {{ $result->last_education }}</p>
                    <p>Hafalan: {{ $result->quran }}</p>
                    <p>Motto: {{ $result->motto }}</p>
                    <p>Alasan Taaruf: {{ $result->reason }}</p>
                  </div>
                </div>
                @endforeach
              @endisset
            </div>
            <div id="notFound" class="not-found" style="display: none;">Data Tidak Ditemukan</div>
          </div>
    </main>
    <x-footer></x-footer>
    <script>
      document.getElementById('searchType').addEventListener('change', function() {
            const physicalSearch = document.getElementById('physicalSearch');
            const nonPhysicalSearch = document.getElementById('nonPhysicalSearch');
            
            if (this.value === 'physical') {
                physicalSearch.style.display = 'block';
                nonPhysicalSearch.style.display = 'none';
            } else if (this.value === 'nonPhysical') {
                physicalSearch.style.display = 'none';
                nonPhysicalSearch.style.display = 'block';
            } else {
                physicalSearch.style.display = 'none';
                nonPhysicalSearch.style.display = 'none';
            }
        });
    </script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
</body>
</html>
