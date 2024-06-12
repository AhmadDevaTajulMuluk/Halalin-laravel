@props(['profile'])
<style>
    .active{
        color: #4b5c98;
	    font-weight: 700;
    }
</style>

<header class="header-effect">
    <div id="header-container">
        <div id="logo-container">
            <img src="{{ asset('assets/images/halalin-logo.png') }}" alt="Halalin" width="150px" />
        </div>
        <div id="responsive-dropdown-container">
            <div onclick="toggleDropdown()" id="responsive-dropdown">
                <img src="{{ asset('assets/images/dropdown.png') }}" alt="" width="25px" height="25px" />
            </div>
        </div>
        <div id="nav-container">
            <p class="close-nav" onclick="toggleDropdown()">x</p>
            <div class="navbar-items">
                <nav>
                    <a id="beranda-navbar" href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Beranda</a>
                    <a id="artikel-navbar" href="/artikel" class="{{ Request::segment(1) == 'artikel' ? 'active' : '' }}">Artikel</a>
                    <a id="pelatihan-navbar" href="/pelatihan/bab/1" class="{{ Request::segment(1) == 'pelatihan' ? 'active' : '' }}">Pelatihan</a>
                    <a id="chat-navbar" href="/chat" class="{{ Request::segment(1) == 'chat' ? 'active' : '' }}">Chat</a>
                </nav>
                <a href="#" onclick="toggleProfilePopup()" title="Lihat Profil" class="user-container">
                  <div class="user-image">
                      <img src="{{ $profile && $profile->image ? asset('image/' . $profile->image) : '/assets/images/defaultpic.png' }}" alt="user" />
                  </div>
                  <div class="user-name-container">
                    @if($profile && $profile->fullname)
                        <p class="profile-fullname">{{ $profile->fullname }}</p>
                    @endif  
                    <p>Lihat Profil</p>
                  </div>
              </a>
            </div>
        </div>
    </div>
</header>

    <!-- Modal Popup -->
    <div id="profile-popup" class="profile-popup">
      <div class="profile-popup-content">
          <span class="close" onclick="toggleProfilePopup()">&times;</span>
          @if ($profile && $profile->fullname)
            <p style="padding-top: 0; margin-top: 0; font-weight: 800">{{ $profile->fullname }}</p>
          @endif
          <hr>
          <a href="/biodata">Lihat Profil</a>
          <a href="/logout">Logout</a>
      </div>
  </div>

<style>
/* Styling untuk elemen yang sudah ada */
.active {
    color: #4b5c98;
    font-weight: 700;
}

.profile-popup {
    display: none; 
    position: fixed;
    top: 10%;
    right: 2%;
    z-index: 1000;
    overflow: auto; 
}

.profile-popup-content {
    background-color: #fefefe;
    font-weight: 700;
    width: 200px;
    height: auto;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    margin-left: 1rem;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

.profile-popup-content a {
    display: block;
    margin: 10px 0;
    text-decoration: none;
    color: #333;
}

.profile-popup-content a:hover {
    color: #4b5c98;
}
</style>

<script>
  function toggleDropdown() {
      var nav = document.getElementById('nav-container');
      nav.style.display = (nav.style.display === "block") ? "none" : "block";
  }

  function toggleProfilePopup() {
      var popup = document.getElementById("profile-popup");
      popup.style.display = (popup.style.display === "block") ? "none" : "block";
  }

  window.onclick = function(event) {
      var popup = document.getElementById("profile-popup");
      if (event.target == popup) {
          popup.style.display = "none";
      }
  }
</script>