<?php

include 'koneksi.php';

$id = $_GET['id'];

$query_delete = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan = '$id'") or die(mysqli_error($koneksi));

if ($query_delete) {
    header("location: tampil_penjualan.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>