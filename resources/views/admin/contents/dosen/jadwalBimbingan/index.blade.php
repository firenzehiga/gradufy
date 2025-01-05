@extends('admin.main')

@section('content')
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Jadwal Bimbingan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jadwal Bimbingan</li>
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
                                <h3 class="card-title">Tabel Data Jadwal Bimbingan</h3>
                                {{-- <a href="{{ route('admin.contents.mahasiswa.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus fa-sm"></i></a> --}}
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table  table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Tanggal Pengajuan Bimbingan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwalbmb as $jwb)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $jwb->mahasiswa->nama }}</td>
                                                <td>{{ $jwb->mahasiswa->nim }}</td>
                                                <td>{{ $jwb->tanggal->isoFormat('dddd, D MMMM Y') }}</td>

                                                @if ($jwb->status === 'Menunggu Disetujui')
                                                    <td><span class="badge badge-warning">Menunggu Disetujui</span></td>
                                                @elseif ($jwb->status === 'Disetujui')
                                                    <td><span class="badge badge-success">Disetujui</span></td>
                                                @elseif ($jwb->status === 'Jadwal Direvisi')
                                                    <td><span class="badge badge-info">Jadwal Direvisi</span></td>
                                                @elseif ($jwb->status === 'Sedang Bimbingan')
                                                    <td><span class="badge badge-warning">Sedang Bimbingan</span></td>
                                                @elseif ($jwb->status === 'Bimbingan Selesai')
                                                    <td><span class="badge badge-primary">Bimbingan Selesai</span></td>
                                                @else
                                                    <td><span class="badge badge-danger">Kesalahan Status</span></td>
                                                @endif

                                                <td class="d-flex">
                                                    <a href="/dosen/jadwalBimbingan/detail/{{ $jwb->id }}"
                                                        class="btn btn-primary me-2"><i class="fas fa-info-circle"></i></a>

                                                    @if ($jwb->status === 'Menunggu Disetujui' or $jwb->status === 'Jadwal Direvisi')
                                                        <form action="{{ route('dosen.jadwalBimbingan.accept', $jwb->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button class="btn btn-success ml-2" type="submit"
                                                                onclick=""><i class="fas fa-check"></i></button>
                                                        </form>
                                                    @elseif ($jwb->status === 'Sedang Bimbingan')
                                                        <button class="btn btn-info ml-2"
                                                            onclick="openFeedbackModal({{ $jwb->id }})">
                                                            Feedback
                                                        </button>
                                                    @endif
                                                </td>
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

    <!-- Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dosen.jadwalBimbingan.feedback') }}" method="POST">
                    @csrf
                    <input type="hidden" name="jadwal_id" id="jadwal_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="feedbackModalLabel">Berikan Feedback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="umpanBalik">Deskripsi Umpan Balik</label>
                            <textarea name="umpanBalik" id="umpanBalik" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tenggatWaktu">Tanggal Tenggat Waktu</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" name="tenggatWaktu"
                                    id="tenggatWaktu" data-target="#reservationdatetime" required />

                                <div class="input-group-append" data-target="#reservationdatetime"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script untuk membuka modal umpan balik --}}
    <script>
        function openFeedbackModal(jadwalId) {
            let pesan = $('#umpanBalik').val();
            let tenggatWaktu = $('#tenggatWaktu').val();

            // Set jadwal_id ke dalam input hidden di modal
            $('#jadwal_id').val(jadwalId);
            // Tampilkan modal
            $('#feedbackModal').modal('show');


        }
    </script>
@endsection
