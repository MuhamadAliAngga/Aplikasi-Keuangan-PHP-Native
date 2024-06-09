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
    <h2 style="position: absolute; top: 10px; left: 400px; font-size: 50px;">TAMPIL KATEGORI</h2>
</body>

</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">HOME</span>
            </a></li>
            <li><a href="tambah_kategori.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">TAMBAH KATEGORI</span>
            </a></li>
            <li><a href="tampil_kategori.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL KATEGORI</span>
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
             <th>Id</th>
             <th>Nama kategori</th>
             <th>Diskon</th>
             <th>opsi</th>
          </tr> 
          <?php
              include 'koneksi.php';
              $no = 1;
              $data = mysqli_query($koneksi,"select * from kategori");
              while($d = mysqli_fetch_array($data)){
               ?>
          <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo $d['nama_kategori']; ?></td>
               <td><?php echo $d['diskon']; ?></td>
               <td>
               <?php
            // Tampilkan opsi Edit dan Hapus berdasarkan level pengguna
            if ($_SESSION['level'] == 0) {
                // Level 0 dapat mengedit dan menghapus
                echo '<a href="edit_kategori.php?id=' . $d['id_kategori'] . '">Edit</a>';
                echo '<a href="hapus_kategori.php?id=' . $d['id_kategori'] . '">Hapus</a>';
            } elseif ($_SESSION['level'] == 1) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_kategori.php?id=' . $d['id_kategori'] . '">Edit</a>';
                echo '<a href="hapus_kategori.php?id=' . $d['id_kategori'] . '">Hapus</a>';
            } elseif ($_SESSION['level'] == 2) {
                // Level 2 tidak dapat mengedit dan menghapus
                echo 'Tidak diizinkan';
            } elseif ($_SESSION['level'] == 3) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_kategori.php?id=' . $d['id_kategori'] . '">Edit</a>';
                echo '<a href="hapus_kategori.php?id=' . $d['id_kategori'] . '">Hapus</a>';
            }elseif ($_SESSION['level'] == 4) {
                // Level 1 dapat mengedit dan menghapus
                echo '<a href="edit_kategori.php?id=' . $d['id_kategori'] . '">Edit</a>';
                echo '<a href="hapus_kategori.php?id=' . $d['id_kategori'] . '">Hapus</a>';
            }
            ?>
              </td>
          </tr>
          <?php
              }
              ?>
     </table>
          </body>
          </html>