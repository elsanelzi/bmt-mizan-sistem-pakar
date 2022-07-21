<?php

$id = $_GET['id'];

// Query hapus data tabel rasio angsuran berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_rasio_angsuran WHERE id_rasio_angsuran='$id'");

if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/rasioangsuran/viewrasioangsuran'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/rasioangsuran/viewrasioangsuran'
       	</script>";
}
