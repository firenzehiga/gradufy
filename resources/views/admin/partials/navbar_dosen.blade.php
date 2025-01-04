    <!--================ Navbar Area =================-->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto d-flex align-items-center"> <!-- Flexbox untuk vertikal align -->
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Display User Role and Name -->
        <li class="nav-item">
            @if (Auth::check()) <!-- Pastikan pengguna sudah login -->
                <span class="navbar-text">
                    Welcome, Pak {{ $dosen->nama }}
                    @if (Auth::user()->role === 'dosen')
                    @else
                        - Role unknown
                    @endif
                </span>
            @else
                <span class="navbar-text">Please log in.</span>
            @endif
        </li>

        <!-- User Profile Icon -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <!-- Ikon Profil Pengguna -->
                <i class="fas fa-user-circle" style="font-size: 25px;"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('profile.dosen.edit') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('dosen.jadwalNotifikasi') }}" class="dropdown-item">
                    <i class="fas fa-bell mr-2"></i> Notifikasi Mahasiswa
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" onclick="logout()" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <!-- Form Logout yang tersembunyi -->
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

    </ul>
</nav>
<!--================ End Navbar Area =================-->
