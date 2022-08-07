<?php
$nik_username = $_SESSION['username'];
// Query menampilkan data Peminjaman Nasabah
$dataPeminjamanNasabah = mysqli_query($koneksi, "SELECT * FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON ppn.nik_username=n.nik_username LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE n.nik_username='$nik_username' ORDER BY jn.id_pemberian_pembiayaan_nasabah DESC");


?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <br><br>
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pembiayaan Saya</h2>
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

                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Nominal Pinjaman</th>
                                    <th>Jangka Waktu</th>
                                    <th>Tanggal Pengajuan Pembiayaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataPeminjamanNasabah as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                        <td><?= $value['jangka_waktu']; ?> bulan</td>
                                        <td><?= $value['tanggal_peminjaman']; ?></td>
                                        <td><?= $value['status']; ?></td>
                                        <td class="text-center">
                                            <a href="?page=halaman_awal/pages/pembiayaan/detailpembiayaan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-success">Detail</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>



            </div>
        </div>
</section><!-- End Contact Section -->

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <?php
        // Query menampilkan data hasil pembiayaan nasabah
        $dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil WHERE n.nik_username='$nik_username' AND jn.status='Diterima' || status='Ditolak' AND status_validasi_hasil=1 ORDER BY h.id_hasil ASC");

        ?>
        <div class="section-title">
            <h2>Hasil Pembiayaan</h2>
        </div>

        <div class="row">
            <div class="col-lg-3 d-flex align-items-stretch">

            </div>
            <div class="col-lg-12 d-flex align-items-stretch">
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="dataTable" class="table table-bordered table-striped table-hover">
                        <thead style="background-color: aqua;">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Tanggal</th>
                                <!-- <th>Nilai Nasabah</th>
                                <th>Persentase Nilai (%)</th> -->
                                <th>Status</th>
                                <th>Pembiayaan Yang Dapat Diberikan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($dataHasilPembiayaan as $key => $value) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_lengkap']; ?></td>
                                    <td><?= $value['nik_username']; ?></td>
                                    <td><?= $value['tanggal']; ?></td>
                                    <!-- <td><?= $value['nilai_nasabah']; ?></td>
                                    <td><?= $value['persentase_nilai']; ?> %</td> -->
                                    <td><?= $value['status']; ?></td>
                                    <?php if ($value['status'] == 'Diterima') : ?>
                                        <td class="text-success">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                    <?php elseif ($value['status'] == 'Ditolak') : ?>
                                        <td class="text-danger">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <a href="?page=halaman_awal/pages/pembiayaan/detailhasilpembiayaannasabah&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-success">Detail</i></a>
                                        <a href="cetak_hasil_nasabah.php?&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                            Cetak</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>



        </div>
    </div>
</section><!-- End Contact Section -->