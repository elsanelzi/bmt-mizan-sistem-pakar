<?php
$id = $_GET['id'];
$nik_username = $_SESSION['username'];
// Query menampilkan data detail dari nasabah yang melakukan peminjaman
$detailDataPeminjamanNasabah = mysqli_query($koneksi, "SELECT n.*,pp.*,djn.*,n.nik_username as nik_username, jp.*,jn.*,n.alamat as alamat_nasabah FROM tb_nasabah n LEFT JOIN tb_pemberian_pembiayaan_nasabah pp ON n.nik_username=pp.nik_username LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=pp.id_jenis_pembiayaan LEFT JOIN tb_jaminan_nasabah jn ON jn.id_pemberian_pembiayaan_nasabah=pp.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_detail_jaminan_nasabah djn ON djn.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE pp.id_pemberian_pembiayaan_nasabah='$id' AND n.nik_username='$nik_username' ORDER BY jn.id_jaminan_nasabah DESC");
?>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <br><br>
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Detail Data Peminjaman Nasabah</h2>
        </div>

        <div class="row">
            <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                        echo $_SESSION['info'];
                                                    }
                                                    unset($_SESSION['info']); ?>">
                <div class="col-lg-3 d-flex align-items-stretch">

                </div>
                <div class="col-lg-12 d-flex align-items-stretch">
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-3">
                                <a href="?page=halaman_awal/pages/pembiayaan/viewpembiayaan" class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div>
                                            <h5 style="padding:10px;" class="text-danger fw-bold">Data Nasabah</h5>
                                            <hr>
                                        </div>
                                        <table id="dataTable" class="table table-hover">
                                            <?php
                                            foreach ($detailDataPeminjamanNasabah as $key => $value) : ?>
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
                                                    <td><img src="assets/image/foto nasabah/<?= $value['foto_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                                </tr>
                                                <tr>
                                                    <td width="30%">Foto KTP Nasabah</td>
                                                    <td width="10%">:</td>
                                                    <td><img src="assets/image/foto ktp nasabah/<?= $value['foto_ktp_nasabah'] ?>" alt="" width="100px" height="100px"></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div>
                                            <h5 style="padding:10px;" class="text-danger fw-bold"">Data Survei 5C</h5>
                                        <hr>
                                    </div>
                                    <table id=" dataTable" class="table table-hover">
                                                <?php
                                                foreach ($detailDataPeminjamanNasabah as $key => $value) : ?>
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
                                                <?php endforeach; ?>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 40px;">
                                <div class="col-md-12 float-left">
                                    <div class="card">
                                        <div>
                                            <h5 style="padding:10px;" class="text-danger fw-bold"">Data Peminjaman Nasabah</h5>
                                            <hr>
                                    </div>
                                    <table id=" dataTable" class="table table-hover">
                                                <?php
                                                foreach ($detailDataPeminjamanNasabah as $key => $value) : ?>
                                                    <tr>
                                                        <td width="30%">Foto KK</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto jaminan nasabah/<?= $value['foto_KK'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto BPKP</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto jaminan nasabah/<?= $value['foto_BPKP'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto Surat Izin Usaha</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto jaminan nasabah/<?= $value['foto_surat_izin_usaha'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto STNK</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto jaminan nasabah/<?= $value['foto_STNK'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto Rekening Listrik</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto jaminan nasabah/<?= $value['foto_rekening_listrik'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div>
                                            <h5 style="padding:10px;" class="text-danger fw-bold"">Data Detail Jaminan Peminjaman Nasabah</h5>
                                            <hr>
                                    </div>
                                    <table id=" dataTable" class="table table-hover">
                                                <?php
                                                foreach ($detailDataPeminjamanNasabah as $key => $value) : ?>
                                                    <tr>
                                                        <td width="30%">Foto Tampak Depan</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto detail jaminan nasabah/<?= $value['foto_tampak_depan'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto Tampak Belakang</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto detail jaminan nasabah/<?= $value['foto_tampak_belakang'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto Tampak Samping</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto detail jaminan nasabah/<?= $value['foto_tampak_samping'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Foto Nomor Angka</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto detail jaminan nasabah/<?= $value['nomor_angka'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="30%">Foto Nomor Mesin</td>
                                                        <td width="10%">:</td>
                                                        <td><img src="assets/image/foto detail jaminan nasabah/<?= $value['nomor_mesin'] ?>" alt="" width="100px" height="100px"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>



                    </div>
                </div>
            </div>
        </div>
</section><!-- End Contact Section -->