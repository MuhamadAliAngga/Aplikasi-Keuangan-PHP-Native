<?php

include 'koneksi.php';

$id = $_GET['id'];

$query_delete = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'") or die(mysqli_error($koneksi));

if ($query_delete) {
    header("location: tampil_kategori.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>