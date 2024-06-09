<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:login.php");
    exit();

    
}

$loggedInLoginLevel = isset ($_SESSION['level'])? $_SESSION['level'] : null;
$welcomeMessage = '';
if ($_SESSION['level'] == 1){
    $welcomeMessage = 'Anda Sedang Login Sebagai Admin!';
} elseif ($_SESSION['level'] == 2) {
    $welcomeMessage = 'Anda Sedang Login Sebagai Staff!';
} elseif ($_SESSION['level'] == 3) {
    $welcomeMessage = 'Anda Sedang Login Sebagai Supervisor!';
} elseif ($_SESSION['level'] == 4) {
    $welcomeMessage = 'Anda Sedang Login Sebagai Manager!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UFT-8" />
    <title>PEMOGRAMAN 3.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<style>
@import url("https://fonts.googleapis.com/css2?family=Pooppins:wght@400;500;600;700&display=swap");

*{
    margin: 0;
    padding: 0;
    outline: none;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  

body{
  background: url('pict2.jpg') no-repeat;
  background-position: center;
}
.container {
            text-align: center;
            padding: 30px;
        }
        header {
            background-color: #009999;
            color: black;
            padding: 20px;
        }

        header h1 {
            margin: 0;
        }
        footer {
            text-align: center;
            background-color: #FF9900;
            color: black;
            padding: 20px;
        }


nav{
  position: absolute;
  top: 10;
  bottom: 0;
  height: 100%;
  left: 0;
  background: #009999;
  width: 90px;
  overflow: hidden;
  transition: width 0.2s linear;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1)
}

.jjpg {
    text-align: center;
    display: flex;
    transition: all 0.5s ease;
    margin: 10px 0 0 10px;
}

.jjpg img{
width: 45px;
height: 45px;
border-radius: 50%;
}

.jjpg span{
    font-weight: bold;
    padding-left: 15px;
    font-size: 18px;
    text-transform: uppercase;
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

a:hover{
    background: #eee;
}

nav:hover{
    width: 280px;
    transition: all 0.5s ease;   
}

.logout{
    position: absolute;
    bottom: 0;

}
</style>
</head>
<body>
<header>
<div class="container">
            <h1>MENU UTAMA</h1>
            </header></div>
        <footer>
        <p><?php echo $welcomeMessage; ?></p>
        </footer>
    </div>
    <nav>
    <header>
       Buatan Muhammad Ali Angga
       </header>
        <ul>
            <li>
               <div> <a href="#">
                    <img scr="img.jpg" alt="">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">MENU UTAMA</span>
                </a>
            <li><a href="tampil_penjualan.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">PENJUALAN</span>
            </a></li>
            <li><a href="tampil_transaksi.php">
                <i class="fas fa-tasks"></i>
                <span class="nav-item">TRANSAKSI</span>
            </a></li>
            <li><a href="tampil_barang.php">
                <i class="fas fa-wallet"></i>
                <span class="nav-item">BARANG</span>
            </a></li>
            <li><a href="tampil_kategori.php">
                <i class="fas fa-cog"></i>
                <span class="nav-item">KATEGORI</span>
            </a></li>
                <li><a href="tampil_member.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">MEMBER</span>
            </a></li>
            <li><a href="view_report.php">
                <i class="fas fa-cog"></i>
                <span class="nav-item">VIEW REPORT</span>
            </a></li>
            <?php
            if ($loggedInLoginLevel != 2) {
                ?>
            <li><a href="tampil_user.php">
                <i class="fas fa-user"></i>
                <span class="nav-item">USER</span>
            </a></li>
            <?php
            }
            ?>
            <li><a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">LOG OUT</span>
            </a></li> </div>
        </ul>
        
    </nav>
</body>
</html>