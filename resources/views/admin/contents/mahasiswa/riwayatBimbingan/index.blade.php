@include('admin.partials.header')
<!--================ Start Home Banner Area =================-->
<section class="detail_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
        </div>
    </div>
</section>

<section class="feature_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="main_title">
                    <h2 class="mb-3">Riwayat Bimbingan</h2>
                    <p>
                      Bimbingan yang telah selesai dilakukan beserta Umpan Baliknya bisa dilihat pada halaman ini.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Riwayat Bimbingan</h3>
                        {{-- <a href="{{ route('admin.contents.mahasiswa.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus fa-sm"></i></a> --}}
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Tanggal Bimbingan</th>
                                    <th>Feedback</th>
                                    <th>Deadline Perbaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayatbmb as $rwt)
                                    <tr align="center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $rwt->tanggal->isoFormat('dddd, D MMMM Y') }}</td>
                                        <td>{{ $rwt->umpanBalik }}</td>
                                        <td>{{ $rwt->tenggat_waktu->isoFormat('dddd, D MMMM Y') }}</td>
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
<!--================ End Table Area =================-->
@include('admin.partials.footer')
