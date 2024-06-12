<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../../assets/css/style.css" />
	<link rel="icon" type="image/jpg" href="../../assets/images/halalin-icon.png">
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<title>Chat</title>
	<style>
		#approvalModal {
			position: fixed;
			top: 0;
			left: 0; 
			width: 100%;
			height: fit-content;
			padding: 2rem 0;
			z-index: 999;
			display: none;
			text-align: center;
			transition: 5s ease;
		}

		.modal-content {
			margin: 0 auto;
			background-color: #fff;
			padding: 1rem 2rem;
			border-radius: 0.5rem;
			width: 50%;
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
			transition: 5s ease;
		}
	</style>
</head>
<body id="page-chat">
    {{-- manggil navbar --}}
	<x-navbar :profile="$profile"></x-navbar>
	<!-- Modal -->
	<main id="page-konsultasi">
		<div class="konsultasi-chat">
			<div class="container-leftchat">
				<div class="sidebar">
					<h2>Daftar Chat</h2>
					<!-- Search Input -->
					<div class="chat-list" id="chat-list">
						@foreach($relations as $relation)
							<div class="chat-item">
								<img src="{{ $relation->profilCalon->gender == 'laki-laki' ? asset('assets/images/user.png') : asset('assets/images/userFemale.png') }}" alt="user{{ $relation->maleuser_id }}" />
								<div class="chat-info">
									<a href="{{ route('chat.show', $relation->hubungan_id) }}">
										<h4>{{ $relation->profilCalon->fullname }}</h4> <!-- Menggunakan data dari profiles -->
										<p>{{ $relation->start == 0 ? 'Menunggu Ustadz Memulai Percakapan' : 'Percakapan Sedang Berlangsung'  }}</p> <!-- Anda mungkin ingin menambahkan data pesan terakhir -->
									</a>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="container-rightchat">
				<div id="popup-overlay" class="popup-overlay"></div>
				<div id="konfirmasi-popup" class="popup">
					<div class="popup-content">
						<p>Anda ingin menerima taaruf ini?</p>
						<p onclick="displayProfile()" style="font-size: 12px !important; cursor: pointer; color: #554a92;">
							lihat profil
						</p>
						<button id="yes-btn" onclick="roomChat()">Ya</button>
						<button onclick="closePopup()" style="background-color: #a0a0a0">Tidak</button>
					</div>
				</div>
				<div class="header-chat">
					<div class="headerchat-container">
						<div class="header-right" id="notification">
							<div class="notify-box" id="boxnotif" style="opacity: 0; display:none">
								<div class="bg-notif">
									<div style="display: flex; flex-direction: row; column-gap: 6rem">
										<h2>Pemberitahuan</h2>
										<div class="fa fa-times" style="color: #4b5c98; cursor: pointer; padding: 0 0;"
										onclick="showNotif('boxnotif')"></div>
									</div>
									{{-- buat pemberitahuannya di ambil dari database request taarufs, jika
									user ini adalah responser, tampilkan notif "anda mendapatkan undangan dari {{ requester }}" --}}
									{{-- @dd($invitations) --}}
									@foreach ($invitations as $invitation)
										<div class="notify-item" onclick="showApprovalModal('{{ $invitation->id }}', '{{ $invitation->requester->profile->fullname }}')">
											<h4>Undangan Taaruf</h4>
											<p>Anda mendapatkan undangan taaruf dari {{ $invitation->requester->profile->fullname }}</p>
										</div>
										<div id="approvalModal" style="display: none;">
											<div class="modal-content">
												<h4>Undangan Taaruf</h4>
												<p><a href="{{ route('profile.show', ['username' => $invitation->requester->username]) }}">Lihat Profil</a></p>
												<p id="modalText"></p>
												<form id="approvalForm" method="POST" action="{{ route('request_taaruf.approve') }}">
													@csrf
													@method('PUT')
													<input type="hidden" name="request_taaruf_id" id="request_taaruf_id">
													<button class="button" type="submit">Setuju</button>
													<button class="button" type="button" onclick="closeApprovalModal()">Batal</button>
												</form>												
											</div>
										</div>
									@endforeach
									@foreach ($histories as $history)
										<div class="notify-item">
											<h4>
												@if($history->requester_id == $userId->id)
													Taaruf Disetujui
												@elseif($history->responser_id == $userId->id)
													Anda Menerima Taaruf
												@endif
											</h4>
											<p>Dengan {{ $history->fullname }}</p>
										</div>
									@endforeach

								</div>
							</div>
							<div class="icon-notif">
								<div class="fa fa-bell" style="color: #4b5c98; cursor: pointer; padding: 20rem 0"
									onclick="showNotif('boxnotif')"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="roomchat">
					<div class="roomchat-container">
						<div class="isi">
							<h3>Anda sedang tidak menjalani proses ta’aruf</h3>
							<p>Mulai cari pasangan dan mulai percakapan untuk mengenal calon pasangan lebih jauh</p>
							<p>(Percakapan ini akan didampingi oleh ustadz)</p>
						</div>
					</div>
				</div>
				<div class="footer-chat">
					<div class="inputbox">
						<input type="text" placeholder="Ketik pesan ..." />
						<svg viewBox="0 0 32 32">
							<path d="M4.53366 27.2001L27.8003 17.2268C28.0408 17.1243 28.2459 16.9534 28.3901 16.7353C28.5342 16.5172 28.6111 16.2615 28.6111 16.0001C28.6111 15.7387 28.5342 15.483 28.3901 15.2649C28.2459 15.0468 28.0408 14.8759 27.8003 14.7734L4.53366 4.80011C4.33219 4.71224 4.11202 4.67591 3.893 4.69439C3.67399 4.71287 3.46302 4.78558 3.27912 4.90597C3.09523 5.02636 2.9442 5.19064 2.83967 5.38398C2.73513 5.57733 2.68037 5.79365 2.68033 6.01345L2.66699 12.1601C2.66699 12.8268 3.16033 13.4001 3.82699 13.4801L22.667 16.0001L3.82699 18.5068C3.16033 18.6001 2.66699 19.1734 2.66699 19.8401L2.68033 25.9868C2.68033 26.9334 3.65366 27.5868 4.53366 27.2001Z"
								fill="#4B5C98" />
						</svg>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript" src="../../assets/js/script.js"></script>
	<script type="text/javascript" src="../../assets/js/search.js"></script>
	<script>
		function filterChats() {
			const input = document.getElementById('search-input');
			const filter = input.value.toLowerCase();
			const chatList = document.getElementById('chat-list');
			const chatItems = chatList.getElementsByClassName('chat-item');

			for (let i = 0; i < chatItems.length; i++) {
				const chatInfo = chatItems[i].getElementsByClassName('chat-info')[0];
				const chatName = chatInfo.getElementsByTagName('h4')[0];
				if (chatName.innerHTML.toLowerCase().indexOf(filter) > -1) {
					chatItems[i].style.display = "";
				} else {
					chatItems[i].style.display = "none";
				}
			}
		}
		function showApprovalModal(requestTaarufId, requesterFullname) {
			document.getElementById('modalText').innerText = `Apakah Anda ingin menerima taaruf dari  ${requesterFullname}?`;
			document.getElementById('request_taaruf_id').value = requestTaarufId;
			document.getElementById('approvalModal').style.display = 'block';
		}

		function closeApprovalModal() {
			document.getElementById('approvalModal').style.display = 'none';
		}
		document.addEventListener("DOMContentLoaded", function () {
    const chatItems = document.querySelectorAll('.chat-item');
    chatItems.forEach(item => {
        item.addEventListener('click', function() {
            updateRoomChat(this);
        });
    });
});

function updateRoomChat(chatItem) {
    const userName = chatItem.querySelector('.chat-info h4').textContent;
    const userStatus = chatItem.querySelector('.chat-info p').textContent;
    const roomChatContainer = document.querySelector('.roomchat-container .isi');
    roomChatContainer.innerHTML = `
        <h3>Chat dengan ${userName}</h3>
        <p>Status: ${userStatus}</p>
        <div class="bubblechat-container">
            <!-- Chat bubbles will be added here -->
        </div>
    `;
}
	</script>
</body>
</html>
