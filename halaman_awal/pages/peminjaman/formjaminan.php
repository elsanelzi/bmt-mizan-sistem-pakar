 <?php
    $nik_username = $_SESSION['username'];
    $dataPemberianPembiayaanNasabah = mysqli_query($koneksi, "SELECT * from tb_pemberian_pembiayaan_nasabah WHERE nik_username='$nik_username' ORDER BY id_pemberian_pembiayaan_nasabah DESC")->fetch_array(); ?>
 <!-- ======= Contact Section ======= -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 <script type="text/javascript">
     $(window).load(function() {
         $("#jenis_jaminan").change(function() {
             console.log($("#jenis_jaminan option:selected").val());
             // Kendaraan 
             if ($("#jenis_jaminan option:selected").val() == 'Kendaraan') {
                 $('#BPKP').prop('hidden', false);
                 $('#STNK').prop('hidden', false);
                 // alert('Yeay, Lunas');
             } else {
                 // alert('Yahhh, Masuh Belum Lunas');
                 $('#BPKP').prop('hidden', true);
                 $('#STNK').prop('hidden', true);
             }

             //  Sertifikat
             if ($("#jenis_jaminan option:selected").val() == 'Sertifikat') {
                 $('#sertifikat').prop('hidden', false);
                 $('#IMB').prop('hidden', false);
                 $('#PBB').prop('hidden', false);
                 // alert('Yeay, Lunas');
             } else {
                 // alert('Yahhh, Masuh Belum Lunas');
                 $('#sertifikat').prop('hidden', true);
                 $('#IMB').prop('hidden', true);
                 $('#PBB').prop('hidden', true);
             }

         });
     });
 </script>

 <section id="contact" class="contact">
     <br><br>
     <div class="container" data-aos="fade-up">

         <div class="section-title">
             <h2>Input Data Jaminan Peminjaman</h2>
         </div>

         <div class="row">
             <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                        echo $_SESSION['info'];
                                                    }
                                                    unset($_SESSION['info']); ?>">
             </div>
             <div class="col-lg-3 d-flex align-items-stretch">

             </div>
             <div class="col-lg-6 d-flex align-items-stretch">
                 <form action="" method="POST" class="form" enctype="multipart/form-data">
                     <div class="form-group">
                         <label for="id_pemberian_pembiayaan_nasabah">ID Pemberian Pembiayaan Nasabah</label>
                         <input type="text" name="id_pemberian_pembiayaan_nasabah" class="form-control" value="<?= $dataPemberianPembiayaanNasabah['id_pemberian_pembiayaan_nasabah'] ?>" id="id_pemberian_pembiayaan_nasabah" readonly>
                     </div>
                     <div class="form-group">
                         <label for="jenis_jaminan">Jenis Jaminan</label>
                         <select name="jenis_jaminan" id="jenis_jaminan" class="form-control" required>
                             <option value="Kendaraan">-- PILIH JENIS JAMINAN --</option>
                             <option value="Kendaraan">Kendaraan</option>
                             <option value="Sertifikat">Sertifikat</option>
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="foto_KK">Foto KK</label>
                         <input type="file" name="foto_KK" class="form-control" id="foto_KK" required>
                     </div>
                     <div class="form-group" id="BPKP" hidden>
                         <label for="foto_BPKP">Foto BPKP</label>
                         <input type="file" name="foto_BPKP" class="form-control" id="foto_BPKP">
                     </div>
                     <div class="form-group" id="sertifikat" hidden>
                         <label for="foto_sertifikat">Foto Sertifikat</label>
                         <input type="file" name="foto_sertifikat" class="form-control" id="foto_sertifikat">
                     </div>
                     <div class="form-group" id="IMB" hidden>
                         <label for="foto_IMB">Foto IMB</label>
                         <input type="file" name="foto_IMB" class="form-control" id="foto_IMB">
                     </div>
                     <div class="form-group" id="PBB" hidden>
                         <label for="foto_PBB">Foto PBB</label>
                         <input type="file" name="foto_PBB" class="form-control" id="foto_PBB">
                     </div>
                     <div class="form-group">
                         <label for="foto_surat_izin_usaha">Foto Surat Izin Usaha</label>
                         <input type="file" name="foto_surat_izin_usaha" class="form-control" id="foto_surat_izin_usaha" required>
                     </div>
                     <div class="form-group" id="STNK" hidden>
                         <label for="foto_STNK">Foto STNK</label>
                         <input type="file" name="foto_STNK" class="form-control" id="foto_STNK">
                     </div>
                     <div class="form-group">
                         <label for="foto_rekening_listrik">Foto Rekening Listrik</label>
                         <input type="file" name="foto_rekening_listrik" class="form-control" id="foto_rekening_listrik" required>
                     </div>

                     <button type="submit" name="save">Kirim</button>
                 </form>
                 <?php

                    if (isset($_POST['save'])) {
                        $id_pemberian_pembiayaan_nasabah = $_POST['id_pemberian_pembiayaan_nasabah'];
                        $jenis_jaminan = $_POST['jenis_jaminan'];

                        $nama_foto_KK = $_FILES['foto_KK']['name'];
                        $lokasi_foto_KK = $_FILES['foto_KK']['tmp_name'];
                        $foto_KK = uniqid(rand(), true) . '_' . $nama_foto_KK;
                        while (true) {
                            $foto_KK = uniqid(rand(), true) . '_' . $nama_foto_KK;

                            if (!file_exists(sys_get_temp_dir() . $foto_KK))
                                break;
                        }
                        // $foto_KK = time() . '_' . $nama_foto_KK;
                        $pindah = move_uploaded_file($lokasi_foto_KK, 'assets/image/foto jaminan nasabah/' . $foto_KK);



                        $nama_foto_surat_izin_usaha = $_FILES['foto_surat_izin_usaha']['name'];
                        $lokasi_foto_surat_izin_usaha = $_FILES['foto_surat_izin_usaha']['tmp_name'];
                        $foto_surat_izin_usaha = uniqid(rand(), true) . '_' . $nama_foto_surat_izin_usaha;
                        while (true) {
                            $foto_surat_izin_usaha = uniqid(rand(), true) . '_' . $nama_foto_surat_izin_usaha;

                            if (!file_exists(sys_get_temp_dir() . $foto_surat_izin_usaha))
                                break;
                        }
                        // $foto_surat_izin_usaha = time() . '_' . $nama_foto_surat_izin_usaha;
                        $pindah = move_uploaded_file($lokasi_foto_surat_izin_usaha, 'assets/image/foto jaminan nasabah/' . $foto_surat_izin_usaha);

                        $nama_foto_rekening_listrik = $_FILES['foto_rekening_listrik']['name'];
                        $lokasi_foto_rekening_listrik = $_FILES['foto_rekening_listrik']['tmp_name'];
                        $foto_rekening_listrik = uniqid(rand(), true) . '_' . $nama_foto_rekening_listrik;
                        while (true) {
                            $foto_rekening_listrik = uniqid(rand(), true) . '_' . $nama_foto_rekening_listrik;

                            if (!file_exists(sys_get_temp_dir() . $foto_rekening_listrik))
                                break;
                        }
                        // $foto_rekening_listrik = time() . '_' . $nama_foto_rekening_listrik;
                        $pindah = move_uploaded_file($lokasi_foto_rekening_listrik, 'assets/image/foto jaminan nasabah/' . $foto_rekening_listrik);

                        $status = 'pending';

                        if ($jenis_jaminan == 'Kendaraan') {
                            $nama_foto_BPKP = $_FILES['foto_BPKP']['name'];
                            $lokasi_foto_BPKP = $_FILES['foto_BPKP']['tmp_name'];
                            $foto_BPKP = uniqid(rand(), true) .  '_' . $nama_foto_BPKP;
                            while (true) {
                                $foto_BPKP = uniqid(rand(), true) .  '_' . $nama_foto_BPKP;

                                if (!file_exists(sys_get_temp_dir() . $foto_BPKP))
                                    break;
                            }
                            // $foto_BPKP = time() . '_' . $nama_foto_BPKP;


                            $nama_foto_STNK = $_FILES['foto_STNK']['name'];
                            $lokasi_foto_STNK = $_FILES['foto_STNK']['tmp_name'];
                            $foto_STNK = uniqid(rand(), true) . '_' . $nama_foto_STNK;
                            while (true) {
                                $foto_STNK = uniqid(rand(), true) . '_' . $nama_foto_STNK;

                                if (!file_exists(sys_get_temp_dir() . $foto_STNK))
                                    break;
                            }
                            // $foto_STNK = time() . '_' . $nama_foto_STNK;
                            $foto_sertifikat = "";
                            $foto_IMB = "";
                            $foto_PBB = "";


                            //// Query menyimpan data ke dalam tabel Jaminan Nasabah
                            $simpan = mysqli_query($koneksi, "INSERT INTO tb_jaminan_nasabah (`id_pemberian_pembiayaan_nasabah`,`jenis_jaminan`,`foto_KK`, `foto_BPKP`,`foto_sertifikat`,`foto_surat_izin_usaha`, `foto_STNK`,`foto_rekening_listrik`,`foto_IMB`,`foto_PBB`,`status` ) VALUES ('$id_pemberian_pembiayaan_nasabah','$jenis_jaminan','$foto_KK', '$foto_BPKP','$foto_sertifikat', '$foto_surat_izin_usaha', '$foto_STNK', '$foto_rekening_listrik','$foto_IMB', '$foto_PBB', '$status')");

                            $pindah = move_uploaded_file($lokasi_foto_BPKP, 'assets/image/foto jaminan nasabah/' . $foto_BPKP);
                            $pindah = move_uploaded_file($lokasi_foto_STNK, 'assets/image/foto jaminan nasabah/' . $foto_STNK);

                            if ($simpan) {
                                $_SESSION['info'] = 'Berhasil Disimpan';
                                echo "<script>
                        window.location.href = '?page=halaman_awal/pages/peminjaman/formdetailjaminan'</script>";
                            } else {
                                $_SESSION['info'] = 'Gagal Disimpan';
                                echo "<script>window.location.href = '?page=halaman_awal/pages/peminjaman/formdetailjaminan'
                        </script>";
                            }
                        } else {
                            $nama_foto_sertifikat = $_FILES['foto_sertifikat']['name'];
                            $lokasi_foto_sertifikat = $_FILES['foto_sertifikat']['tmp_name'];
                            $foto_sertifikat = uniqid(rand(), true) . '_' . $nama_foto_sertifikat;
                            while (true) {
                                $foto_sertifikat = uniqid(rand(), true) . '_' . $nama_foto_sertifikat;

                                if (!file_exists(sys_get_temp_dir() . $foto_sertifikat))
                                    break;
                            }
                            // $foto_sertifikat = time() . '_' . $nama_foto_sertifikat;

                            $nama_foto_IMB = $_FILES['foto_IMB']['name'];
                            $lokasi_foto_IMB = $_FILES['foto_IMB']['tmp_name'];
                            $foto_IMB = uniqid(rand(), true) . '_' . $nama_foto_IMB;
                            while (true) {
                                $foto_IMB = uniqid(rand(), true) . '_' . $nama_foto_IMB;

                                if (!file_exists(sys_get_temp_dir() . $foto_IMB))
                                    break;
                            }
                            // $foto_IMB = time() . '_' . $nama_foto_IMB;

                            $nama_foto_PBB = $_FILES['foto_PBB']['name'];
                            $lokasi_foto_PBB = $_FILES['foto_PBB']['tmp_name'];
                            $foto_PBB = uniqid(rand(), true) . '_' . $nama_foto_PBB;
                            while (true) {
                                $foto_PBB = uniqid(rand(), true) . '_' . $nama_foto_PBB;

                                if (!file_exists(sys_get_temp_dir() . $foto_PBB))
                                    break;
                            }
                            // $foto_PBB = time() . '_' . $nama_foto_PBB;
                            $foto_BPKP = "";
                            $foto_STNK = "";

                            //// Query menyimpan data ke dalam tabel Jaminan Nasabah
                            $simpan = mysqli_query($koneksi, "INSERT INTO tb_jaminan_nasabah (`id_pemberian_pembiayaan_nasabah`,`jenis_jaminan`,`foto_KK`, `foto_BPKP`,`foto_sertifikat`,`foto_surat_izin_usaha`, `foto_STNK`,`foto_rekening_listrik`,`foto_IMB`,`foto_PBB`,`status` ) VALUES ('$id_pemberian_pembiayaan_nasabah','$jenis_jaminan','$foto_KK', '$foto_BPKP','$foto_sertifikat', '$foto_surat_izin_usaha', '$foto_STNK', '$foto_rekening_listrik','$foto_IMB', '$foto_PBB', '$status')");

                            $pindah = move_uploaded_file($lokasi_foto_sertifikat, 'assets/image/foto jaminan sertifikat/' . $foto_sertifikat);
                            $pindah = move_uploaded_file($lokasi_foto_IMB, 'assets/image/foto jaminan sertifikat/' . $foto_IMB);
                            $pindah = move_uploaded_file($lokasi_foto_PBB, 'assets/image/foto jaminan sertifikat/' . $foto_PBB);

                            if ($simpan) {
                                $_SESSION['info'] = 'Berhasil Disimpan';
                                echo "<script>
                        window.location.href = '?page=halaman_awal/pages/peminjaman/formdetailjaminansertifikat'</script>";
                            } else {
                                $_SESSION['info'] = 'Gagal Disimpan';
                                echo "<script>window.location.href = '?page=halaman_awal/pages/peminjaman/formdetailjaminansertifikat'
                        </script>";
                            }
                        }
                    }

                    ?>

             </div>



         </div>
     </div>
 </section><!-- End Contact Section -->