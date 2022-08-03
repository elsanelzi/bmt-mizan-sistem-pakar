<?php

$id = $_GET['id'];

// Query hapus data tabel taksiran kendaraan berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_taksiran_kendaraan WHERE id_taksiran_kendaraan='$id'");

if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/taksirankendaraan/viewtaksirankendaraan'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/taksirankendaraan/viewtaksirankendaraan'
       	</script>";
}
