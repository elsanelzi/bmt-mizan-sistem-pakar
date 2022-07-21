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
                         <li class="breadcrumb-item"><a href="?page=pages/faktor5C/viewfaktor5C">Data Faktor 5C</a></li>
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
                             <h3 class="card-title">Tambah Data Faktor 5C</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label for="faktor_5C">Faktor 5C:</label>
                                     <input type="text" name="faktor_5C" id="faktor_5C" class="form-control" placeholder="Masukan Faktor 5C..." required autofocus>
                                 </div>
                                 <!-- <div class="form-group">
                                     <label for="faktor_5C">Faktor 5C:</label>
                                     <select name="faktor_5C" id="faktor_5C" class="form-control">
                                         <option value="">--- PILIH FAKTOR 5C ---</option>
                                         <option value="Amanah">Manajer</option>
                                         <option value="Ibadah">Petugas Lapangan</option>
                                         <option value="Nama Baik">Teller</option>
                                         <option value="Kepekaan Sosial">Petugas Lapangan</option>
                                         <option value="Rasa Sosial">Teller</option>
                                     </select>
                                 </div> -->
                                 <div class="form-group">
                                     <a href="index.php?page=pages/faktor5C/viewfaktor5C" class="btn btn-success">Kembali</a>
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
        $faktor_5C = $_POST['faktor_5C'];

        //// Query menyimpan data ke dalam tabel Faktor 5C
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_faktor_5c (`faktor_5c`) VALUES ('$faktor_5C')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/faktor5C/viewfaktor5C'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/faktor5C/viewfaktor5C'
              </script>";
        }
    }

    ?>