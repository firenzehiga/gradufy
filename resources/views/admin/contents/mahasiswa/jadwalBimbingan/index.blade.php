@include('admin.partials.header')
<!--================ Start Home Banner Area =================-->
<section class="detail_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->

<!--================ End Tabel Pengajuan Bimbingan Area =================-->
<section class="feature_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Pengajuan Bimbingan</h2>
                    <p>
                        Menambahkan pengajuan hanya dapat dilakukan sekali hingga bimbingan selesai (Status: <span
                            class="badge badge-info">Bimbingan Selesai</span> ).
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if ($canRequestBimbingan)
                            <a href="{{ route('mahasiswa.jadwalBimbingan.create') }}" type="submit"
                                class="btn btn-primary">Ajukan Bimbingan</a>
                        @else
                            <button class="btn btn-secondary" disabled>Ajukan Bimbingan</button>
                            {{-- <p class="text-danger">Anda hanya dapat mengajukan bimbingan jika status "selesai bimbingan".</p>     --}}
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Tanggal Pengajuan Bimbingan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwalbmb as $jwb)
                                    <tr align="center">
                                        <td>{{ $loop->iteration }}</td>
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
                                        @elseif ($jwb->status === 'Expired')
                                            <td><span class="badge badge-danger">Expired</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Kesalahan Status</span></td>
                                        @endif
                                        <td>
                                            <a href="/jadwalBimbingan/detail/{{ $jwb->id }}"
                                                class="btn btn-primary me-2">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!--================ End Tabel Pengajuan Bimbingan Area =================-->
@include('admin.partials.footer')
