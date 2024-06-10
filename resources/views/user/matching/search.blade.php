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
    {{-- @dd($results) --}}
    <x-navbar :profile="$profile"></x-navbar>
    <main>
        <div class="container-search">
            <h1 id="h1-search">Mencari Kriteria Pasangan</h1>
            <form action="{{ route('search.partner') }}" method="POST">
                @csrf
                <label for="searchType">Pilih Tipe Pencarian:</label>
                <select id="searchType" name="searchType">
                    <option value="" {{ old('searchType') == '' ? 'selected' : '' }}>-- Pilih Tipe Pencarian --
                    </option>
                    <option value="physical" {{ old('searchType') == 'physical' ? 'selected' : '' }}>Fisik</option>
                    <option value="nonPhysical" {{ old('searchType') == 'nonPhysical' ? 'selected' : '' }}>Non-Fisik
                    </option>
                </select>

                <div id="physicalSearch" class="search" style="display: none;">
                    <h2>Kriteria Fisik</h2>
                    <label for="skincolor">Warna Kulit:</label>
                    <select id="skincolor" name="skincolor">
                        <option value="" {{ old('skincolor') == '' ? 'selected' : '' }} disabled>-- Pilih Warna
                            Kulit --</option>
                        <option value="Putih" {{ old('skincolor') == 'Putih' ? 'selected' : '' }}>Putih</option>
                        <option value="Putih Kemerahan" {{ old('skincolor') == 'Putih Kemerahan' ? 'selected' : '' }}>
                            Putih Kemerahan</option>
                        <option value="Putih Kecoklatan" {{ old('skincolor') == 'Putih Kecoklatan' ? 'selected' : '' }}>
                            Putih Kecoklatan</option>
                        <option value="Coklat Sawo Matang"
                            {{ old('skincolor') == 'Coklat Sawo Matang' ? 'selected' : '' }}>Coklat Sawo Matang</option>
                        <option value="Coklat Kehitaman" {{ old('skincolor') == 'Coklat Kehitaman' ? 'selected' : '' }}>
                            Coklat Kehitaman</option>
                        <option value="Gelap" {{ old('skincolor') == 'Gelap' ? 'selected' : '' }}>Gelap</option>
                    </select>
                    <label for="haircolor">Warna Rambut:</label>
                    <select id="haircolor" name="haircolor">
                        <option value="" {{ old('haircolor') == '' ? 'selected' : '' }} disabled>-- Pilih Warna
                            Rambut --</option>
                        <option value="Coklat" {{ old('haircolor') == 'Coklat' ? 'selected' : '' }}>Coklat</option>
                        <option value="Hitam" {{ old('haircolor') == 'Hitam' ? 'selected' : '' }}>Hitam</option>
                        <option value="Pirang" {{ old('haircolor') == 'Pirang' ? 'selected' : '' }}>Pirang</option>
                    </select>
                    <label for="minWeight">Berat Badan (minimal):</label>
                    <input type="text" id="minWeight" placeholder="Masukkan berat badan minimal" name="minWeight"
                        value="{{ old('minWeight') }}" />
                    <label for="maxWeight">Berat Badan (maksimal):</label>
                    <input type="text" id="maxWeight" placeholder="Masukkan berat badan maksimal" name="maxWeight"
                        value="{{ old('maxWeight') }}" />
                    <label for="minHeight">Tinggi Badan (minimal):</label>
                    <input type="text" id="minHeight" placeholder="Masukkan tinggi badan minimal" name="minHeight"
                        value="{{ old('minHeight') }}" />
                    <label for="maxHeight">Tinggi Badan (maksimal):</label>
                    <input type="text" id="maxHeight" placeholder="Masukkan tinggi badan maksimal" name="maxHeight"
                        value="{{ old('maxHeight') }}" />
                </div>

                <div id="nonPhysicalSearch" class="search" style="display:none;">
                    <h2>Kriteria Non-Fisik</h2>
                    <label for="minAge">Umur (minimal):</label>
                    <input type="text" id="minAge" placeholder="Masukkan umur minimal" name="minAge"
                        value="{{ old('minAge') }}" />
                    <label for="maxAge">Umur (maksimal):</label>
                    <input type="text" id="maxAge" placeholder="Masukkan umur maksimal" name="maxAge"
                        value="{{ old('maxAge') }}" />
                    <label for="quran">Minimal Hafalan:</label>
                    <input type="text" id="quran" placeholder="Masukkan minimal hafalan" name="minHafalan"
                        value="{{ old('minHafalan') }}" />
                    <label for="Education">Pendidikan:</label>
                    <select id="education" name="last_education">
                        <option value="" {{ old('last_education') == '' ? 'selected' : '' }} disabled>-- Pilih
                            Pendidikan Terakhir --</option>
                        <option value="Sarjana" {{ old('last_education') == 'Sarjana' ? 'selected' : '' }}>Sarjana
                        </option>
                        <option value="Sekolah Menengah Atas"
                            {{ old('last_education') == 'Sekolah Menengah Atas' ? 'selected' : '' }}>Sekolah Menengah
                            Atas</option>
                        <option value="Sekolah Menengah Pertama"
                            {{ old('last_education') == 'Sekolah Menengah Pertama' ? 'selected' : '' }}>Sekolah
                            Menengah Pertama</option>
                        <option value="Sekolah Dasar" {{ old('last_education') == 'Sekolah Dasar' ? 'selected' : '' }}>
                            Sekolah Dasar</option>
                    </select>
                    <label for="location">Domisili:</label>
                    <input type="text" id="location" placeholder="Masukkan domisili" name="place_date"
                        value="{{ old('place_date') }}" />
                    <label for="maritalStatus">Status:</label>
                    <select id="maritalStatus" name="married_status">
                        <option value="" {{ old('married_status') == '' ? 'selected' : '' }} disabled>-- Pilih
                            Status --</option>
                        <option value="Belum menikah"
                            {{ old('married_status') == 'Belum menikah' ? 'selected' : '' }}>Belum menikah</option>
                        <option value="Sudah menikah"
                            {{ old('married_status') == 'Sudah menikah' ? 'selected' : '' }}>Sudah menikah</option>
                        <option value="Cerai" {{ old('married_status') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                    </select>
                </div>
                <button id="button-search" type="submit">Search</button>
            </form>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center">
            <h2 style="margin: 2rem 0 0 0">Hasil Pencarian</h2>
            <p style="margin: 1rem 0 0 0">Tekan item untuk melihat selengkapnya.</p>
            <div class="container-result">
                <div id="results" class="card-container">
                    @php
                        $isSearch = request()->is('search');
                        $isSearchPartner = request()->is('search/partner');
                    @endphp

                    {{-- Menampilkan semua data --}}
                    {{-- request /search --}}
                    @if ($isSearch && empty($results))
                        @if (empty($users[0]))
                            <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                Data Tidak Ditemukan
                            </div>
                        @endif
                        <div style="display: flex; flex-direction: column; align-items: center">
                            <div style="display: flex; flex-wrap: wrap; justify-content: center">
                                @foreach ($users as $user)
                                    <div class="card">
                                        <a href="{{ route('profile.show', ['username' => $user->username]) }}"
                                            style="text-decoration: none; color: inherit;">
                                            <div style="margin : 1rem">                                            
                                                <div class="card-img">
                                            </div>
                                                <h2>{{ $user->username }}</h2>
                                                @php
                                                    $birthdate = new DateTime($user->birth_date);
                                                    $today = new DateTime('today');
                                                    $age = $birthdate->diff($today)->y;
                                                @endphp
                                                <hr>
                                                <p><b>Umur:</b> {{ $age }}</p>
                                                <p><b>Tempat Lahir:</b> {{ $user->place_date }}</p>
                                                <p><b>Pendidikan:</b> {{ $user->last_education }}</p>
                                                <p><b>Hafalan:</b> {{ $user->quran }}</p>
                                                <p><b>Motto:</b> {{ $user->motto }}</p>
                                                <p><b>Alasan Taaruf:</b> {{ $user->reason }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination-links">
                                {{ $users->links() }}
                            </div>
                        </div>
                    @endif

                    {{-- request /search/partner --}}
                    @if ($isSearchPartner && isset($results))
                        @if (empty($results[0]))
                            <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                Data Tidak Ditemukan
                            </div>
                        @endif
                        @foreach ($results as $result)
                            <div class="card">
                                <a href="{{ route('profile.show', ['username' => $result->username]) }}"
                                    style="text-decoration: none; color: inherit;">
                                    <div style="margin : 1rem">
                                        <h2>{{ $result->username }}</h2>
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
                                </a>
                            </div>
                        @endforeach
                        <div id="navigator">
                            {{ $results->links() }}
                        </div>
                        @if (empty($results))
                            <div style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                Data Tidak Ditemukan
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
    <script>
        document.getElementById('searchType').addEventListener('change', function() {
            var physicalSearch = document.getElementById('physicalSearch');
            var nonPhysicalSearch = document.getElementById('nonPhysicalSearch');

            // Hapus atribut required dari semua input field
            var requiredFields = document.querySelectorAll('.search input, .search select');
            requiredFields.forEach(function(field) {
                field.removeAttribute('required');
            });
            if (this.value === 'physical') {
                physicalSearch.style.display = 'block';
                nonPhysicalSearch.style.display = 'none';

                // Tambahkan atribut required ke field fisik
                var physicalFields = physicalSearch.querySelectorAll('input, select');
                physicalFields.forEach(function(field) {
                    field.setAttribute('required', 'required');
                });
            } else if (this.value === 'nonPhysical') {
                physicalSearch.style.display = 'none';
                nonPhysicalSearch.style.display = 'block';

                // Tambahkan atribut required ke field non-fisik
                var nonPhysicalFields = nonPhysicalSearch.querySelectorAll('input, select');
                nonPhysicalFields.forEach(function(field) {
                    field.setAttribute('required', 'required');
                });
            } else {
                physicalSearch.style.display = 'none';
                nonPhysicalSearch.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            var searchType = document.getElementById('searchType');
            var physicalSearch = document.getElementById('physicalSearch');
            var nonPhysicalSearch = document.getElementById('nonPhysicalSearch');

            function toggleSearchFields() {
                if (searchType.value === 'physical') {
                    physicalSearch.style.display = 'block';
                    nonPhysicalSearch.style.display = 'none';
                } else if (searchType.value === 'nonPhysical') {
                    physicalSearch.style.display = 'none';
                    nonPhysicalSearch.style.display = 'block';
                } else {
                    physicalSearch.style.display = 'none';
                    nonPhysicalSearch.style.display = 'none';
                }
            }

            searchType.addEventListener('change', toggleSearchFields);

            // Call the function once to set the correct state based on old input
            toggleSearchFields();
        });
    </script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
</body>

</html>
