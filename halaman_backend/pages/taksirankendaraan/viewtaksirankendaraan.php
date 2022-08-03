<?php
// Query menampilkan data taksiran kendaraan
$taksiran_kendaraan = mysqli_query($koneksi, "SELECT * FROM tb_taksiran_kendaraan ORDER BY id_taksiran_kendaraan DESC");
$counttaksiran_kendaraan = mysqli_num_rows($taksiran_kendaraan);
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
                        <li class="breadcrumb-item"><a href="?page=pages/taksirankendaraan/viewtaksirankendaraan">Data Taksiran Kendaraan</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Taksiran Kendaraan</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <div class="card-header">
                        <?php if ($counttaksiran_kendaraan == 0) : ?>
                            <h3 class="card-title"><a href="index.php?page=pages/taksirankendaraan/addtaksirankendaraan" class="btn btn-primary">Tambah Data</a></h3>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Besar Taksiran Kendaraan (%)</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($taksiran_kendaraan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['besar_taksiran_kendaraan']; ?> %</td>
                                        <td><?= $value['keterangan']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pages/taksirankendaraan/edittaksirankendaraan&id=<?php echo $value['id_taksiran_kendaraan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/taksirankendaraan/deletetaksirankendaraan&id=<?php echo $value['id_taksiran_kendaraan']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
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