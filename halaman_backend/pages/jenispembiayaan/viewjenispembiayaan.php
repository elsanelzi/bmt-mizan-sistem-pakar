<?php
// Query menampilkan data rincian Jenis Pembiayaan
$jenisPembiayaan = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan ORDER BY id_jenis_pembiayaan DESC");

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
                        <li class="breadcrumb-item"><a href="?page=pages/jenispembiayaan/viewjenispembiayaan">Data Jenis Pembiayaan</a></li>
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
                    <h3 style="padding:10px; margin-left:10px">Data Jenis Pembiayaan</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <div class="card-header">
                        <h3 class="card-title"><a href="index.php?page=pages/jenispembiayaan/addjenispembiayaan" class="btn btn-primary">Tambah Data</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pembiayaan</th>
                                    <th>Keterangan</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jenisPembiayaan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['jenis_pembiayaan']; ?></td>
                                        <td><?= $value['keterangan']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pages/jenispembiayaan/editjenispembiayaan&id=<?php echo $value['id_jenis_pembiayaan']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/jenispembiayaan/deletejenispembiayaan&id=<?php echo $value['id_jenis_pembiayaan']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
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