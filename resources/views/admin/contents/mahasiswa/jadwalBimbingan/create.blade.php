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
<!--================ Start Detail Pengajuan Area =================-->
<section class="feature_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main_title">
                    <h2 class="mb-3">Pengajuan Bimbingan</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="background-color: #002347;">
                        <h3 class="card-title">Form Pengajuan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mahasiswa.jadwalBimbingan.store') }}" id="pengajuanForm" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Tanggal Bimbingan :</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Pilih Tanggal" name="tanggal_ajuan" id="tanggal"
                                        data-target="#reservationdatetime" required />
                                    <div class="input-group-append" data-target="#reservationdatetime"
                                        data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <span id="tanggalError" class="text-danger" style="display: none;">Tanggal harus lebih
                                    dari hari ini.</span>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan Deskripsi" class="form-control" minlength="10" required></textarea>
                            </div>
                            <!-- /.form group -->
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-left col-lg-3">Kirim</button>
                        </form>

                        <a href="/jadwalBimbingan" class="btn btn-danger float-right">Kembali</a>
                    </div>
                    <!-- /.card-footer -->
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Form Pengajuan Area =================-->
@include('admin.partials.footer')

<script>
    function kirim() {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda tidak akan bisa mengubah pengajuan ini.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kirim!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('pengajuanForm').submit();
            }
        });
    }
</script>

<script>
    // Set min date to today for the input field
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('tanggal').setAttribute('min', today);

        // Validasi saat form dikirim
        document.getElementById('pengajuanForm').addEventListener('submit', function(event) {
            var selectedDate = document.getElementById('tanggal').value;
            var currentDate = new Date().toISOString().split('T')[0];

            // Jika tanggal yang dipilih lebih kecil dari hari ini
            if (selectedDate < currentDate) {
                event.preventDefault(); // Mencegah pengiriman form
                document.getElementById('tanggalError').style.display =
                    'block'; // Menampilkan pesan error
            } else {
                document.getElementById('tanggalError').style.display =
                    'none'; // Menyembunyikan pesan error jika valid
            }
        });
    });
</script>
