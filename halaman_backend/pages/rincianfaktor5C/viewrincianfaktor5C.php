<?php
// Query menampilkan data rincian Rincian faktor 5C
$rincian5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON f.id_faktor_5c=rf.id_faktor_5c ORDER BY id_rincian_5c DESC");

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
                        <li class="breadcrumb-item"><a href="?page=pages/rincianfaktor5C/viewrincianfaktor5C">Data Rincian Faktor 5C</a></li>
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
                    <h3 style="padding:10px; margin-left:10px">Data Rincian Faktor 5C</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Faktor 5C</th>
                                    <th>Keterangan</th>
                                    <th>Bobot %</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rincian5C as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['faktor_5c']; ?></td>
                                        <td><?= $value['keterangan']; ?></td>
                                        <td><?= $value['bobot']; ?> %</td>
                                        <td class="text-center">
                                            <a href="?page=pages/rincianfaktor5C/editrincianfaktor5C&id=<?php echo $value['id_rincian_5c']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/rincianfaktor5C/deleterincianfaktor5C&id=<?php echo $value['id_rincian_5c']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
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