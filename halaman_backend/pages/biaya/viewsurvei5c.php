<?php
// Query menampilkan data Peminjaman Nasabah
$dataPeminjamanNasabah = mysqli_query($koneksi, "SELECT * FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON ppn.nik_username=n.nik_username LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah ORDER BY jn.id_pemberian_pembiayaan_nasabah DESC");
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
                        <li class="breadcrumb-item"><a href="?page=pages/biaya/viewsurvei5c">Kelola Survei 5C</a></li>
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
                <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                            echo $_SESSION['info'];
                                                        }
                                                        unset($_SESSION['info']); ?>">
                    <div class="card">
                        <h3 style="padding:10px;margin-left:10px">Kelola Survei 5C</h3>
                    </div>
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="dataTable" class="table table-bordered table-striped table-hover">
                                <thead style="background-color: aqua;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Nominal Pinjaman</th>
                                        <th>Jangka Waktu</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Status</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataPeminjamanNasabah as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><a href="?page=pages/biaya/detailsurvei5C&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>"><?= $value['nama_lengkap']; ?></a></td>
                                            <td><?= $value['nik_username']; ?></td>
                                            <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                            <td><?= $value['jangka_waktu']; ?> bulan</td>
                                            <td><?= $value['tanggal_peminjaman']; ?></td>
                                            <td><?= $value['status']; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-success">Detail</i></a> -->
                                                <?php if ($value['status'] == 'pending') : ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id_jaminan_nasabah" value="<?= $value['id_jaminan_nasabah'] ?>">
                                                        <button type="submit" name="proses" class="btn btn-danger">Proses</i></button>
                                                    </form>
                                                <?php elseif ($value['status'] == 'konfirmasi') : ?>
                                                    <a href="?page=pages/surveifaktor5c/surveifc1&id=<?php echo $value['id_jaminan_nasabah']; ?>" class="btn btn-danger text-white">5C</a>
                                                    <!-- <a type="submit" name="aksi_5C" class="btn btn-danger text-white" data-toggle="modal" data-target="#limaCModal<?= $value['id_jaminan_nasabah'] ?>">5C</i></a> -->
                                                <?php elseif ($value['status'] != 'pending' && $value['status'] != 'konfirmasi') : ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id_jaminan_nasabah" value="<?= $value['id_jaminan_nasabah'] ?>">
                                                        <!-- <button type="submit" name="konfirmasi" class="btn btn-primary btn-md float-right"></i> Konfirmasi</button> -->
                                                        <a href="" data-toggle="modal" data-target="#lihat_hasil_survei<?= $value['id_jaminan_nasabah'] ?>" class="btn btn-success btn-md float-right">Lihat Hasil Survei</a>
                                                    </form>
                                                <?php endif; ?>
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
            <?php
            if (isset($_POST['proses'])) {
                $id_jaminan_nasabah = $_POST['id_jaminan_nasabah'];
                $status = 'konfirmasi';

                $edit = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_jaminan_nasabah=$id_jaminan_nasabah");

                if ($edit) {
                    $_SESSION['info'] = "Berhasil Dikonfirmasi";
                    echo "<script>
                                window.location = '?page=pages/biaya/viewsurvei5c'
                            </script>";
                } else {
                    $_SESSION['info'] = "Gagal Dikonfirmasi";
                    echo "<script>
                            window.location = '?page=pages/biaya/viewsurvei5c'
                        </script>";
                }
            }

            ?>

            <?php foreach ($dataPeminjamanNasabah as $key => $value) : ?>
                <div class="modal fade" id="lihat_hasil_survei<?= $value['id_jaminan_nasabah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title" id="exampleModalLabel" style="text-align: centers;">HASIL SURVEI</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php $id_jaminan_nasabah = $value['id_jaminan_nasabah']; ?>
                                <?php
                                // 
                                $data_hasil = mysqli_query($koneksi, "SELECT * FROM tb_hasil WHERE id_jaminan_nasabah=$id_jaminan_nasabah"); ?>
                                <?php foreach ($data_hasil as $key => $value) : ?>
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <td width="25%">NIK</td>
                                            <td width="5%" style="text-align: right;">:</td>
                                            <td> <?= $value['nik_username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="25%">Nilai Nasabah</td>
                                            <td width="5%" style="text-align: right;">:</td>
                                            <td> <?= $value['nilai_nasabah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="25%">Persentase Nilai</td>
                                            <td width="5%" style="text-align: right;">:</td>
                                            <td> <?= $value['persentase_nilai']; ?></td>
                                        </tr>
                                    </table>
                                <?php endforeach; ?>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                </div>
                            </div> <!-- /MODAL BODY -->
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
    </section>
    <!-- /.content -->

</div>
</div>
</div>
<!-- /.content-wrapper -->