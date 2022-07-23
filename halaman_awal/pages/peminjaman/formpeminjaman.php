 <?php
    if (isset($_POST['pinjam'])) {
        $id_jenis_pembiayaan = $_POST['id_jenis_pembiayaan'];

        $data = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan WHERE id_jenis_pembiayaan=$id_jenis_pembiayaan")->fetch_array();
    }
    ?>
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact">
     <br><br>
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Input Data Peminjaman</h2>
         </div>

         <div class="row">

             <div class="col-lg-3 d-flex align-items-stretch">

             </div>
             <div class="col-lg-6 d-flex align-items-stretch">
                 <form action="" method="POST" class="form">
                     <div class="form-group">
                         <label for="jenis_pembiayaan">Jenis Pembiayaan</label>
                         <input type="hidden" name="id_jenis_pembiayaan" id="id_jenis_pembiayaan" value="<?= $data['id_jenis_pembiayaan'] ?>">
                         <input type="text" class="form-control" value="<?= $data['jenis_pembiayaan'] ?>" readonly>
                     </div>
                     <div class="form-group">
                         <label for="nik_username">NIK</label>
                         <input type="text" name="nik_username" class="form-control" value="<?= $_SESSION['username'] ?>" id="nik_username" readonly>
                     </div>
                     <div class="form-group">
                         <label for="nominal_pinjaman">Nominal Pinjaman</label>
                         <input type="float" name="nominal_pinjaman" class="form-control" id="nominal_pinjaman" autofocus onkeypress="return event.charCode>=48 && event.charCode<=57" required>

                     </div>
                     <div class="form-group">
                         <label for="jangka_waktu">Jangka Waktu</label>
                         <select name="jangka_waktu" class="form-control" id="jangka_waktu" required>
                             <option value="3">-- PILIH JANGKA WAKTU --</option>
                             <option value="3">3 Bulan</option>
                             <option value="6">6 Bulan</option>
                             <option value="12">12 Bulan</option>
                             <option value="18">18 Bulan</option>
                             <option value="24">24 Bulan</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                         <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" value="<?= date('Y-m-d') ?>" required readonly>
                     </div>
                     <button type="submit" name="save">Kirim</button>
                 </form>
                 <?php

                    if (isset($_POST['save'])) {
                        $id_jenis_pembiayaan = $_POST['id_jenis_pembiayaan'];
                        $nik_username = $_POST['nik_username'];
                        $nominal_pinjaman = $_POST['nominal_pinjaman'];
                        $jangka_waktu = $_POST['jangka_waktu'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        // $tanggal_peminjaman = date('Y-m-d', strtotime($tgl_peminjaman));

                        //// Query menyimpan data ke dalam tabel pemberian pembiayaan Nasabah
                        $simpan = mysqli_query($koneksi, "INSERT INTO tb_pemberian_pembiayaan_nasabah (`id_jenis_pembiayaan`,`nik_username`, `nominal_pinjaman`, `jangka_waktu`,`tanggal_peminjaman` ) VALUES ('$id_jenis_pembiayaan','$nik_username', '$nominal_pinjaman', '$jangka_waktu', '$tanggal_peminjaman')");

                        if ($simpan) {
                            $_SESSION['info'] = 'Berhasil Disimpan';
                            echo "<script>
                        window.location.href = '?page=halaman_awal/pages/peminjaman/formjaminan'</script>";
                        } else {
                            $_SESSION['info'] = 'Gagal Disimpan';
                            echo "<script>window.location.href = '?page=halaman_awal/pages/peminjaman/formjaminan'
                        </script>";
                        }
                    }

                    ?>

             </div>




         </div>
     </div>
 </section><!-- End Contact Section -->