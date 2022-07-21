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
                         <li class="breadcrumb-item"><a href="?page=pages/rasioangsuran/viewrasioangsuran">Data Rasio Angsuran</a></li>
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
                             <h3 class="card-title">Tambah Data Rasio Angsuran</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label for="besar_rasio_angsuran">Besar Rasio Angsuran (%) :</label>
                                     <input name="besar_rasio_angsuran" id="besar_rasio_angsuran" type="float" class="form-control" placeholder="Masukan Besar Rasio Angsuran (%)" required onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control" placeholder="Masukan Keterangan" required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/rasioangsuran/viewrasioangsuran" class="btn btn-success">Kembali</a>
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
        $besar_rasio_angsuran = $_POST['besar_rasio_angsuran'];
        $keterangan = $_POST['keterangan'];


        // Query mmenyimpan data kedalam tabel rasio angsuran
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_rasio_angsuran (`besar_rasio_angsuran`,`keterangan`) VALUES ('$besar_rasio_angsuran','$keterangan')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/rasioangsuran/viewrasioangsuran'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/rasioangsuran/viewrasioangsuran'
              </script>";
        }
    }

    ?>