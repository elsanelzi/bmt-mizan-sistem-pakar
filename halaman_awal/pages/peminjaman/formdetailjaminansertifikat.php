 <?php
    $nik_username = $_SESSION['username'];
    $dataJaminanNasabah = mysqli_query($koneksi, "SELECT * from tb_jaminan_nasabah jn LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON jn.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE ppn.nik_username='$nik_username' ORDER BY id_jaminan_nasabah DESC")->fetch_array();
    ?>


 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
     <br><br>
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Input Detail Data Jaminan Sertifikat Peminjaman</h2>
         </div>

         <div class="row">
             <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                        echo $_SESSION['info'];
                                                    }
                                                    unset($_SESSION['info']); ?>"></div>
             <div class="col-lg-3 d-flex align-items-stretch">

             </div>
             <div class="col-lg-6 d-flex align-items-stretch">
                 <form action="" method="POST" class="form" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="id_jaminan_nasabah">ID Jaminan Nasabah</label>
                         <input type="text" name="id_jaminan_nasabah" class="form-control" value="<?= $dataJaminanNasabah['id_jaminan_nasabah'] ?>" id="id_jaminan_nasabah" readonly>
                     </div>
                     <div class="form-group">
                         <label for="foto_tampak_depan">Foto Tampak Depan</label>
                         <input type="file" name="foto_tampak_depan" class="form-control" id="foto_tampak_depan" required>
                     </div>
                     <div class="form-group">
                         <label for="foto_tampak_belakang">Foto Tampak Belakang</label>
                         <input type="file" name="foto_tampak_belakang" class="form-control" id="foto_tampak_belakang" required>
                     </div>
                     <div class="form-group">
                         <label for="foto_tampak_kiri">Foto Tampak Kiri</label>
                         <input type="file" name="foto_tampak_kiri" class="form-control" id="foto_tampak_kiri" required>
                     </div>
                     <div class="form-group">
                         <label for="foto_tampak_kanan">Foto Tampak Kanan</label>
                         <input type="file" name="foto_tampak_kanan" class="form-control" id="foto_tampak_kanan" required>
                     </div>

                     <button type="submit" name="save">Kirim</button>
                 </form>
                 <?php

                    if (isset($_POST['save'])) {
                        $id_jaminan_nasabah = $_POST['id_jaminan_nasabah'];

                        $nama_foto_tampak_depan = $_FILES['foto_tampak_depan']['name'];
                        $lokasi_foto_tampak_depan = $_FILES['foto_tampak_depan']['tmp_name'];
                        $foto_tampak_depan = uniqid(rand(), true) . '_' . $nama_foto_tampak_depan;
                        while (true) {
                            $foto_tampak_depan = uniqid(rand(), true) . '_' . $nama_foto_tampak_depan;

                            if (!file_exists(sys_get_temp_dir() . $foto_tampak_depan))
                                break;
                        }
                        // $foto_tampak_depan = time() . '_' . $nama_foto_tampak_depan;
                        $pindah = move_uploaded_file($lokasi_foto_tampak_depan, 'assets/image/foto detail jaminan sertifikat nasabah/' . $foto_tampak_depan);

                        $nama_foto_tampak_belakang = $_FILES['foto_tampak_belakang']['name'];
                        $lokasi_foto_tampak_belakang = $_FILES['foto_tampak_belakang']['tmp_name'];
                        $foto_tampak_belakang = uniqid(rand(), true) .  '_' . $nama_foto_tampak_belakang;
                        while (true) {
                            $foto_tampak_belakang = uniqid(rand(), true) .  '_' . $nama_foto_tampak_belakang;

                            if (!file_exists(sys_get_temp_dir() . $foto_tampak_belakang))
                                break;
                        }
                        // $foto_tampak_belakang = time() . '_' . $nama_foto_tampak_belakang;
                        $pindah = move_uploaded_file($lokasi_foto_tampak_belakang, 'assets/image/foto detail jaminan sertifikat nasabah/' . $foto_tampak_belakang);

                        $nama_foto_tampak_kiri = $_FILES['foto_tampak_kiri']['name'];
                        $lokasi_foto_tampak_kiri = $_FILES['foto_tampak_kiri']['tmp_name'];
                        $foto_tampak_kiri = uniqid(rand(), true) . '_' . $nama_foto_tampak_kiri;
                        while (true) {
                            $foto_tampak_kiri = uniqid(rand(), true) . '_' . $nama_foto_tampak_kiri;

                            if (!file_exists(sys_get_temp_dir() . $foto_tampak_kiri))
                                break;
                        }
                        // $foto_tampak_kiri = time() . '_' . $nama_foto_tampak_kiri;
                        $pindah = move_uploaded_file($lokasi_foto_tampak_kiri, 'assets/image/foto detail jaminan sertifikat nasabah/' . $foto_tampak_kiri);

                        $nama_foto_tampak_kanan = $_FILES['foto_tampak_kanan']['name'];
                        $lokasi_foto_tampak_kanan = $_FILES['foto_tampak_kanan']['tmp_name'];
                        $foto_tampak_kanan = uniqid(rand(), true) . '_' . $nama_foto_tampak_kanan;
                        while (true) {
                            $foto_tampak_kanan = uniqid(rand(), true) . '_' . $nama_foto_tampak_kanan;

                            if (!file_exists(sys_get_temp_dir() . $foto_tampak_kanan))
                                break;
                        }
                        // $foto_tampak_kanan = time() . '_' . $nama_foto_tampak_kanan;
                        $pindah = move_uploaded_file($lokasi_foto_tampak_kanan, 'assets/image/foto detail jaminan sertifikat nasabah/' . $foto_tampak_kanan);

                        //// Query menyimpan data ke dalam tabel Jaminan Nasabah
                        $simpan = mysqli_query($koneksi, "INSERT INTO tb_detail_jaminan_sertifikat (`id_jaminan_nasabah`,`foto_tampak_depan`, `foto_tampak_belakang`,`foto_tampak_kiri`, `foto_tampak_kanan`) VALUES ('$id_jaminan_nasabah','$foto_tampak_depan', '$foto_tampak_belakang', '$foto_tampak_kiri', '$foto_tampak_kanan')");

                        if ($simpan) {
                            $_SESSION['info'] = 'Berhasil Disimpan';
                            echo "<script>
                        window.location.href = '?page=halaman_awal/pages/pembiayaan/viewpembiayaan'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>window.location.href = '?page=halaman_awal/pages/pembiayaan/viewpembiayaan'
                        </script>";
                        }
                    }

                    ?>

             </div>



         </div>
     </div>
 </section><!-- End Contact Section -->