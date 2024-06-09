
<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UFT-8" />
    <title>PEMOGRAMAN 3.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<body>
    <h2 style="position: absolute; top: 10px; left: 400px; font-size: 50px;">TAMPIL USER</h2>
</body>

</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">HOME</span>
            </a></li>
            <li><a href="tambah_user.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">TAMBAH USER</span>
            </a></li>
            <li><a href="tampil_user.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL USER</span>
            </a></li>
        </ul>
    </nav>
</body>

<style>
@import url("https://fonts.googleapis.com/css2?family=Pooppins:wght@400;500;600;700&display=swap");

*{
 margin: 0px;
 padding: 0px;
 outline: 0px;
 text-decoration: none;
 }

 body {
  background: #dfe9f5;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: flex-start;
  align-items: flex-start; /* Mengatur elemen lebih ke atas */
  height: 97vh;
 
}

table {
  margin: 95px 0 0 90px; /* Anda bisa menyesuaikan nilai margin atas sesuai kebutuhan */
}
nav{
  position: absolute;
  top: 0px;
  bottom: 0px;
  height: 100%;
  left: 0px;
  background: #009999;
  width: 80px;
  overflow: hidden;
  transition: width 0.2s linear;
  box-shadow: 0 20px 35px rgba(1, 0, 0, 0.1)
}

a{
position: relative;
color: rgba(85, 83, 83);
font-size: 14px;
display: table;
width: 300px; 
padding: 10px;
}

.fas{
    position: relative;
    width: 70px;
    height: 40px;
    top: 14px;
    font-size: 20px;
    text-align: center;
}

.nav-item{
    position: relative;
    top: 12px;
    margin-left: 10px;
}

nav:hover{
    width: 225px;
    transition: all 0.5s ease;   
}
</style>
    <table border="1" dding: 3px; text-align: center;">
        <tr>
            <th style="padding: 5px;">id</th>
            <th style="padding: 10px;">nama</th>
            <th style="padding: 10px;">Password</th>
            <th style="padding: 10px;">level</th>
            <th style="padding: 10px;">status</th>
            <th style="padding: 10px;">OPSI</th>
</tr>
<?php
include 'koneksi.php';
$loggedInLoginLevel = isset($_SESSION['level']) ? $_SESSION['level'] : null;
$no = 1;
$data = mysqli_query($koneksi,"select * from login");
while($d = mysqli_fetch_array($data)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['username']; ?></td>
        <td><?php echo $d['password']; ?></td>
        <td><?php echo $d['level']; ?></td>
        <td><?php echo $d['status']; ?></td>
        <td>
            <?php
        // Tampilkan opsi Edit dan Hapus berdasarkan level user yang sedang login
if ($loggedInLoginLevel == 0) {
    // Level 0 dapat mengedit dan menghapus semua level
    echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
    echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
} elseif ($loggedInLoginLevel == 1) {
    // Level 1 dapat mengedit dan menghapus semua level
    echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
    echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
} elseif ($loggedInLoginLevel == 2) {
    // Level 2 tidak dapat mengedit dan menghapus
    echo 'Tidak diizinkan';
}elseif ($loggedInLoginLevel == 3) {
    // Level 3 dapat mengedit dan menghapus semua level kecuali level 2 (Staff)
    if ($d['level'] == 0 || $d['level'] == 1 || $d['level'] == 3|| $d['level'] == 4) {
        echo 'Tidak diizinkan';
    }  if ($d['level'] == 2 ) {
        echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
        echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
    } 
}elseif ($loggedInLoginLevel == 4) {
    // Level 3 dapat mengedit dan menghapus semua level kecuali level 2 (staff)
    if ($d['level'] == 0 || $d['level'] == 1 || $d['level'] == 3|| $d['level'] == 4) {
        echo 'Tidak diizinkan';
    }  if ($d['level'] == 2 ) {
        echo '<a href="edit_user.php?id=' . $d['id_user'] . '">EDIT</a>';
        echo '<a href="hapus_user.php?id=' . $d['id_user'] . '">HAPUS</a>';
    } 
}
?>
</tr>
</td>
<?php
}
?>
</table>
</body>
</html>
