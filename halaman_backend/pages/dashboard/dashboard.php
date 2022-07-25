  <?php
    $akun = $koneksi->query("SELECT COUNT(*) AS jumlah_akun FROM tb_user")->fetch_assoc();
    $validasinasabah = $koneksi->query("SELECT COUNT(*) AS jumlah_nasabah FROM tb_nasabah")->fetch_assoc();
    $lihatnasabah = $koneksi->query("SELECT COUNT(*) AS jumlah_nasabah FROM tb_nasabah WHERE status_validasi=1")->fetch_assoc();
    $survei5c = $koneksi->query("SELECT COUNT(*) AS jumlah_survei5c FROM tb_pemberian_pembiayaan_nasabah")->fetch_assoc();
    $faktor5c = $koneksi->query("SELECT COUNT(*) AS jumlah_faktor_5c FROM tb_faktor_5c")->fetch_assoc();
    $rentang_pendapatan = $koneksi->query("SELECT COUNT(*) AS jumlah_rentang_pendapatan FROM tb_rentang_pendapatan")->fetch_assoc();
    $rasio_angsuran = $koneksi->query("SELECT COUNT(*) AS jumlah_rasio_angsuran FROM tb_rasio_angsuran")->fetch_assoc();
    $jenispembiayaan = $koneksi->query("SELECT COUNT(*) AS jumlah_jenis_pembiayaan FROM tb_jenis_pembiayaan")->fetch_assoc();
    $hasil_pembiayaan = $koneksi->query("SELECT COUNT(*) AS jumlah_hasil_pembiayaan FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE status='Diterima' || status='Ditolak' ")->fetch_assoc();
    $hasil_pembiayaan_teller = $koneksi->query("SELECT COUNT(*) AS jumlah_hasil_pembiayaan_teller FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil WHERE status_validasi_hasil=1 AND status='Diterima' || status='Ditolak' ")->fetch_assoc();
    ?>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="?page=pages/dashboard/dashboard">Home</a></li>
                          <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                        echo $_SESSION['info'];
                                                    }
                                                    unset($_SESSION['info']); ?>">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                      <?php if ($_SESSION['status'] == 'Admin') : ?>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3><?php echo $akun['jumlah_akun'] ?></h3>

                                      <p>Akun</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-user"></i>
                                  </div>
                                  <a href="?page=pages/akun/viewakun" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-success">
                                  <div class="inner">
                                      <h3><?php echo $validasinasabah['jumlah_nasabah'] ?></h3>

                                      <p>Validasi Nasabah</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-users"></i>
                                  </div>
                                  <a href="?page=pages/nasabah/viewnasabah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      <?php elseif ($_SESSION['status'] == 'Teller') : ?>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3><?php echo $hasil_pembiayaan_teller['jumlah_hasil_pembiayaan_teller'] ?></h3>

                                      <p>Hasil Pembiayaan</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fab fa-cc-paypal"></i>
                                  </div>
                                  <a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      <?php elseif ($_SESSION['status'] == 'Petugas Lapangan') : ?>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3><?php echo $lihatnasabah['jumlah_nasabah'] ?></h3>

                                      <p>Nasabah</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-users"></i>
                                  </div>
                                  <a href="?page=pages/nasabah/viewnasabah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-success">
                                  <div class="inner">
                                      <h3><?php echo $survei5c['jumlah_survei5c'] ?></h3>

                                      <p>Survei 5C</p>
                                  </div>
                                  <div class="icon">
                                      <i class="far fa-circle"></i>
                                  </div>
                                  <a href="?page=pages/biaya/viewsurvei5C" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                  <div class="inner">
                                      <h3>1</h3>

                                      <p>Analisa Pendapatan</p>
                                  </div>
                                  <div class="icon">
                                      <i class="far fa-circle"></i>
                                  </div>
                                  <a href="?page=pages/biaya/viewanalisapendapatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                      <?php elseif ($_SESSION['status'] == 'Manajer') : ?>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3><?php echo $lihatnasabah['jumlah_nasabah'] ?></h3>

                                      <p>Nasabah</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-users"></i>
                                  </div>
                                  <a href="?page=pages/nasabah/viewnasabah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-success">
                                  <div class="inner">
                                      <h3><?php echo $faktor5c['jumlah_faktor_5c'] ?></h3>

                                      <p>Faktor 5C</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fas fa-solid fa-coins"></i>
                                  </div>
                                  <a href="?page=pages/faktor5C/viewfaktor5C" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                  <div class="inner">
                                      <h3><?php echo $jenispembiayaan['jumlah_jenis_pembiayaan'] ?></h3>

                                      <p>Jenis Pembiayaan</p>
                                  </div>
                                  <div class="icon">
                                      <i class="far fa-credit-card"></i>
                                  </div>
                                  <a href="?page=pages/jenispembiayaan/viewjenispembiayaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-warning">
                                  <div class="inner">
                                      <h3><?php echo $rentang_pendapatan['jumlah_rentang_pendapatan'] ?></h3>

                                      <p>Rentang Pendapatan</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fab fa-cc-paypal"></i>
                                  </div>
                                  <a href="?page=pages/rentangpendapatan/viewrentangpendapatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>
                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-danger">
                                  <div class="inner">
                                      <h3><?php echo $rasio_angsuran['jumlah_rasio_angsuran'] ?></h3>

                                      <p>Rasio Angsuran</p>
                                  </div>
                                  <div class="icon">
                                      <i class="far fa-credit-card"></i>
                                  </div>
                                  <a href="?page=pages/rasioangsuran/viewrasioangsuran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                          <div class="col-lg-3 col-6">
                              <!-- small box -->
                              <div class="small-box bg-info">
                                  <div class="inner">
                                      <h3><?php echo $hasil_pembiayaan['jumlah_hasil_pembiayaan'] ?></h3>

                                      <p>Hasil Pembiayaan</p>
                                  </div>
                                  <div class="icon">
                                      <i class="fab fa-cc-paypal"></i>
                                  </div>
                                  <a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                              </div>
                          </div>

                      <?php endif; ?>
                  </div>
                  <!-- /.row -->
              </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>