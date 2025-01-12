 <!--================ Start footer Area  =================-->
 <footer class="footer-area">
     <div class="container">

         <div class="row footer-bottom d-flex justify-content-between align-items-center">
             <p class="col-lg-8 col-sm-12 footer-text m-0 text-white ">
             </p>
         </div>
     </div>
 </footer>
 <!--================ End footer Area  =================-->

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->

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
 <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
 <script src="{{ asset('AdminLTE') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
 <script src="{{ asset('AdminLTE') }}/plugins/dropzone/min/dropzone.min.js"></script>
 <script src="{{ asset('AdminLTE') }}/plugins/select2/js/select2.full.min.js"></script>
 <script src="{{ asset('AdminLTE') }}/plugins/jquery-validation/jquery.validate.min.js"></script>
 <script src="{{ asset('AdminLTE') }}/plugins/jquery-validation/additional-methods.min.js"></script>
 <script src="{{ asset('edustage') }}/js/theme.js"></script>

 <script src="{{ asset('Login') }}/js/sweetalert2.min.js"></script>

 <script>
     $(document).ready(function() {

         //Date and time picker
         $('#reservationdatetime').datetimepicker({
             format: 'YYYY-MM-DD HH:mm',
             icons: {
                 time: 'far fa-clock'
             }
         });

     });
 </script>

 <!-- SweetAlert2 -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



 <script>
     $(function() {
         $("#example1").DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": true,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
     });
 </script>

 <script>
     function logout() {
         Swal.fire({
             title: 'Anda yakin ingin logout?',
             text: "Anda akan keluar dari website ini.",
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

 {{-- Alert berhasil --}}
 @if (session('success'))
     <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
     <script>
         Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Login Berhasil',
             text: '{{ session('success') }}',
             showConfirmButton: false,
             timer: 1000,
         });
     </script>
 @endif

 {{-- Alert berhasil Mengajukan --}}
 @if (session('berhasil'))
     <script src="{{ asset('AdminLTE') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
     <script>
         Swal.fire({
             position: 'top-end',
             icon: 'success',
             title: 'Pengajuan Berhasil',
             text: '{{ session('berhasil') }}',
             showConfirmButton: false,
             timer: 1500,
         });
     </script>
 @endif
 </body>

 </html>
