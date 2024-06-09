<?php

include 'koneksi.php';

$id = $_GET['id'];

$query_delete = mysqli_query($koneksi, "DELETE FROM member WHERE id_member = '$id'") or die(mysqli_error($koneksi));

if ($query_delete) {
    header("location: tampil_member.php");
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>