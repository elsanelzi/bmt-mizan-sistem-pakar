<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #D3D3D3;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="background-color: #483D8B;">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sistem Pakar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <?php
                $username = $_SESSION['username'];
                $user = mysqli_query($koneksi, "SELECT * FROM tb_detail_user WHERE nik_username = '$username'")->fetch_array(); ?>
                <a href="#" class="d-block"><?= $user['nama_lengkap']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="?page=pages/dashboard/dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($_SESSION['status'] === 'Admin') : ?>
                    <li class="nav-item">
                        <a href="?page=pages/akun/viewakun" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Kelola Akun</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=pages/nasabah/viewnasabah" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Validasi Nasabah</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION['status'] === 'Manajer') : ?>

                    <li class="nav-item">
                        <a href="?page=pages/nasabah/viewnasabah" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Lihat Nasabah</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=pages/faktor5C/viewfaktor5C" class="nav-link">
                            <i class="nav-icon fas fa-solid fa-coins"></i>
                            <p>Kelola Faktor 5C</p>
                        </a>
                    </li>
                    <!-- 
                    <li class="nav-item">
                        <a href="?page=pages/rincianfaktor5C/viewrincianfaktor5C" class="nav-link">
                            <i class="nav-icon fas fa-eye-slash"></i>
                            <p>Kelola Rincian Faktor 5C</p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="?page=pages/jenispembiayaan/viewjenispembiayaan" class="nav-link">
                            <i class="nav-icon far fa-credit-card"></i>
                            <p>Kelola Jenis Pembiayaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?page=pages/rentangpendapatan/viewrentangpendapatan" class="nav-link">
                            <i class="nav-icon fab fa-cc-paypal"></i>
                            <p>Rentang Pendapatan</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=pages/rasioangsuran/viewrasioangsuran" class="nav-link">
                            <i class="nav-icon far fa-credit-card"></i>
                            <p>Rasio Angsuran</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Laporan Hasil Suvei
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?page=pages/peminjaman/viewvalidasipeminjaman" class="nav-link">
                                    <i class="nav-icon fas fa-file-invoice"></i>
                                    <p>Validasi Peminjaman</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=pages/peminjaman/viewnasabahditolak" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nasabah Ditolak</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=pages/peminjaman/viewnasabahditerima" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nasabah Diterima</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nasabah Diterima Full</p>
                                </a>
                            </li> -->
                        </ul>

                    <li class="nav-item">
                        <a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan" class="nav-link">
                            <!-- <i class="nav-icon fas fa-solid fa-coins"></i> -->
                            <i class="nav-icon fab fa-cc-paypal"></i>
                            <p>Hasil Pembiayaan</p>
                        </a>
                    </li>
                    </li>
                <?php elseif ($_SESSION['status'] === 'Petugas Lapangan') : ?>
                    <li class="nav-item">
                        <a href="?page=pages/nasabah/viewnasabah" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Lihat Nasabah</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fab fa-cc-paypal"></i>
                            <p>
                                Kelola Biaya
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="?page=pages/biaya/viewsurvei5c" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Survei 5C</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?page=pages/biaya/viewanalisapendapatan" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Analisa Pendapatan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php elseif ($_SESSION['status'] === 'Teller') : ?>
                    <!-- <li class="nav-item">
                        <a href="?page=pages/nasabah/viewnasabah" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Lihat Nasabah</p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan" class="nav-link">
                            <i class="nav-icon fab fa-cc-paypal"></i>
                            <p>Hasil Pembiayaan</p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- <script>
    $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    })
</script> -->