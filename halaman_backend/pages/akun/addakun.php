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
                             <h3 class="card-title">Tambah Data Pengguna</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label for="nik_username">NIK:</label>
                                     <input name="nik_username" id="nik_username" type="text" class="form-control" placeholder="Masukan NIK" required autofocus />
                                 </div>
                                 <div class="form-group">
                                     <label for="nama_lengkap">Nama Lengkap:</label>
                                     <input name="nama_lengkap" id="nama_lengkap" type="text" class="form-control" placeholder="Masukan Nama Lengkap" required />
                                 </div>
                                 <div class="form-group">
                                     <label for="no_telepon">No. Telepon:</label>
                                     <input name="no_telepon" id="no_telepon" type="text" class="form-control" placeholder="Masukan No. Telepon" required />
                                 </div>
                                 <div class="form-group">
                                     <label for="alamat">Alamat:</label>
                                     <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <label for="status">Status:</label>
                                     <select name="status" id="status" class="form-control">
                                         <option value="">--- PILIH STATUS ---</option>
                                         <option value="Admin">Admin</option>
                                         <option value="Manajer">Manajer</option>
                                         <option value="Petugas Lapangan">Petugas Lapangan</option>
                                         <option value="Teller">Teller</option>
                                     </select>
                                 </div>

                                 <div class="form-group">
                                     <label for="password">Password:</label>
                                     <input name="password" id="password" type="password" class="form-control" placeholder="*********" required />
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/akun/viewakun" class="btn btn-success">Kembali</a>
                                     <button type="reset" class="btn btn-danger">Reset</button>
                                     <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
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

 <?php

    if (isset($_POST['tambah'])) {
        $nik_username = $_POST['nik_username'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $no_telepon = $_POST['no_telepon'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];
        $password = $_POST['password'];

        //// Query menyimpan data ke dalam tabel user
        $simpanUser = mysqli_query($koneksi, "INSERT INTO tb_user (`nik_username`, `password`,`status` ) VALUES ('$nik_username', '$password', '$status')");

        // mendapatkan id user
        // $id_user = $koneksi->insert_id;

        // Query mmenyimpan data kedalam tabel detail user
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_detail_user (`nik_username`,`nama_lengkap`, `alamat`, `no_telepon`) VALUES ('$nik_username','$nama_lengkap', '$alamat','$no_telepon')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/akun/viewakun'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/akun/viewakun'
              </script>";
        }
    }

    ?>