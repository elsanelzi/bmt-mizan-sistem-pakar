<?php
$id = $_GET['id'];
$id_nasabah = $id;
// Query menampilkan data detail dari nasabah yang melakukan peminjaman
// $detailDataNasabah = mysqli_query($koneksi, "SELECT n.*,pp.*,djn.*,n.nik_username as nik_username, jp.*,jn.*,n.alamat as alamat_nasabah FROM tb_nasabah n LEFT JOIN tb_pemberian_pembiayaan_nasabah pp ON n.nik_username=pp.nik_username LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=pp.id_jenis_pembiayaan LEFT JOIN tb_jaminan_nasabah jn ON jn.id_pemberian_pembiayaan_nasabah=pp.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_detail_jaminan_nasabah djn ON djn.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE pp.id_pemberian_pembiayaan_nasabah='$id' AND n.id_nasabah='$id_nasabah' ORDER BY jn.id_jaminan_nasabah DESC");

$data_nik_username = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE id_nasabah='$id_nasabah'")->fetch_array();
$nik_username = $data_nik_username['nik_username'];


$detailDataNasabah = mysqli_query($koneksi, "SELECT n.*,pp.*,djn.*,djs.*,n.nik_username as nik_username, jp.*,jn.*,n.alamat as alamat_nasabah, djs.foto_tampak_depan as sertifikat_foto_tampak_depan, djs.foto_tampak_belakang as sertifikat_foto_tampak_belakang, djs.foto_tampak_samping  as sertifikat_foto_tampak_samping, djs.foto_tampak_atas as sertifikat_foto_tampak_atas, djn.foto_tampak_depan as kendaraan_foto_tampak_depan, djn.foto_tampak_belakang as kendaraan_foto_tampak_belakang, djn.foto_tampak_samping  as kendaraan_foto_tampak_samping FROM tb_nasabah n LEFT JOIN tb_pemberian_pembiayaan_nasabah pp ON n.nik_username=pp.nik_username LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=pp.id_jenis_pembiayaan LEFT JOIN tb_jaminan_nasabah jn ON jn.id_pemberian_pembiayaan_nasabah=pp.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_detail_jaminan_nasabah djn ON djn.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_detail_jaminan_sertifikat djs ON djs.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE n.nik_username='$nik_username' ORDER BY jn.id_jaminan_nasabah DESC");


// $detailDataSertifikatNasabah = mysqli_query($koneksi, "SELECT n.*,pp.*,djs.*,n.nik_username as nik_username, jp.*,jn.*,n.alamat as alamat_nasabah FROM tb_nasabah n LEFT JOIN tb_pemberian_pembiayaan_nasabah pp ON n.nik_username=pp.nik_username LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=pp.id_jenis_pembiayaan LEFT JOIN tb_jaminan_nasabah jn ON jn.id_pemberian_pembiayaan_nasabah=pp.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_detail_jaminan_sertifikat djs ON djs.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE n.nik_username='$nik_username' ORDER BY jn.id_jaminan_nasabah DESC");

// var_dump($detailDataSertifikatNasabah);
// die;
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
                        <li class="breadcrumb-item"><a href="?page=pages/nasabah/viewnasabah">Data Info Detail Nasabah</a></li>
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

                <!-- <div class="card">
                    <h3 style="padding:10px;margin-left:10px">Detail Data Hasil Pembiayaan</h3>
                </div> -->
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead style="background-color:aquamarine;">
                                <tr>
                                    <th colspan="3" style="text-align:center; color:darkgoldenrod">DATA INFO NASABAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detailDataNasabah as $key => $value) : ?>

                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">DATA NASABAH : </td>
                                    </tr>
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
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">DATA PEMBERIAN PEMBIAYAAN NASABAH : </td>
                                    </tr>
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
                                        <td width="30%">Jangka Waktu</td>
                                        <td width="10%">:</td>
                                        <td><?= $value['jangka_waktu']; ?> bulan</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Tanggal Peminjaman</td>
                                        <td width="10%">:</td>
                                        <td><?= $value['tanggal_peminjaman']; ?></td>
                                    </tr>
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">DATA JAMINAN NASABAH : </td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Foto KK</td>
                                        <td width="10%">:</td>
                                        <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_KK'] ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <?php if ($value['jenis_jaminan'] == 'Kendaraan') : ?>
                                        <tr>
                                            <td width="30%">Foto BPKP</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_BPKP'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($value['jenis_jaminan'] == 'Sertifikat') : ?>
                                        <tr>
                                            <td width="30%">Foto Sertifikat</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan sertifikat/<?= $value['foto_sertifikat'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td width="30%">Foto Surat Izin Usaha</td>
                                        <td width="10%">:</td>
                                        <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_surat_izin_usaha'] ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <?php if ($value['jenis_jaminan'] == 'Kendaraan') : ?>
                                        <tr>
                                            <td width="30%">Foto STNK</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_STNK'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td width="30%">Foto Rekening Listrik</td>
                                        <td width="10%">:</td>
                                        <td><img src="../assets/image/foto jaminan nasabah/<?= $value['foto_rekening_listrik'] ?>" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">FOTO DETAIL DATA NASABAH : </td>
                                    </tr>
                                    <?php if ($value['jenis_jaminan'] == 'Kendaraan') : ?>
                                        <tr>
                                            <td width="30%">Foto Tampak Depan</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan nasabah/<?= $value['kendaraan_foto_tampak_depan'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Tampak Belakang</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan nasabah/<?= $value['kendaraan_foto_tampak_belakang'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Tampak Samping</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan nasabah/<?= $value['kendaraan_foto_tampak_samping'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Nomor Angka</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan nasabah/<?= $value['nomor_angka'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>

                                        <tr>
                                            <td width="30%">Foto Nomor Mesin</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan nasabah/<?= $value['nomor_mesin'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($value['jenis_jaminan'] == 'Sertifikat') : ?>

                                        <tr>
                                            <td width="30%">Foto Tampak Depan</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan sertifikat nasabah/<?= $value['sertifikat_foto_tampak_depan'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Tampak Belakang</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan sertifikat nasabah/<?= $value['sertifikat_foto_tampak_belakang'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Tampak Samping</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan sertifikat nasabah/<?= $value['sertifikat_foto_tampak_samping'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>
                                        <tr>
                                            <td width="30%">Foto Tampak Atas</td>
                                            <td width="10%">:</td>
                                            <td><img src="../assets/image/foto detail jaminan sertifikat nasabah/<?= $value['sertifikat_foto_tampak_atas'] ?>" alt="" width="100px" height="100px"></td>
                                        </tr>

                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3">*********************************************************************************</td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="?page=pages/nasabah/viewnasabah" class="btn btn-success" style="justify-content: left; margin-top:40px;">Kembali</a>
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