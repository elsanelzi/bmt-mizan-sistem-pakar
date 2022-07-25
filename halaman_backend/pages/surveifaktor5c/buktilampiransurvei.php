 <?php
    //  Mengambil data pada tabel hasil 
    $data = mysqli_query($koneksi, "SELECT * FROM tb_hasil ORDER BY id_hasil DESC LIMIT 1")->fetch_array();

    $id_jaminan = $data['id_jaminan_nasabah'];

    // Query menampilkan data validasi peminjaman
    $dataPeminjaman = mysqli_query($koneksi, "SELECT n.nik_username, n.nama_lengkap, ppn.id_pemberian_pembiayaan_nasabah, ppn.nominal_pinjaman, ppn.jangka_waktu, jn.id_jaminan_nasabah, jn.status, ap.pendapatan_bersih_per_bulan,h.nilai_nasabah FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_hasil h ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE jn.id_jaminan_nasabah")->fetch_array();
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
                         <li class="breadcrumb-item"><a href="?page=pages/surveifaktor5c/buktilampiransurvei">Data Bukti Lampiran Survei</a></li>
                         <li class="breadcrumb-item active">View Data</li>
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
                             <h3 class="card-title">Data Bukti Lampiran Survei</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" class="form-control" name="id_hasil" value="<?php echo $data['id_hasil'] ?>">
                                 <div class="form-group">
                                     <label for="bukti_lampiran_survei">Upload Bukti Lampiran Survei:</label>
                                     <input name="bukti_lampiran_survei" id="bukti_lampiran_survei" type="file" class="form-control" required autofocus />
                                 </div>

                                 <div class="form-group">
                                     <button type="reset" class="btn btn-danger">Reset</button>
                                     <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['simpan'])) {
                                    $id_hasil = $_POST['id_hasil'];

                                    $nama_bukti_lampiran_survei = $_FILES['bukti_lampiran_survei']['name'];
                                    $lokasi_bukti_lampiran_survei = $_FILES['bukti_lampiran_survei']['tmp_name'];
                                    $bukti_lampiran_survei = uniqid(rand(), true) . '_' . $nama_bukti_lampiran_survei;
                                    $bukti_lampiran_survei = time() . '_' . $nama_bukti_lampiran_survei;
                                    $pindah = move_uploaded_file($lokasi_bukti_lampiran_survei, '../assets/image/foto lampiran survei/' . $bukti_lampiran_survei);

                                    $status_validasi_hasil = 0;

                                    // Query mmenyimpan data kedalam tabel bukti survei
                                    $simpan = mysqli_query($koneksi, "INSERT INTO tb_bukti_survei (`id_hasil`,`bukti_lampiran_survei`, `status_validasi_hasil`) VALUES ('$id_hasil','$bukti_lampiran_survei','$status_validasi_hasil')");

                                    if ($simpan) {
                                        $id_jaminan_nasabah = $dataPeminjaman['id_jaminan_nasabah'];
                                        $nominal_pinjaman = $dataPeminjaman['nominal_pinjaman'];
                                        $pendapatan_bersih = $dataPeminjaman['pendapatan_bersih_per_bulan'];
                                        $nilai_nasabah = $dataPeminjaman['nilai_nasabah'];

                                        $dataPendapatanMinimum = mysqli_query($koneksi, "SELECT nilai_pendapatan_minimum FROM tb_rentang_pendapatan")->fetch_array();
                                        $pendapatan_minimum = $dataPendapatanMinimum['nilai_pendapatan_minimum'];

                                        if ($nilai_nasabah == 'Sangat Baik' && $pendapatan_bersih > $pendapatan_minimum) {
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
                                        $edit = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_jaminan_nasabah='$id_jaminan_nasabah'");

                                        if ($edit) {
                                            $_SESSION['info'] = 'Berhasil Disimpan';
                                            echo "<script>
                                        window.location.href = '?page=pages/biaya/viewsurvei5c'</script>";
                                        } else {
                                            $_SESSION['info'] = 'Gagal Disimpan';
                                            echo "<script>window.location.href = '?page=pages/biaya/viewsurvei5c'
                                    </script>";
                                        }
                                    }
                                }

                                ?>
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