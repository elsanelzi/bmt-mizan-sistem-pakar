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
                         <li class="breadcrumb-item"><a href="?page=pages/taksirankendaraan/viewtaksirankendaraan">Data Taksiran Kendaraan</a></li>
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
                             <h3 class="card-title">Tambah Data Taksiran Kendaraan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label for="besar_taksiran_kendaraan">Besar Taksiran Kendaraan (%) :</label>
                                     <input name="besar_taksiran_kendaraan" id="besar_taksiran_kendaraan" type="float" class="form-control" placeholder="Masukan Besar Taksiran Kendaraan (%)" required onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control" placeholder="Masukan Keterangan" required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/taksirankendaraan/viewtaksirankendaraan" class="btn btn-success">Kembali</a>
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
        $besar_taksiran_kendaraan = $_POST['besar_taksiran_kendaraan'];
        $keterangan = $_POST['keterangan'];


        // Query mmenyimpan data kedalam tabel Taksiran Kendaraan
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_taksiran_kendaraan (`besar_taksiran_kendaraan`,`keterangan`) VALUES ('$besar_taksiran_kendaraan','$keterangan')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/taksirankendaraan/viewtaksirankendaraan'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/taksirankendaraan/viewtaksirankendaraan'
              </script>";
        }
    }

    ?>