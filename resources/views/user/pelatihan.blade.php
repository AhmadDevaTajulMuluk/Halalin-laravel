<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../../assets/css/style.css" />
		<link rel="icon" type="image/jpg" href="../../assets/images/halalin-logo.png">
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
		<title>Pelatihan</title>
	</head>
	<body id="pelatihan">

        {{-- manggil navbar --}}
		<x-navbar></x-navbar>
		<main id="main-pelatihan">
			<div id="page-pelatihan"></div>
			<div id="sidebar-pelatihan-container">
				<aside id="sidebar-pelatihan">
					<div>
						<h2>Daftar Pelatihan</h2>
					</div>
					<div class="percentage">
						<div class="percentage-container">
							<hr class="percentage-line-second" />
							<hr class="percentage-line-first" />
						</div>
						<p class="percentage-text">0% selesai</p>
					</div>
					<div id="list-bab">
						<div class="bab-container">
							<div class="bab-dropdown" onclick="babDropdown('bab-1', 'dropdown-bab-1')">
								<div id="dropdown-bab-1" class="fa fa-chevron-down"></div>
								<h2>Bab 1</h2>
							</div>
							<ul id="bab-1" class="sub-bab-container">
								<li id="sub-bab-1" onclick="goToPage(0)">Sub bab 1</li>
								<li id="sub-bab-2" onclick="goToPage(1)">Sub bab 2</li>
							</ul>
						</div>
				</aside>
				<div
					id="open-bab"
					onclick="openSidebar('sidebar-pelatihan-container', '-245px')"
					style="color: #4b5c98; background: linear-gradient(180deg, #f3e7ff 0%, #f8eff1 100%);">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
			</div>
			<div id="content-pelatihan"></div>
		</main>
		<footer id="pelatihan-footer">
			<div id="before" class="bab-choice fledir-row" onclick="prevPage()">
				<div class="fa fa-chevron-left"></div>
				<h4 style="font-weight: 600;">Sub Bab 1</h4>
			</div>
			<div class="bab-title fledir-row">
				<h2 style="font-weight: 700;">Bab 1</h2>
			</div>
			<div id="after" class="bab-choice fledir-row" onclick="nextPage()">
				<h4 style="font-weight: 600;" >Sub bab 2</h4>
				<div class="fa fa-chevron-right"></div>
			</div>
		</footer>
		<script>
			fetchAPI();
			var current_page = 0;
			var page_before;
			var changePage = false;
			function nextPage() {
				page_before = current_page;
				current_page += 1;
				if (current_page > 1) {
					return;
				}
				changePage = true;
				fetchAPI();
			}

			function prevPage() {
				page_before = current_page;
				current_page -= 1;
				if (current_page < 0) {
					return;
				}
				fetchAPI();
			}
			function goToPage(pageNumber) {
				if (pageNumber == current_page) {
					return;
				}
				page_before = current_page;
				current_page = pageNumber;
				if (current_page > page_before) {
					changePage = true;
				}
				fetchAPI();
			}
			// Memuat file JSON menggunakan Fetch API
			function fetchAPI() {
				fetch("../essentials/data-pelatihan.json")
					.then((response) => response.json())
					.then((data) => {
						if (current_page == 0) {
							console.log("anjay");
							document.getElementById("before").classList.add("hide-item");
							document.getElementById("after").classList.remove("hide-item");
						} else if (current_page == data.materi.bab1.length - 1) {
							document.getElementById("before").classList.remove("hide-item");
							document.getElementById("after").classList.add("hide-item");
						}
						if (changePage) {
							data.materi.bab1[page_before].status = "Selesai";
							console.log(page_before);
							console.log(data.materi.bab1[page_before].status);
							changePage = false;
						}
						var countSelesai = 0;
						for (var i = 0; i < data.materi.bab1.length; i++) {
							if (data.materi.bab1[i].status == "Selesai") {
								var JudulBabSelesai = "sub-bab-" + data.materi.bab1[i].sub_bab;
								document.getElementById(JudulBabSelesai).classList.add("list-done");
								countSelesai++;
								console.log("anjay");
							}
						}
						console.log(countSelesai);
						countSelesai = (countSelesai / data.materi.bab1.length) * 100;
						document.getElementsByClassName("percentage-text")[0].innerHTML =
							countSelesai + "% selesai";
						document.querySelector(".percentage-line-second").style.width = countSelesai + "%";
						document.querySelector(".percentage-line-first").style.width = 100 - countSelesai + "%";
						var judulFile = "../essentials/" + data.materi.bab1[current_page].file_html;
						fetch(judulFile)
							.then((response) => response.text())
							.then((data) => {
								document.getElementById("content-pelatihan").innerHTML = data;
							})
							.catch((error) => console.error("Ada kesalahan:", error));
					})
					.catch((error) => console.error("Error loading JSON:", error));
			}
		</script>
	</body>
	<script type="text/javascript" src="../../assets/js/script.js"></script>
</html>
