<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('edustage') }}/img/favicon.ico" type="ico" />
    <title>Sistem Reminder | Gradufy</title>

    <!--================ CSS Area =================-->
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Login') }}/css/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
</head>

<!--================ Body Area =================-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('admin.partials.navbar_dosen')

        <!-- Sidebar -->
        @include('admin.partials.sidebar_dosen')

        <!-- Content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 Gradufy | Sistem Reminder TA.</strong> All rights reserved.
        </footer>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/fullcalendar/main.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="{{ asset('Login') }}/js/sweetalert2.min.js"></script>
    <script>
        // Onclick ubah jadwal agar tanggal baru tidak sama dengan sebelumnya
        $('#ubah_jadwal').on('click', function(e) {

            var tanggal_lama = $('#tanggal_lama').val();
            let tanggal_baru = $('#tanggal').val().replace(" PM", ":00");

            let pesan = $('#umpanBalik').val();

            var timestamp_lama = Date.parse(tanggal_lama);
            var timestamp_baru = Date.parse(tanggal_baru);
            var selisih = timestamp_lama - timestamp_baru;
            // alert(tanggal_lama+'  - '+tanggal_baru+'  - '+selisih);

            // if (pesan == '') {
            //   alert('Kolom alasan wajib diisi!');
            //   return false;
            // }
            if (selisih == 0) {
                alert('Tanggal perubahan tidak boleh sama dengan tanggal sebelumnya!');
                return false;
            } else {
                return true;
            }
        })
    </script>

    <script>
        // DataTable
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "searching": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        // Onclick logout
        function logout() {
            Swal.fire({
                title: 'Anda yakin ingin logout?',
                text: "Anda akan keluar dari sesi ini.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

    {{-- Alert berhasil login --}}
    @if (session('success'))
        <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: '{{ session('success') }}',
                text: 'Perintah berhasil dilakukan',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    {{-- Alert berhasil Edit --}}
    @if (session('status'))
        <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data Berhasil diperbarui',
                text: '{{ session('status') }}',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    @if (session('error'))
        <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Data Gagal diperbarui',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500,
            });
        </script>
    @endif

    <script>
        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            icons: {
                time: 'far fa-clock'
            }
        });
    </script>

</body>
</html>
