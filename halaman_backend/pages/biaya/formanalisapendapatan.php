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
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Analisa Pendapatan</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="id_pemberian_pembiayaan_nasabah">ID Pemberian Pembiayaan Nasabah:</label>
                                    <input name="id_pemberian_pembiayaan_nasabah" id="id_pemberian_pembiayaan_nasabah" type="text" class="form-control" value="<?= $_GET['id'] ?>" readonly />
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="jumlah_tabungan">Jumlah Tabungan / Simpanan:</label>
                                            <input name="jumlah_tabungan" id="jumlah_tabungan" type="float" class="form-control" placeholder="Masukan Jumlah Tabungan / Simpanan" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah_hutang">Jumlah Hutang Di Tempat Lain:</label>
                                            <input name="jumlah_hutang" id="jumlah_hutang" type="float" class="form-control" placeholder="Masukan Jumlah Hutang Di Tempat Lain" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 style="font-weight: bold; margin: 20px 0; color:darkblue;">Pendapatan Utama / Bulan</h5>
                                        <hr>
                                        <div class="form-group">
                                            <label for="penjualan">Usaha /Penjualan:</label>
                                            <input type="float" name="penjualan" id="penjualan" class="form-control" placeholder="Masukan Penjualan" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="biaya_tenaga_kerja">Biaya Tenaga Kerja:</label>
                                                    <input name="biaya_tenaga_kerja" id="biaya_tenaga_kerja" type="float" class="form-control" placeholder="Masukan Biaya Tenaga Kerja" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="biaya_bahan_baku">Biaya Bahan Baku:</label>
                                                    <input name="biaya_bahan_baku" id="biaya_bahan_baku" type="float" class="form-control" placeholder="Masukan Biaya Bahan Baku" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="biaya_overhead">Biaya Overhead:</label>
                                                    <input name="biaya_overhead" id="biaya_overhead" type="float" class="form-control" placeholder="Masukan Biaya Overhead" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga_pokok_produksi">Harga Pokok Produksi:</label>
                                            <input name="harga_pokok_produksi" id="harga_pokok_produksi" type="float" class="form-control" placeholder="Harga Pokok Produksi" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="biaya_umum_dan_adm">Biaya Umum Dan Adm:</label>
                                                    <input name="biaya_umum_dan_adm" id="biaya_umum_dan_adm" type="float" class="form-control" placeholder="Masukan Biaya Umum Dan Adm" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="biaya_pemasaran">Biaya Pemasaran: </label>
                                                    <input name="biaya_pemasaran" id="biaya_pemasaran" type="float" class="form-control" placeholder="Masukan Biaya Pemasaran" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="pendapatan_jualan" class="text-danger fw-bold">Pendapatan Jualan:</label>
                                            <input name="pendapatan_jualan" id="pendapatan_jualan" type="float" class="form-control" placeholder="Pendapatan Jualan" value="0" required readonly />
                                        </div>
                                        <!-- <div class="form-group">
                                             <label for="total_biaya_adm" class="text-danger fw-bold">Total Biaya Adm:</label>
                                             <input name="total_biaya_adm" id="total_biaya_adm" type="float" class="form-control" placeholder="Total Biaya Adm" value="0" required readonly />
                                         </div> -->
                                        <div class="form-group">
                                            <label for="pendapatan_per_bulan">Pendapatan / Bulan:</label>
                                            <input name="pendapatan_per_bulan" id="pendapatan_per_bulan" type="float" class="form-control" placeholder="Pendapatan / Bulan" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                        <div class="form-group">
                                            <label for="pendapatan_lain_lain">Pendapatan Lain - Lain:</label>
                                            <input name="pendapatan_lain_lain" id="pendapatan_lain_lain" type="float" class="form-control" placeholder="Pendapatan Lain - Lain" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                        </div>
                                        <div class="form-group">
                                            <label for="total_pendapatan_per_bulan" class="text-danger fw-bold">Total Pendapatan / Bulan:</label>
                                            <input name="total_pendapatan_per_bulan" id="total_pendapatan_per_bulan" type="float" class="form-control" placeholder="Total Pendapatan / Bulan" value="0" required readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 style="font-weight: bold; margin: 20px 0; color:darkblue;">Biaya Hidup Rumah Tangga / Bulan</h5>
                                        <hr>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="biaya_makan">Biaya Makan:</label>
                                                    <input name="biaya_makan" id="biaya_makan" type="float" class="form-control" placeholder="Masukan Biaya Makan" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="biaya_transportasi">Biaya Transportasi:</label>
                                                    <input name="biaya_transportasi" id="biaya_transportasi" type="float" class="form-control" placeholder="Masukan Biaya Transportasi" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="biaya_sewa">Biaya Sewa:</label>
                                                    <input name="biaya_sewa" id="biaya_sewa" type="float" class="form-control" placeholder="Masukan Biaya Sewa" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="biaya_air">Biaya Air:</label>
                                                    <input name="biaya_air" id="biaya_air" type="float" class="form-control" placeholder="Masukan Biaya Air" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="biaya_listrik">Biaya Listrik:</label>
                                                    <input name="biaya_listrik" id="biaya_listrik" type="float" class="form-control" placeholder="Masukan Biaya Listrik" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="biaya_telepon">Biaya Telepon:</label>
                                                    <input name="biaya_telepon" id="biaya_telepon" type="float" class="form-control" placeholder="Masukan Biaya Telepon" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="biaya_pendidikan">Biaya Pendidikan:</label>
                                                    <input name="biaya_pendidikan" id="biaya_pendidikan" type="float" class="form-control" placeholder="Masukan Biaya Pendidikan" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="biaya_lain_lain">Biaya Lain Lain:</label>
                                                    <input name="biaya_lain_lain" id="biaya_lain_lain" type="float" class="form-control" placeholder="Masukan Biaya Lain Lain" required onchange="total1()" onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="total_biaya_hidup_per_bulan" class="text-danger fw-bold">Total Biaya Hidup / Bulan:</label>
                                            <input name="total_biaya_hidup_per_bulan" id="total_biaya_hidup_per_bulan" type="float" class="form-control" placeholder="Total Biaya Hidup / Bulan" value="0" required readonly />
                                        </div>

                                        <hr>
                                        <div class="form-group" style="margin-top: 100px;">
                                            <label for="pendapatan_bersih" class="text-success fw-bold">Pendapatan Bersih / Bulan:</label>
                                            <input name="pendapatan_bersih" id="pendapatan_bersih" type="float" class="form-control" placeholder="Pendapatan Bersih / Bulan" value="0" required readonly />
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="index.php?page=pages/biaya/viewanalisapendapatan" class="btn btn-success">Kembali</a>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    function total1() {
        //  Perhitungan Pendapatan Kotor
        var jumlah_tabungan = document.getElementById('jumlah_tabungan').value;
        var jumlah_hutang = document.getElementById('jumlah_hutang').value;
        var penjualan = document.getElementById('penjualan').value;
        var biaya_tenaga_kerja = document.getElementById('biaya_tenaga_kerja').value;
        var biaya_bahan_baku = document.getElementById('biaya_bahan_baku').value;
        var biaya_overhead = document.getElementById('biaya_overhead').value;
        var harga_pokok_produksi = document.getElementById('harga_pokok_produksi').value;
        //  Perhitungan total biaya admin
        var biaya_umum_dan_adm = document.getElementById('biaya_umum_dan_adm').value;
        var biaya_pemasaran = document.getElementById('biaya_pemasaran').value;

        var pendapatan_jualan = Number(penjualan) - Number(biaya_tenaga_kerja) - Number(biaya_bahan_baku) - Number(biaya_overhead) - Number(harga_pokok_produksi) - Number(biaya_umum_dan_adm) - Number(biaya_pemasaran);


        //  var total_biaya_admin = Number(biaya_umum_dan_adm) + Number(biaya_pemasaran);

        //  Perhitungan pendapatan per bulan
        var pendapatan_per_bulan = document.getElementById('pendapatan_per_bulan').value;

        //  Perhitungan total pendapatan per bulan
        var pendapatan_lain_lain = document.getElementById('pendapatan_lain_lain').value;
        var total_pendapatan_per_bulan = Number(pendapatan_per_bulan) + Number(pendapatan_lain_lain) + Number(pendapatan_jualan);

        // perhitungan biaya hidup rumah tangga per bulan 
        var biaya_makan = document.getElementById('biaya_makan').value;
        var biaya_transportasi = document.getElementById('biaya_transportasi').value;
        var biaya_sewa = document.getElementById('biaya_sewa').value;
        var biaya_air = document.getElementById('biaya_air').value;
        var biaya_listrik = document.getElementById('biaya_listrik').value;
        var biaya_telepon = document.getElementById('biaya_telepon').value;
        var biaya_pendidikan = document.getElementById('biaya_pendidikan').value;
        var biaya_lain_lain = document.getElementById('biaya_lain_lain').value;
        var total_biaya_hidup_per_bulan = Number(biaya_makan) + Number(biaya_transportasi) + Number(biaya_sewa) + Number(biaya_air) + Number(biaya_listrik) + Number(biaya_telepon) + Number(biaya_pendidikan) + Number(biaya_lain_lain);

        //  Perhitungan pendapatan bersih
        var pendapatan_bersih = Number(total_pendapatan_per_bulan) - Number(total_biaya_hidup_per_bulan);

        document.getElementById('jumlah_tabungan').value = jumlah_tabungan;
        document.getElementById('jumlah_hutang').value = jumlah_hutang;
        document.getElementById('pendapatan_jualan').value = pendapatan_jualan;
        //  document.getElementById('total_biaya_adm').value = total_biaya_admin;
        document.getElementById('pendapatan_per_bulan').value = pendapatan_per_bulan;
        document.getElementById('total_pendapatan_per_bulan').value = total_pendapatan_per_bulan;
        document.getElementById('total_biaya_hidup_per_bulan').value = total_biaya_hidup_per_bulan;
        document.getElementById('pendapatan_bersih').value = pendapatan_bersih;
        console.log(pendapatan_jualan);

    }
