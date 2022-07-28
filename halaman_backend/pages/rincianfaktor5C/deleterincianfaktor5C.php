<?php

$id = $_GET['id'];


$rincianfaktor5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON rf.id_faktor_5c=f.id_faktor_5c WHERE id_rincian_5c = '$id'")->fetch_array();
$id_faktor_5c = $rincianfaktor5C['id_faktor_5c'];
// Query hapus data tabel Rincian Faktor 5C berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_rincian_5c WHERE id_rincian_5c='$id'");

if ($hapus) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
                                                        window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C&id=$id_faktor_5c'</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C&id=$id_faktor_5c'
                                                        </script>";
}
