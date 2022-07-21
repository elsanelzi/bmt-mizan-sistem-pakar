<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

<!-- page script -->
<script>
    $(function() {
        $("#dataTable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- Sweet Alert 2 -->
<script src="assets/sweet alert2/sweetalert2.min.js"></script>

<!-- Sweet Alert 2 -->
<script>
    const notification = $('.info-data').data('infodata');

    if (notification == "Berhasil Disimpan" || notification == "Berhasil Diubah" || notification == "Berhasil Dihapus" || notification == "Berhasil Diproses" || notification == "Berhasil Divalidasi") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data ' + notification + '!',
        })
    } else if (notification == "Gagal Disimpan" || notification == "Gagal Diubah" || notification == "Gagal Dihapus" || notification == "Gagal Diproses" || notification == "Gagal Divalidasi") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Data ' + notification + '!',
        })
    } else if (notification == "Berhasil Dikonfirmasi" || notification == "Berhasil Dibatalkan" || notification == "Berhasil Dikirim") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Pesanan ' + notification + '!',
        })

    } else if (notification == "Gagal Dikonfirmasi" || notification == "Gagal Dibatalkan" || notification == "Gagal Dikirim") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Pesanan ' + notification + '!',
        })
    } else if (notification == "Pembayaran Berhasil Dikonfirmasi" || notification == "Pembayaran Berhasil Dibatalkan") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: notification + '!',
        })
    } else if (notification == "Pembayaran Gagal Dikonfirmasi" || notification == "Pembayaran Gagal Dibatalkan") {

    } else if (notification == "Berhasil Login") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Selamat, Anda ' + notification + '!',
        })
    }


    // Script Sweet Alert Hapus
    $('.delete-data').on('click', function(e) {
        e.preventDefault();
        var getLink = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Secara Permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = getLink;
            }
        })
    });
</script>
</body>

</html>