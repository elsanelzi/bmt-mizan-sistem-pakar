<?php $dataPemberianPembiayaanNasabah = mysqli_query($koneksi, "SELECT * FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON ppn.nik_username=n.nik_username LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah WHERE status='selesai survei 5c' || status='analisa pendapatan' ORDER BY ppn.id_pemberian_pembiayaan_nasabah ASC");
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
                        <li class="breadcrumb-item"><a href="?page=pages/biaya/viewanalisapendapatan">Data Analisa Pendapatan</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Analisa Pendapatan</h3>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Nominal Pinjaman</th>
                                    <th>Jangka Waktu</th>
                                    <th>Status</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataPemberianPembiayaanNasabah as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                        <td><?= $value['jangka_waktu']; ?></td>
                                        <td><?= $value['status']; ?></td>
                                        <td class="text-center">
                                            <?php if ($value['status'] == 'selesai survei 5c') : ?>
                                                <a href="?page=pages/biaya/formanalisapendapatan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-danger">Analisa</i></a>
                                            <?php elseif ($value['status'] == 'analisa pendapatan') : ?>
                                                <a href="#" class="btn btn-danger">Lihat Hasil Analisa</i></a>
                                            <?php endif; ?>
                                            <a href="#" class="btn btn-success">Detail</i></a>
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