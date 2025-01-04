@extends('admin.main')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Riwayat Bimbingan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Riwayat Bimbingan</li>
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
                                <h3 class="card-title">Tabel Data Riwayat Bimbingan</h3>
                                {{-- <a href="{{ route('admin.contents.mahasiswa.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus fa-sm"></i></a> --}}
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Tanggal Bimbingan</th>
                                            <th>Feedback</th>
                                            <th>Tenggat Waktu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayatbmb as $rwt)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rwt->mahasiswa->nama }}</td>
                                                <td>{{ $rwt->mahasiswa->nim }}</td>
                                                <td>{{ $rwt->tanggal->isoFormat('dddd, D MMMM Y, H:mm') }}</td>
                                                <td>{{ $rwt->umpanBalik }}</td>
                                                <td>{{ $rwt->tenggat_waktu->isoFormat('dddd, D MMMM Y, H:mm') }}</td>
                                            </tr>
                                        @endforeach
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
