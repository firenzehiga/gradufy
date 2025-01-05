<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('edustage') }}/img/favicon.ico" type="ico" />
    <title>Gradufy | Sistem Reminder</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/flaticon.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/themify-icons.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="{{ asset('edustage') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/sweetalert2.min.css"> 
</head>

<body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area white-header">
        <div class="main_menu">
          <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html" style="margin-left: 4%">
                    <img src="{{ asset('edustage') }}/img/logo1.png" style="width:50px; height:50px;" alt="Logo Gradufy"/> 
                </a>
                <h3 style="font-size: 30px; font-weight: bold; color: #fff">GRADUFY</h3>
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
                                <a class="nav-link" href="/dashboard">Home</a>
                            </li>
        
                            <li class="nav-item @if (Request::is('jadwalBimbingan')) active @endif">
                                <a class="nav-link" href="/jadwalBimbingan">Jadwal Bimbingan</a>
                            </li>
                            <li class="nav-item @if (Request::is('riwayatBimbingan')) active @endif">
                              <a class="nav-link" href="/riwayatBimbingan">Riwayat Bimbingan</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a
                                  href="#"
                                  class="nav-link dropdown-toggle"
                                  data-toggle="dropdown"
                                  role="button"
                                  aria-haspopup="true"
                                  aria-expanded="false"
                                  >Profiles</a
                                >
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
    