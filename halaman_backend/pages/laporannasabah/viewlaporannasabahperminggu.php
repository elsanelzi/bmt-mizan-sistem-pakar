<?php
// Query menampilkan data hasil pembiayaan nasabah
$dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username, ppn.id_pemberian_pembiayaan_nasabah as id_pemberian_pembiayaan_nasabah FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");

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
                        <li class="breadcrumb-item"><a href="?page=pages/laporannasabah/viewlaporannasabahperhari">Laporan Nasabah Perhari</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Laporan Nasabah Perhari</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                        ?>
                        <form action="" method="POST">
                            <div class="row float-center">
                                <div class="col-md-4">
                                    <!-- <label for="pilih_berdasarkan"></label> -->
                                    <select class="form-control" name="pilih_berdasarkan" id="pilih_berdasarkan">
                                        <option value="per_tanggal">Per Tanggal</option>
                                        <option value="per_bulan">Per Bulan</option>
                                        <option value="per_tahun">Per Tahun</option>
                                        <option value="per_jenis_pembiayaan">Per Jenis Pembiayaan</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="per_tanggal" id="per_tanggal" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="per_bulan" id="per_bulan">
                                        <?php
                                        $bulan = ['Januari' => '01', 'Februari' => '02', 'Maret' => '03', 'April' => '04', 'Mei' => '05', 'Juni' => '06', 'Juli' => '07', 'Agustus' => '08', 'September' => '09', 'Oktober' => '10', 'November' => '11', 'Desember' => '12'];
                                        ?>
                                        <option value="<?= $tgl; ?>">Pilih Bulan</option>
                                        <?php foreach ($bulan as $b => $value_bulan) : ?>
                                            <option value="<?= $value_bulan; ?>"><?= $b; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="per_tahun" id="per_tahun" value="<?= date('Y') ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="per_jenis_pembiayaan" id="per_jenis_pembiayaan">
                                        <?php
                                        $jenis_pembiayaan = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan ORDER BY id_jenis_pembiayaan ASC"); ?>
                                        <option value="<?= $tgl; ?>">Pilih Jenis Pembiayaan</option>
                                        <?php foreach ($jenis_pembiayaan as $b => $value) : ?>
                                            <option value="<?= $value['id_jenis_pembiayaan']; ?>"><?= $value['jenis_pembiayaan']; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>
                                <div class="col-md-4" style="margin-top: -7px;">
                                    <button type="submit" class="btn btn-primary my-2" name="cari">Cari</button>

                                    <?php if (isset($_POST['cari'])) : ?>
                                        <a href="print.php?&periode=<?= $_POST['periode']; ?>" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                            Print</a>
                                    <?php else : ?>
                                        <a href="print1.php" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                            Print</a>
                                    <?php endif; ?>
                                    <button type="reset" class="btn btn-warning my-2">Reset</button>
                                </div>


                        </form>
                        <?php
                        // Mengambil data untuk laporan penjualan dari gabungan tabel order, tabel order detail, tabel paket, tabel pelanggan, dan tabel pembayaran
                        $laporan_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_order o LEFT JOIN tb_order_detail od ON o.id_order=od.id_order JOIN tb_paket p ON od.id_paket=p.id_paket JOIN tb_pelanggan pl ON o.id_pelanggan=pl.id_pelanggan LEFT JOIN tb_pembayaran pb ON o.id_order=pb.id_order WHERE status_bayar='sudah bayar' GROUP BY o.id_order ORDER BY o.id_order DESC");

                        // tombol cari ditekan
                        if (isset($_POST['cari'])) {
                            $periode = $_POST['periode'];
                            // Mengambil data untuk laporan penjualan dari gabungan tabel order, tabel order detail, tabel paket, tabel pelanggan, dan tabel pembayaran dimana tanggal bayar sama dengan periode yang diinputkan
                            $laporan_penjualan = mysqli_query($koneksi, "SELECT * FROM tb_order o LEFT JOIN tb_order_detail od ON o.id_order=od.id_order JOIN tb_paket p ON od.id_paket=p.id_paket JOIN tb_pelanggan pl ON o.id_pelanggan=pl.id_pelanggan LEFT JOIN tb_pembayaran pb ON o.id_order=pb.id_order WHERE status_bayar='sudah bayar' AND tanggal_bayar LIKE '%-$periode-%' GROUP BY o.id_order ORDER BY o.id_order DESC");
                        }

                        ?>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover">
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