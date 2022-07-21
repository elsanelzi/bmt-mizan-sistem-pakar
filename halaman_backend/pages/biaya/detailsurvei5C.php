<?php
$id = $_GET['id'];
// Query menampilkan data detail dari nasabah yang melakukan peminjaman
$detailDataPeminjaman = mysqli_query($koneksi, "SELECT n.*,pp.*,n.nik_username as nik_username, jp.*,jn.*,n.alamat as alamat_nasabah, jn.alamat as alamat_jaminan_nasabah FROM tb_nasabah n LEFT JOIN tb_pemberian_pembiayaan_nasabah pp ON n.nik_username=pp.nik_username LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=pp.id_jenis_pembiayaan LEFT JOIN tb_jaminan_nasabah jn ON jn.id_pemberian_pembiayaan_nasabah=pp.id_pemberian_pembiayaan_nasabah WHERE pp.id_pemberian_pembiayaan_nasabah='$id' ORDER BY id_jaminan_nasabah DESC");


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
                        <li class="breadcrumb-item"><a href="?page=pages/biaya/viewsurvei5C">Detail Data Peminjaman Nasabah</a></li>
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
                    <h3 style="padding:10px; margin-left:10px">Detail Data Peminjaman Nasabah</h3>
                </div>
                <div class="card-body">
                    <div class="row" style="padding:10px">
                        <a href="?page=pages/biaya/viewsurvei5C" class="btn btn-success">Kembali</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div>
                                    <h5 style="padding:10px;margin-left:10px">Data Nasabah</h5>
                                </div>
                                <table id="dataTable" class="table table-hover">
                                    <?php
                                    foreach ($detailDataPeminjaman as $key => $value) : ?>
                                        <tr>
                                            <td width="30%">Nama Lengkap</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['nama_lengkap']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">NIK</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['nik_username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Alamat</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['alamat_nasabah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">No.Telepon</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['no_telepon']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Nasabah</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto nasabah/<?= $value['foto_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto KTP Nasabah</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto ktp nasabah/<?= $value['foto_ktp_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div>
                                    <h5 style="padding:10px;margin-left:10px">Data Survei 5C</h5>
                                </div>
                                <table id="dataTable" class="table table-hover">
                                    <?php
                                    foreach ($detailDataPeminjaman as $key => $value) : ?>
                                        <tr>
                                            <td width="30%">Jenis Pembiayaan</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['jenis_pembiayaan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Nominal Pinjaman</td>
                                            <td width="10%">:</td>
                                            <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Pendpatan Bersih</td>
                                            <td width="10%">:</td>
                                            <td>Rp. <?= number_format($value['pendapatan_bersih'], 0, '.', '.'); ?></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Jangka Waktu</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['jangka_waktu']; ?> bulan</td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Tanggal Peminjaman</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['tanggal_peminjaman']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div>
                                    <h5 style="padding:10px;margin-left:10px">Data Peminjaman Nasabah</h5>
                                </div>
                                <table id="dataTable" class="table table-hover">
                                    <?php
                                    foreach ($detailDataPeminjaman as $key => $value) : ?>
                                        <tr>
                                            <td width="30%">Foto KK</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_KK'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto BPKP</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_BPKP'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Surat Izin Usaha</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_surat_izin_usaha'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Jaminan</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_jaminan'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Rekneing Listrik</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_rekening_listrik'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Alamat</td>
                                            <td width="10%">:</td>
                                            <td><?= $value['alamat_jaminan_nasabah'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->