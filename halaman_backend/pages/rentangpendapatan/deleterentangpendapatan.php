<?php

$id = $_GET['id'];

// Query hapus data tabel rentag pendapatan berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_rentang_pendapatan WHERE id_rentang_pendapatan='$id'");

if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/rentangpendapatan/viewrentangpendapatan'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/rentangpendapatan/viewrentangpendapatan'
       	</script>";
}
