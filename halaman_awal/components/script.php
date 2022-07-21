<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/assets_user/vendor/aos/aos.js"></script>
<script src="assets/assets_user/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/assets_user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/assets_user/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/assets_user/vendor/waypoints/noframework.waypoints.js"></script>
<!-- <script src="assets/assets_user/vendor/php-email-form/validate.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/assets_user/js/main.js"></script>

<!-- Sweet Alert 2 -->
<script src="assets/assets_user/sweet alert2/sweetalert2.min.js"></script>

<!-- Admin LTE -->
<script src="assets/assets_user/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/assets_user/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/assets_user/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Sweet Alert 2 -->
<script>
    const notification = $('.info-data').data('infodata');

    if (notification == "Berhasil Login") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Selamat, Anda ' + notification + '!',
        })
    } else if (notification == "Gagal Login") {
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Maaf, Anda ' + notification + '!',
        })
    } else if (notification == "Berhasil Disimpan") {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data ' + notification + '!',
        })
    } else if (notification == "Gagal Disimpan") {
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