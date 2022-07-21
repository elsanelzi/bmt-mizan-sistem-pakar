<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                        echo $_SESSION['info'];
                                                    }
                                                    unset($_SESSION['info']); ?>"></div>
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Sistem Pakar</h1>
                <h2>Sistem Pakar Pemberian Pembiayaan Nasabah BMT Mizan</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#services" class="btn-get-started scrollto">Mulai</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="assets/assets_user/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Jenis Pembiayaan</h2>
                <!-- <p>Magnam dolores commodi suscipit. Necessitatibus .</p> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php // Query menampilkan data rincian Jenis Pembiayaan
                        $jenisPembiayaan = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan ORDER BY id_jenis_pembiayaan DESC"); ?>
                        <?php foreach ($jenisPembiayaan as $value) : ?>
                            <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box">
                                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                    <h4><?= $value['jenis_pembiayaan']; ?></h4>
                                    <p><?= $value['keterangan']; ?></p>

                                    <h4 style="margin-top:20px;">
                                        <?php if (!isset($_SESSION['status'])) : ?>
                                            <a href="#" class="btn btn-primary form-control text-white text-center" data-toggle="modal" data-target="#logoutModal">Pinjam</a>
                                        <?php else : ?>
                                            <form action="?page=halaman_awal/pages/peminjaman/formpeminjaman" method="POST">
                                                <input type="hidden" name="id_jenis_pembiayaan" id="id_jenis_pembiayaan" value="<?= $value['id_jenis_pembiayaan'] ?>">
                                                <button type="submit" class="btn btn-primary form-control" name="pinjam">Pinjam</button>
                                            </form>
                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section><!-- End Services Section -->


</main><!-- End #main -->