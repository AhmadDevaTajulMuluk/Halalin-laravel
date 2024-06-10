<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Pelatihan</title>
	<style>
		.complete {
			color: green;
		}
		.progress-bar {
            width: 100%;
            background-color: #cfd3ff;
            border-radius: 25px;
            overflow: hidden;
        }

        .progress-bar-inner {
            height: 20px;
            background-color: #4b53c9;
            width: 0;
            transition: width 0.5s;
        }
	</style>

</head>

<body id="pelatihan">
    {{-- manggil navbar --}}
    <x-navbar :profile="$profile"></x-navbar>
	@if(session('error'))
		<div class="error-message">{{ session('error') }}</div>
	@endif	
    <main id="main-pelatihan">
        <div id="page-pelatihan"></div>
        <div id="sidebar-pelatihan-container">
            <aside id="sidebar-pelatihan">
                <div>
                    <h2>Daftar Pelatihan</h2>
                    <div class="percentage">
                        <div class="percentage-container">
                            <div class="progress-bar">
                                <div class="progress-bar-inner" style="width: {{ $completionPercentage }}%;"></div>
                            </div>
                        </div>
                        <p class="percentage-text">{{ number_format($completionPercentage, 2) }}% selesai</p>
                    </div>
                    <div id="list-bab">
						@php
							$completion = $user->pelatihan_completion;
						@endphp
						@foreach ($pelatihans as $pelatihan)
							<div class="bab-container">
								<div>
									@php
										$isActive = Request::is('pelatihan/bab/' . $pelatihan->nomor_bab) ? 'active' : '';
										$isComplete = $completion >= $pelatihan->nomor_bab ? 'complete' : '';
									@endphp
									@if ($pelatihan->kategori == 'kuis')
										<a href="{{ route('pelatihan.show', $pelatihan->nomor_bab) }}" class="{{ $isActive }} {{ $isComplete }}">Kuis</a>
									@else
										<a href="{{ route('pelatihan.show', $pelatihan->nomor_bab) }}" class="{{ $isActive }} {{ $isComplete }}">Bab {{ $pelatihan->nomor_bab }}</a>
									@endif
								</div>
							</div>
						@endforeach
					</div>										
                </div>
            </aside>
            <div id="open-bab" onclick="openSidebar('sidebar-pelatihan-container', '-245px')"
                style="color: #4b5c98; background: linear-gradient(180deg, #f3e7ff 0%, #f8eff1 100%);">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
        </div>
        <div id="content-pelatihan">
			@if ($pelatihanIni->nomor_bab == 1)
				<x-bab1></x-bab1>
			@elseif ($pelatihanIni->nomor_bab == 2)
				<x-bab2></x-bab2>
			@elseif ($pelatihanIni->nomor_bab == 3)
				<x-bab3></x-bab3>
			@endif
		</div>		
    </main>
    <footer id="pelatihan-footer">
		<div id="before" class="bab-choice fledir-row">
			<div class="fa fa-chevron-left"></div>
			@if ($prevBab)
				<a href="{{ route('pelatihan.show', $prevBab->nomor_bab) }}" style="font-weight: 600;">Bab {{ $prevBab->nomor_bab }}</a>
			@else
				<span style="font-weight: 600;">No Previous</span>
			@endif
		</div>
		<div class="bab-title fledir-row">
			<h2 style="font-weight: 700;">Bab {{ $pelatihanIni->nomor_bab }}</h2>
		</div>
		<div id="after" class="bab-choice fledir-row">
			@if ($nextBab)
				<a href="{{ route('pelatihan.show', $nextBab->nomor_bab) }}" style="font-weight: 600;" onclick="markAsComplete({{ $pelatihanIni->nomor_bab }})">Bab {{ $nextBab->nomor_bab }}</a>
			@else
				<span style="font-weight: 600;">No Next</span>
			@endif
			<div class="fa fa-chevron-right"></div>
		</div>
	</footer>		
</body>
<script type="text/javascript" src="../../assets/js/script.js"></script>

</html>
