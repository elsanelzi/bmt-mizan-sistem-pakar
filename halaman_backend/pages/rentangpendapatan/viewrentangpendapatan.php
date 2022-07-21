<?php
// Query menampilkan data rentang pendapatan
$rentang_pendapatan = mysqli_query($koneksi, "SELECT * FROM tb_rentang_pendapatan ORDER BY id_rentang_pendapatan DESC");
$countrentangpendapatan = mysqli_num_rows($rentang_pendapatan);
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
                        <li class="breadcrumb-item"><a href="?page=pages/rentangpendapatan/viewrentangpendapatan">Data Rentang Pendapatan</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Rentang Pendapatan</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <div class="card-header">
                        <?php if ($countrentangpendapatan == 0) : ?>
                            <h3 class="card-title"><a href="index.php?page=pages/rentangpendapatan/addrentangpendapatan" class="btn btn-primary">Tambah Data</a></h3>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Nilai Pendapatan Minimum</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rentang_pendapatan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Rp. <?= number_format($value['nilai_pendapatan_minimum'], 0, '.', '.'); ?></td>
                                        <td><?= $value['keterangan']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pages/rentangpendapatan/editrentangpendapatan&id=<?php echo $value['id_rentang_pendapatan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/rentangpendapatan/deleterentangpendapatan&id=<?php echo $value['id_rentang_pendapatan']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
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