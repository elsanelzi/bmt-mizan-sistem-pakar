<?php
// Query menampilkan data Nasabah
$nasabah = mysqli_query($koneksi, "SELECT * FROM tb_nasabah ORDER BY id_nasabah DESC");
$nasabahDivalidasi = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE status_validasi = 1 ORDER BY id_nasabah DESC");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Data Nasabah</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=pages/nasabah/viewnasabah">Data Nasabah</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Nasabah</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                        <!-- /.card-header -->

                        <?php if ($_SESSION['status'] == 'Admin') : ?>
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped table-hover text-center">
                                    <thead style="background-color: aqua;">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No. Telepon</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>KTP</th>
                                            <th>Validasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($nasabah as $key => $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value['nama_lengkap']; ?></td>
                                                <td><?= $value['nik_username']; ?></td>
                                                <td><?= $value['no_telepon']; ?></td>
                                                <td><?= $value['alamat']; ?></td>
                                                <td><img src="../assets/image/foto nasabah/<?= $value['foto_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                                <td><img src="../assets/image/foto ktp nasabah/<?= $value['foto_ktp_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                                <td>
                                                    <?php if ($value['status_validasi'] == 0) : ?>
                                                        <form action="" method="POST">
                                                            <input type="hidden" name="id_nasabah" value="<?= $value['id_nasabah'] ?>">
                                                            <button type="submit" name="validasi" class="btn btn-danger">Validasi</button>
                                                        </form>
                                                    <?php else : ?>
                                                        <span class="text-danger">Aktif</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php if (isset($_POST['validasi'])) {
                                    $id_nasabah = $_POST['id_nasabah'];
                                    $status_validasi = 1;

                                    // Edit data status validasi tabel nasabah
                                    $edit = $koneksi->query("UPDATE tb_nasabah SET status_validasi= '$status_validasi' WHERE id_nasabah='$id_nasabah'");

                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/nasabah/viewnasabah'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/nasabah/viewnasabah'
                                                        </script>";
                                    }
                                } ?>

                            </div>
                            <!-- /.card-body -->
                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover text-center">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>No. Telepon</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>KTP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($nasabahDivalidasi as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td><?= $value['no_telepon']; ?></td>
                                        <td><?= $value['alamat']; ?></td>
                                        <td><img src="../assets/image/foto nasabah/<?= $value['foto_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                        <td><img src="../assets/image/foto ktp nasabah/<?= $value['foto_ktp_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            <?php endif; ?>
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