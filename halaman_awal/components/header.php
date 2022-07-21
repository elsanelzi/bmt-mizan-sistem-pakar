 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top" style="background-color: rgba(60, 179, 113, 0.9);">
     <div class="container d-flex align-items-center">

         <h1 class="logo me-auto"><a href="index.php">Sistem Pakar</a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
         <!-- Button trigger modal -->
         <nav id="navbar" class="navbar">
             <ul>
                 <li><a class="nav-link scrollto active" href="?page=halaman_awal/home/home">Home</a></li>
                 <?php if (!isset($_SESSION['status'])) : ?>
                     <li><a class="nav-link scrollto" href="#" data-toggle="modal" data-target="#logoutModal">
                             Pemberian Pembiayaan
                         </a></li>
                     <li><a class="getstarted scrollto" href="halaman_awal/login/login.php">Masuk</a></li>
             </ul>
             <i class="bi bi-list mobile-nav-toggle"></i>
         <?php else : ?>
             <li><a class="nav-link scrollto" href="?page=halaman_awal/pages/pembiayaan/viewpembiayaan">Pemberian Pembiayaan</a></li>
             <?php
                        $username = $_SESSION['username'];
                        $user = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE nik_username = '$username'")->fetch_array(); ?>
             <?php if ($user !== NULL) : ?>
                 <li class="dropdown"><a href="#" class="getstarted scrollto mr-3"><span><?= $user['nama_lengkap']; ?></span> <i class="bi bi-chevron-down"></i></a>
                 <?php else : ?>
                 <li class="dropdown"><a href="#" class="getstarted scrollto mr-3"><span>User</span> <i class="bi bi-chevron-down"></i></a>
                 <?php endif; ?>
                 <ul>
                     <li><a href="halaman_awal/logout.php">Logout<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></a></li>
                 </ul>
                 </li>
             <?php endif; ?>
         </nav><!-- .navbar -->

     </div>
 </header><!-- End Header -->