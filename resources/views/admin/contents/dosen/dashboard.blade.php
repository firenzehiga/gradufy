@extends('admin.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $mahasiswaCount }}</h3>
                            <p>Mahasiswa Bimbingan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="/dosen/mahasiswa" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $pengajuanCount }}</h3>

                            <p>Pengajuan Bimbingan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="/dosen/jadwalBimbingan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $riwayatCount }}</h3>

                            <p>Riwayat Bimbingan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clipboard"></i>
                        </div>
                        <a href="/dosen/riwayatBimbingan" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Detail Bimbingan</h5>
                </div>
                <div class="modal-body">
                    <p><strong>Nama:</strong> <span id="nama"></span></p>
                    <p><strong>NIM :</strong> <span id="nim"></span></p>
                    <p><strong>Deskripsi:</strong> <span id="deskripsiBimbingan"></span></p>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            // Data jadwal diambil dari PHP dan dikonversi ke JSON
            var events = @json($events);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                events: events, // Masukkan data jadwal ke FullCalendar
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                eventTimeFormat: { // Format waktu untuk event
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false // Gunakan format 24 jam
                },
                eventClick: function(info) {
                    var title = info.event.title;
                    var description = info.event.extendedProps.deskripsiBimbingan;
                    var mahasiswa = info.event.extendedProps.mahasiswa;
                    var nim = info.event.extendedProps.nim;

                    // Isi data ke modal
                    document.getElementById('deskripsiBimbingan').textContent = description;
                    document.getElementById('nim').textContent = nim;
                    document.getElementById('nama').textContent = mahasiswa;

                    // Tampilkan modal
                    var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                    eventModal.show();
                },

                timeZone: 'Asia/Jakarta'

            });

            calendar.render();
        });
    </script>
@endsection
