

@include('admin.partials.header')
<!--================ Start Banner Area =================-->
<section class="detail_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!--================ Start Detail Pengajuan Area =================-->
<section class="feature_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title">
                    <h2 class="mb-3">Detail Pengajuan Bimbingan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10 col-lg-5">
                <div class="card">
                    <div class="card-header" style="background-color: #002347;">
                        <h3 class="card-title">Informasi Pengajuan Bimbingan</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-5 col-form">Nama Lengkap:</label>
                            <span>{{ $jadwalbmb->mahasiswa->nama }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-5 col-form">NIM:</label>
                            <span>{{ $jadwalbmb->mahasiswa->nim }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-5 col-form">Tgl Pengajuan :</label>
                            <span>{{ $jadwalbmb->tanggal->isoFormat('dddd') }}
                                {{ $jadwalbmb->tanggal->format('Y-m-d ') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-5 col-form">Jam :</label>
                            <span>{{ $jadwalbmb->tanggal->format('H:i') }}</span>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-5 col-form">Deskripsi :</label>
                            <span>{{ $jadwalbmb->deskripsiBimbingan }}</span>
                        </div>

                        {{-- Jika Statusnya "Jadwal Direvisi" maka alasannya akan tampil --}}
                        @if ($jadwalbmb->status == 'Jadwal Direvisi')
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form">Alasan Perubahan :</label>
                                <span>{{ $jadwalbmb->umpanBalik }}</span>
                            </div>
                        @endif

                    </div>

                    <div class="card-footer">
                        <a href="/jadwalBimbingan" class="btn btn-danger float-right">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Detail Pengajuan Area =================-->
@include('admin.partials.footer')
