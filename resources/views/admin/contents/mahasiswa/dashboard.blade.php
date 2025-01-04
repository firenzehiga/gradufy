<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('edustage') }}/img/favicon.ico" type="ico" />
    <title>Gradufy | Sistem Reminder</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/flaticon.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/sweetalert2.min.css">
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white_header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.html">
                        <img src="{{ asset('edustage') }}/img/logo1.png" style="width:50px; height:50px;"
                            alt="Logo gradufy" />
                        </a>
                        <h3 style="font-size: 30px; font-weight: bold;">GRADUFY</h3>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item @if (Request::is('dashboard')) active @endif">
                                <a class="nav-link" href="/z/dashboard">Home</a>
                            </li>

                            <li class="nav-item @if (Request::is('jadwalBimbingan')) active @endif">
                                <a class="nav-link" href="/jadwalBimbingan">Jadwal Bimbingan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/riwayatBimbingan">Riwayat Bimbingan</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Profiles</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/profile/edit">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" onclick="logout()">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Menu Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content text-center">
                            <p class="text-uppercase">
                                Ayo segera bimbingan! ajukan jadwal melalui gradufy
                            </p>
                            <h2 class="text-uppercase mt-4 mb-5">
                                Selamat Datang! {{ $mahasiswa->nama }}
                            </h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Bimbingan Kamu</h2>
                        <p>
                            Informasi seputar jadwal bimbingan
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single_feature card bg-info">
                        <div class="icon"><i class="fas fa-calendar-week fa-3x icon-black"></i></div>
                        <!-- Ganti dengan ikon Font Awesome -->
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Sesi Bimbingan Mendatang</h4>
                            @if ($jadwalbmb && $jadwalbmb->tanggal->isToday())

                                <p>Tanggal: {{ $jadwalbmb->tanggal->isoFormat('dddd') }}
                                    {{ $jadwalbmb->tanggal->format('Y-m-d') }}</p>{{-- Mengambi Hari dan tanggal saja --}}
                                <p>Jam: {{ $jadwalbmb->tanggal->format('H:i') }}</p> {{-- Mengambi Jamnya saja --}}

                                <p>
                                    Status:
                                    @if ($jadwalbmb->status === 'Menunggu Disetujui')
                                        <span class="badge badge-warning">Menunggu Disetujui</span>
                                    @elseif ($jadwalbmb->status === 'Disetujui')
                                        <span class="badge badge-success">Disetujui</span>
                                    @elseif ($jadwalbmb->status === 'Jadwal Direvisi')
                                        <span class="badge badge-info">Jadwal Direvisi</span>
                                    @elseif ($jadwalbmb->status === 'Sedang Bimbingan')
                                        <span class="badge badge-warning">Sedang Bimbingan</span>
                                    @elseif ($jadwalbmb->status === 'Bimbingan Selesai')
                                        <span class="badge badge-primary">Bimbingan Selesai</span>
                                    @else
                                        <span class="badge badge-danger">Kesalahan Status</span>
                                    @endif
                                </p>
                            @else
                                <p>Belum ada pengajuan bimbingan.</p>
                            @endif
                        </div>
                        <a href="/jadwalBimbingan" class="">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single_feature card bg-info">
                        <div class="icon">
                            <i class="fas fa-user-tie fa-3x icon-black"></i>
                        </div>
                        <div class="desc">
                            <h4 class="mt-3 mb-2">Dosen Pembimbing</h4>
                            <div class="row">
                                <label for="" class="col-sm-4 ">Nama :</label>
                                <span>{{ $dosenPembimbing->nama }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-sm-4 ">NIP :</label>
                                <span>{{ $dosenPembimbing->nip }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-sm-4 ">Email :</label>
                                <span>{{ $dosenPembimbing->email }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-sm-4 ">Telepon :</label>
                                <span>{{ $dosenPembimbing->telepon }}</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--================ End Feature Area =================-->



    @include('admin.partials.footer')
