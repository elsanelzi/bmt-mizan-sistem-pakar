<?php

$id = $_GET['id'];

// Query hapus data tabel Rincian Faktor 5C berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_rincian_5c WHERE id_rincian_5c='$id'");


if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/rincianfaktor5C/addrincianfaktor5C'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/rincianfaktor5C/addrincianfaktor5C'
       	</script>";
}
