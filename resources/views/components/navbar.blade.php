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
                    <a id="artikel-navbar" href="/artikel" class="{{ Request::is('artikel') ? 'active' : '' }}">Artikel</a>
                    <a id="pelatihan-navbar" href="/pelatihan" class="{{ Request::is('pelatihan') ? 'active' : '' }}">Pelatihan</a>
                    <a id="chat-navbar" href="/chat" class="{{ Request::is('chat') ? 'active' : '' }}">Chat</a>
                </nav>
                <a
                href="/biodata"
                title="Lihat Profil"
                class="user-container"
              >
                <div class="user-image">
                  <img
                    src="../../assets/images/user.png"
                    alt="user"
                    style="border-radius: 50%"
                  />
                </div>
                <div class="user-name-container">
                  <p class="profile-name">Muhammad Fikri</p>
                  <p>Lihat Profil</p>
                </div>
              </a>
            </div>
        </div>
    </div>
</header>