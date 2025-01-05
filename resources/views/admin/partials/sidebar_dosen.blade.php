<!--================ Main Sidebar Area =================-->
<aside class="main-sidebar sidebar-white-primary elevation-5" style="background-color: white">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Login') }}/images/logo1.png" class="img-circle" alt="graufy logo">
            </div>
            <div class="info">
                <a href="{{ route('dosen.dashboard') }}" class="d-block">GRADUFY</a>
            </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('dosen.dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dosen.jadwalBimbingan') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Jadwal Bimbingan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('dosen.mahasiswa') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Mahasiswa</p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
            <li class="nav-item">
                <a href="{{ route('dosen.riwayatBimbingan') }}" class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                    <p>Riwayat Bimbingan</p>
                </a>
            </li>
        </ul>

        </nav>
    </div>
</aside>
<!--================ End Main Sidebar Area =================-->