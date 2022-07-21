<?php
// Query menampilkan data rasio angsuran
$rasio_angsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran ORDER BY id_rasio_angsuran DESC");
$countrasio_angsuran = mysqli_num_rows($rasio_angsuran);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Data Pengguna</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=pages/rasioangsuran/viewrasioangsuran">Data Rasio Angsuran</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <h3 style="padding:10px;margin-left:10px">Data Rasio Angsuran</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <div class="card-header">
                        <?php if ($countrasio_angsuran == 0) : ?>
                            <h3 class="card-title"><a href="index.php?page=pages/rasioangsuran/addrasioangsuran" class="btn btn-primary">Tambah Data</a></h3>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Besar Rasio Angsuran (%)</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rasio_angsuran as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['besar_rasio_angsuran']; ?> %</td>
                                        <td><?= $value['keterangan']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pages/rasioangsuran/editrasioangsuran&id=<?php echo $value['id_rasio_angsuran']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/rasioangsuran/deleterasioangsuran&id=<?php echo $value['id_rasio_angsuran']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->