</script>

<?php

if (isset($_POST['simpan'])) {
    $id_pemberian_pembiayaan_nasabah = $_POST['id_pemberian_pembiayaan_nasabah'];
    $jumlah_tabungan = $_POST['jumlah_tabungan'];
    $jumlah_hutang = $_POST['jumlah_hutang'];
    $penjualan = $_POST['penjualan'];
    $biaya_tenaga_kerja = $_POST['biaya_tenaga_kerja'];
    $biaya_bahan_baku = $_POST['biaya_bahan_baku'];
    $biaya_overhead = $_POST['biaya_overhead'];
    $harga_pokok_produksi = $_POST['harga_pokok_produksi'];
    $pendapatan_jualan = $_POST['pendapatan_jualan'];
    $biaya_umum_dan_adm = $_POST['biaya_umum_dan_adm'];
    $biaya_pemasaran = $_POST['biaya_pemasaran'];
    // $total_biaya_admin = $_POST['total_biaya_adm'];
    $pendapatan_per_bulan = $_POST['pendapatan_per_bulan'];
    $pendapatan_lain_lain = $_POST['pendapatan_lain_lain'];
    $total_pendapatan_per_bulan = $_POST['total_pendapatan_per_bulan'];
    $biaya_makan = $_POST['biaya_makan'];
    $biaya_transportasi = $_POST['biaya_transportasi'];
    $biaya_sewa = $_POST['biaya_sewa'];
    $biaya_air = $_POST['biaya_air'];
    $biaya_listrik = $_POST['biaya_listrik'];
    $biaya_telepon = $_POST['biaya_telepon'];
    $biaya_pendidikan = $_POST['biaya_pendidikan'];
    $biaya_lain_lain = $_POST['biaya_lain_lain'];
    $total_biaya_hidup_per_bulan = $_POST['total_biaya_hidup_per_bulan'];
    $pendapatan_bersih_per_bulan = $_POST['pendapatan_bersih'];

    // Query mmenyimpan data kedalam tabel analisa pendapatan
    $simpan = mysqli_query($koneksi, "INSERT INTO tb_analisa_pendapatan (`id_pemberian_pembiayaan_nasabah`,`jumlah_tabungan`,`jumlah_hutang`,`penjualan`,`biaya_tenaga_kerja`,`biaya_bahan_baku`,`biaya_overhead`,`harga_pokok_produksi`,`pendapatan_jualan`,`biaya_umum_dan_adm`,`biaya_pemasaran`,`pendapatan_per_bulan`,`pendapatan_lain_lain`,`total_pendapatan_per_bulan`,`biaya_makan`,`biaya_transportasi`,`biaya_sewa`, `biaya_air`,`biaya_listrik`,`biaya_telepon`,`biaya_pendidikan`,`biaya_lain_lain`,`total_biaya_hidup_per_bulan`,`pendapatan_bersih_per_bulan`) VALUES ('$id_pemberian_pembiayaan_nasabah','$jumlah_tabungan','$jumlah_hutang','$penjualan','$biaya_tenaga_kerja','$biaya_bahan_baku','$biaya_overhead','$harga_pokok_produksi','$pendapatan_jualan','$biaya_umum_dan_adm','$biaya_pemasaran','$pendapatan_per_bulan','$pendapatan_lain_lain','$total_pendapatan_per_bulan','$biaya_makan','$biaya_transportasi','$biaya_sewa','$biaya_air','$biaya_listrik','$biaya_telepon','$biaya_pendidikan','$biaya_lain_lain','$total_biaya_hidup_per_bulan', '$pendapatan_bersih_per_bulan')");

    if ($simpan) {
        // Query menampilkan data validasi peminjaman
        $data = mysqli_query($koneksi, "SELECT * FROM tb_analisa_pendapatan ap LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_hasil h ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah ORDER BY ap.id_analisa_pendapatan DESC")->fetch_array();

        $id_pemberian_pembiayaan_nasabah = $data['id_pemberian_pembiayaan_nasabah'];
        $nominal_pinjaman = $data['nominal_pinjaman'];
        $pendapatan_bersih = $data['pendapatan_bersih_per_bulan'];
        $nilai_nasabah = $data['nilai_nasabah'];

        // var_dump($nominal_pinjaman, $pendapatan_bersih, $nilai_nasabah);

        // die;

        $dataPendapatanMinimum = mysqli_query($koneksi, "SELECT nilai_pendapatan_minimum FROM tb_rentang_pendapatan")->fetch_array();
        $pendapatan_minimum = $dataPendapatanMinimum['nilai_pendapatan_minimum'];

        if (
            $nilai_nasabah == 'Sangat Baik' && $pendapatan_bersih > $pendapatan_minimum
        ) {
            $status = 'Diterima';
        } elseif ($nilai_nasabah == 'Baik' && $pendapatan_bersih > $pendapatan_minimum) {
            $status = 'Diterima';
        } elseif ($nilai_nasabah == 'Cukup Baik' && $pendapatan_bersih > $pendapatan_minimum) {
            $status = 'Ditolak';
        } elseif ($nilai_nasabah == 'Kurang Baik' && $pendapatan_bersih > $pendapatan_minimum) {
            $status = 'Ditolak';
        } elseif ($nilai_nasabah == 'Sangat Baik' && $pendapatan_bersih < $pendapatan_minimum) {
            $status = 'Ditolak';
        } elseif ($nilai_nasabah == 'Baik' && $pendapatan_bersih < $pendapatan_minimum) {
            $status = 'Ditolak';
        }

        // // Edit data tabel jaminan nasabah
        $edit = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_pemberian_pembiayaan_nasabah='$id_pemberian_pembiayaan_nasabah'");
        if ($edit) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/biaya/viewanalisapendapatan'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/biaya/viewanalisapendapatan'
              </script>";
        }
    }
}

?>