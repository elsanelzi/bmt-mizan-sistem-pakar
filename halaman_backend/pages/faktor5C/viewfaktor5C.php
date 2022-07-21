<?php
// Query menampilkan data faktor 5C
$faktor5C = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c ORDER BY id_faktor_5c ASC");

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
                        <li class="breadcrumb-item"><a href="?page=pages/faktor5C/viewfaktor5C">Data Faktor 5C</a></li>
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
                    <h3 style="padding:10px; margin-left:10px">Data Faktor 5C</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <div class="card-header">
                        <h3 class="card-title"><a href="index.php?page=pages/faktor5C/addfaktor5C" class="btn btn-primary">Tambah Data</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Faktor 5C</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($faktor5C as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['faktor_5c']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=pages/faktor5C/editfaktor5C&id=<?php echo $value['id_faktor_5c']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="?page=pages/faktor5C/deletefaktor5C&id=<?php echo $value['id_faktor_5c']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
                                            <a href="?page=pages/rincianfaktor5C/addrincianfaktor5C&id=<?php echo $value['id_faktor_5c']; ?>" class="btn btn-success">Input Rincian</a>
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