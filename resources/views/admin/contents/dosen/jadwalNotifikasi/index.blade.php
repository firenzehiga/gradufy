<?php
$today = strtotime((date('Y-m-d')))
?>
@extends('admin.main')
@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manual Reminder Jadwal Bimbingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jadwal Notifikasi</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="{{ route('dosen.jadwalNotifikasi.kirimReminder') }}" class="btn btn-success">Kirim Reminder <i class="fas fa-paper-plane"></i></a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>NIM</th>
                      <th>Tanggal Pengajuan Bimbingan</th>
                      <th>Waktu</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no  = 0;
                      foreach ($jadwalnoti as $jwb) {
                      $no++;
                        
                      $selisihTanggal = strtotime($jwb->tanggal->isoFormat('dddd, D MMMM Y')) - $today;
                      $selisiHari = $selisihTanggal / 86400;
                      ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $jwb->mahasiswa->nama }}</td>
                        <td>{{ $jwb->mahasiswa->nim }}</td>
                        <td>{{ $jwb->tanggal->isoFormat('dddd, D MMMM Y') }}</td>

                        @if($selisiHari == 0)
                            <td><span class="badge badge-danger">Hari ini</span></td>
       
                        @elseif($selisiHari == 1)
                          <td><span class="badge badge-warning">Besok</span></td>

                        @else
                          <td><span class="badge badge-primary">{{ $selisiHari }} Hari lagi</span></td>
                        @endif
                    </tr>
                    <?php
                  }
                    ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
