<!DOCTYPE html>
<html lang="en"> 
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../../assets/css/style.css" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<title>Chat</title>
	</head>
	<body id="page-chat">
		<x-navbar :profile="$profile"></x-navbar>
		<main id="page-konsultasi">
			<div class="header-chat">
				<div class="headerchat-container">
					<div class="header-left">
						<img src="../../assets/images/user.png" alt="group" />
						<h3 class="roomchat-name">Grup Taaruf</h3>
					</div>
				</div>
			</div>
			<div class="roomchat">
				<div class="bubblechat-container">
					<div class="bubble-chat user">
						<div class="foto">
							<img src="../../assets/images/user.png" alt="pp-user" />
						</div>
						<div class="text">
							<p>Assalamualaikum...</p>
						</div>
					</div>
					<div class="bubble-chat" id="calon">
						<div class="foto">
							<img src="../../assets/images/user.png" alt="pp-user" />
						</div>
						<div class="text">
							<p>Waalaikumsalam..</p>
						</div>
					</div>
					<div class="bubble-chat" id="ustadz">
						<div class="foto">
							<img src="../../assets/images/user.png" alt="pp-user" />
						</div>
						<div class="text">
							<p>Kaifa haluk?</p>
						</div>
					</div>
					<div class="bubble-chat user">
						<div class="foto">
							<img src="../../assets/images/user.png" alt="pp-user" />
						</div>
						<div class="text">
							<p>Alhamdulillah bikhoir</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-chat">
				<div class="inputbox">
					<input type="text" placeholder="Ketik pesan ..." />
					<div onclick="sendMessage()" class="icon-kirim">
						<svg width="32" height="32" viewBox="0 0 32 32">
							<path
								d="M4.53366 27.2001L27.8003 17.2268C28.0408 17.1243 28.2459 16.9534 28.3901 16.7353C28.5342 16.5172 28.6111 16.2615 28.6111 16.0001C28.6111 15.7387 28.5342 15.483 28.3901 15.2649C28.2459 15.0468 28.0408 14.8759 27.8003 14.7734L4.53366 4.80011C4.33219 4.71224 4.11202 4.67591 3.893 4.69439C3.67399 4.71287 3.46302 4.78558 3.27912 4.90597C3.09523 5.02636 2.9442 5.19064 2.83967 5.38398C2.73513 5.57733 2.68037 5.79365 2.68033 6.01345L2.66699 12.1601C2.66699 12.8268 3.16033 13.4001 3.82699 13.4801L22.667 16.0001L3.82699 18.5068C3.16033 18.6001 2.66699 19.1734 2.66699 19.8401L2.68033 25.9868C2.68033 26.9334 3.65366 27.5868 4.53366 27.2001Z"
								fill="#4B5C98" />
						</svg>
					</div>
				</div>
			</div>
		</main>
		<script type="text/javascript" src="../../assets/js/script.js"></script>
	</body>
</html>
