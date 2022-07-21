 <?php $id = $_GET['id'];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_user u LEFT JOIN tb_detail_user du ON u.nik_username=du.nik_username WHERE id_user = '$id'")->fetch_array();
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
                         <li class="breadcrumb-item"><a href="?page=pages/akun/viewakun">Data Pengguna</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $user['id_user']; ?></li>
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
                             <h3 class="card-title">Ubah Data Pengguna</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user'] ?>">
                                 <div class="form-group">
                                     <label for="nik_username">NIK:</label>
                                     <input name="nik_username" id="nik_username" type="text" class="form-control" value="<?= $user['nik_username'] ?>" required autofocus />
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_lengkap">Nama Lengkap:</label>
                                     <input name="nama_lengkap" id="nama_lengkap" type="text" class="form-control" value="<?= $user['nama_lengkap'] ?>" required />
                                 </div>
                                 <div class="form-group">
                                     <label for="no_telepon">No. Telepon:</label>
                                     <input name="no_telepon" id="no_telepon" type="text" class="form-control" value="<?= $user['no_telepon'] ?>" required />
                                 </div>
                                 <div class="form-group">
                                     <label for="alamat">Alamat:</label>
                                     <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="4" placeholder="Masukan Alamat" required><?= $user['alamat'] ?></textarea>
                                 </div>

                                 <div class="form-group">
                                     <label for="status">Status:</label>
                                     <select name="status" id="status" class="form-control">
                                         <option value="">--- PILIH STATUS ---</option>
                                         <option value="Admin">Admin</option>
                                         <option value="Manajer">Manajer</option>
                                         <option value="Petugas Lapangan">Petugas Lapangan</option>
                                         <option value="Teller">Teller</option>
                                         <script>
                                             document.getElementById('status').value = '<?= $user['status']; ?>';
                                         </script>
                                     </select>

                                 </div>

                                 <div class="form-group">
                                     <label for="password">Password:</label>
                                     <input name="password" id="password" type="password" class="form-control" value="<?= $user['password'] ?>" placeholder="*********" required />
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/akun/viewakun" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_user = $_POST['id_user'];
                                    $nik_username = $_POST['nik_username'];
                                    $nama_lengkap = $_POST['nama_lengkap'];
                                    $no_telepon = $_POST['no_telepon'];
                                    $alamat = $_POST['alamat'];
                                    $status = $_POST['status'];
                                    $password = $_POST['password'];

                                    // Query mmengambil data dari tabel user berdasarkan id
                                    $ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$id_user'")->fetch_assoc();
                                    $username = $ambil['nik_username'];

                                    // // Edit data tabel user
                                    $edit = $koneksi->query("UPDATE tb_user SET nik_username= '$nik_username',password= '$password',status= '$status' WHERE id_user='$id_user'");


                                    // Edit data tabel detail user
                                    $editDetail = $koneksi->query("UPDATE tb_detail_user SET nik_username= '$nik_username',nama_lengkap= '$nama_lengkap',alamat= '$alamat',no_telepon= '$no_telepon' WHERE nik_username='$username'");

                                    if ($editDetail) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/akun/viewakun'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/akun/viewakun'
                                                        </script>";
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