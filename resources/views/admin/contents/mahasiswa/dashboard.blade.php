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
    <style>


        .brutalist-card {
            width: 320px;
            border: 4px solid #002347;
            background-color: #fff;
            padding: 1.5rem;
            box-shadow: 10px 10px 0 #002347;
            font-family: "Arial", sans-serif;
            min-height: 365px;
        }

        .brutalist-card__header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            border-bottom: 2px solid #002347;
            padding-bottom: 1rem;
        }

        .brutalist-card__icon {
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #002347;
            padding: 0.5rem;
        }

        .brutalist-card__icon svg {
            height: 1.5rem;
            width: 1.5rem;
            fill: #fff;
        }

        .brutalist-card__alert {
            font-weight: 900;
            color: #002347;
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        .brutalist-card__message {
            margin-top: 1rem;
            color: #000;
            font-size: 0.9rem;
            line-height: 1.2;
            border-bottom: 2px solid #000;
            padding-bottom: 1rem;
            font-weight: 600;
        }

        .brutalist-card__actions {
            margin-top: 1rem;
        }

        .brutalist-card__button {
            display: block;
            width: 100%;
            padding: 0.75rem;
            text-align: center;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            border: 3px solid #002347;
            background-color: #fff;
            color: #002347;
            position: relative;
            transition: all 0.2s ease;
            box-shadow: 5px 5px 0 #002347;
            overflow: hidden;
            text-decoration: none;
        }

        .brutalist-card__button--read {
            background-color: #002347;
            color: #fff;
        }

        .brutalist-card__button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.3),
                    transparent);
            transition: all 0.6s;
        }

        .brutalist-card__button:hover::before {
            left: 100%;
        }

        .brutalist-card__button:hover {
            transform: translate(-2px, -2px);
            box-shadow: 7px 7px 0 #000;
        }

        .brutalist-card__button--mark:hover {
            background-color: #296fbb;
            border-color: #296fbb;
            color: #fff;
            box-shadow: 7px 7px 0 #004280;
        }

        .brutalist-card__button--read:hover {
            background-color: #ff0000;
            border-color: #ff0000;
            color: #fff;
            box-shadow: 7px 7px 0 #800000;
        }

        .brutalist-card__button:active {
            transform: translate(5px, 5px);
            box-shadow: none;
        }

        @media (max-width: 768px) {
            .brutalist-card {
            width: 320px;
            border: 4px solid #002347;
            background-color: #fff;
            padding: 1.5rem;
            box-shadow: 10px 10px 0 #002347;
            font-family: "Arial", sans-serif;
            min-height: 365px;
            margin-left: 17%;
        }
        
        }

        @media (max-width: 670px) {
            .brutalist-card {
            width: 320px;
            border: 4px solid #002347;
            background-color: #fff;
            padding: 1.5rem;
            box-shadow: 10px 10px 0 #002347;
            font-family: "Arial", sans-serif;
            min-height: 365px;
            margin-left: 7%;
        }
        
        }

        
    </style>
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white_header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg  ">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="{{ route('mahasiswa.dashboard')}}">
                        <img src="{{ asset('edustage') }}/img/logo1.png" style="width:50px; height:50px;"
                            alt="Logo gradufy" />
                    </a>
                    <h3 style=" font-size: 30px; font-weight: bold;">GRADUFY</h3>
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
                            <h2 class="mt-4 mb-5">
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
                <!-- Card Sesi Bimbingan -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="brutalist-card">
                        <div class="brutalist-card__header">
                            <div class="brutalist-card__icon">
                                <i class="fas fa-calendar-week fa-3x "></i>
                            </div>
                            <div class="brutalist-card__alert">Sesi Bimbingan Mendatang</div>
                        </div>
                        <div class="brutalist-card__message">
                            @if ($jadwalbmb)
                                <p>Tanggal: {{ $jadwalbmb->tanggal->isoFormat('dddd') }}
                                    {{ $jadwalbmb->tanggal->format('Y-m-d') }}</p>
                                <p>Jam: {{ $jadwalbmb->tanggal->format('H:i') }}</p>
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
                        <div class="brutalist-card__actions">
                            <a class="brutalist-card__button brutalist-card__button--mark"
                                href="/jadwalBimbingan">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Card Dosen Pembimbing -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="brutalist-card">
                        <div class="brutalist-card__header">
                            <div class="brutalist-card__icon">
                                <i class="fas fa-user-tie fa-3x"></i>
                            </div>
                            <div class="brutalist-card__alert">Informasi Dosen Pembimbing</div>
                        </div>
                        <div class="brutalist-card__message">
                            <div class="row">
                                <label for="" class="col-4 font-weight-bold">Nama</label>
                                <span>:</span>
                                <span class="col-6">{{ $dosenPembimbing->nama }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-4 font-weight-bold">NIP </label>
                                <span>:</span>

                                <span class="col-6">{{ $dosenPembimbing->nip }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-4 font-weight-bold">Email </label>
                                <span>:</span>
                                <span class="col-6">{{ $dosenPembimbing->email }}</span>
                            </div>
                            <div class="row">
                                <label for="" class="col-4 font-weight-bold">Telepon </label>
                                <span>:</span>
                                <span class="col-6">{{ $dosenPembimbing->telepon }}</span>
                            </div>

                        </div>
                        <div class="brutalist-card__actions">
                            <button class="brutalist-card__button brutalist-card__button--read" type="button">Relax Button</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--================ End Feature Area =================-->



    @include('admin.partials.footer')
