<?php
include "../koneksi.php";

session_start();

if ($_SESSION['status'] == 'nasabah') {

    echo "<script>
    alert('Maaf laman yang anda cari ilegal atau tidak ditemukan')
    window.location='../index.php'
</script>";
}


if (!isset($_SESSION['status'])) {
    header("location: ../halaman_awal/login/login.php");
    die();
}

?>

<!DOCTYPE html>
<html>

<?php include('components/head.php'); ?>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('components/navbar.php'); ?>

        <?php include('components/sidebar.php'); ?>

        <!-- Content Wrapper. Contains page content -->

        <?php include('content.php'); ?>
        <!-- /.content-wrapper -->
        <?php include('components/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include('components/script.php'); ?>
</body>

</html>