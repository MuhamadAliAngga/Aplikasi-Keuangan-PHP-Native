<?php 
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit BARANG</title>
    <html lang=""en>
<head>
    <meta charset="UFT-8" />
    <title>PEMOGRAMAN 3.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">HOME</span>
            </a></li>
            <li><a href="tampil_barang.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL BARANG</span>
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

  .container {
            text-align: center;
            padding: 30px;
        }
        header {
            background-color: #FF9900;
            color: black;
            padding: 20px;
        }

        header h1 {
            margin: 0;
 
}
nav{
  position: absolute;
  top: 10;
  bottom: 0;
  height: 100%;
  left: 0px;
  background: #009999;
  width: 90px;
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
  height: 50px;
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
  width: 240px;
  transition: all 0.5s ease;   
  }
</style>
<?php 
// koneksi database
include 'koneksi.php';
if(isset($_POST['save'])){
    $id_barang = $_POST ['id_barang'];   
    $Nama = $_POST['nama_barang'];
    $Kode = $_POST['kode_barang'];
    $Qty  = $_POST['qty'];
    $Kategori = $_POST['kategori_id'];
	$update=mysqli_query($koneksi,"UPDATE barang SET id_barang ='$id_barang', nama_barang ='$Nama', kode_barang ='$Kode', qty = '$Qty', kategori_id = '$Kategori' WHERE barang.id_barang='$id_barang'");
	if($update){
		header("location:tampil_barang.php");
	}else{
		echo mysqli_error();
	}
}
$id = $_GET['id'];
	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM barang WHERE id_barang='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){       
?>
<body>
<form method="POST">
        <header>
    <div class="container">
    <h1>EDIT BARANG</h1>
        </header></div>
		<table>
			 <tr>
                <td>ID Barang</td>
                <input type="hidden" name="id_barang" value="<?php echo $data['id_barang'];?>"/>
                <td><input type="number" name="id_barang" required value="<?php echo $data['id_barang'];?>"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang" required value="<?php echo $data['nama_barang'];?>"></td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td><input type="text" name="kode_barang"required value="<?php echo $data['kode_barang'];?>"></td>
            </tr>
            <tr>
                <td>Kuantitas</td>
                <td><input type="number" name="qty" required value="<?php echo $data['qty'];?>"></td>
            </tr>
            <tr>
                <td>ID Kategori</td>
                <td><input type="number" name="kategori_id" required value="<?php echo $data['kategori_id'];?>"></td>
            </tr>
                <td></td>
                <td><input type="submit" name="save"></td>
            </tr>
    </table>
    </form>
            <?php } ?>
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

  .container {
            text-align: center;
            padding: 30px;
        }
        header {
            background-color: ##FF9900;
            color: black;
            padding: 20px;
        }

        header h1 {
            margin: 0;
 
}
nav{
  position: absolute;
  top: 10;
  bottom: 0;
  height: 100%;
  left: 0px;
  background: #009999;
  width: 90px;
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
  height: 50px;
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
  width: 240px;
  transition: all 0.5s ease;   
  }
</style>
    <html>
    <head>
        <style>
            body {
                background: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
    
            form {
                background: #fff;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
    
            table {
                width: 100%;
            }
    
            tr {
                margin-bottom: 10px;
            }
    
            td {
                padding: 10px;
                text-align: left; /* Mengatur label rata kiri */
            }
    
            input[type="date"],
            input[type="text"],
            input[type="number"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
    
            input[type="submit"] {
                background: #007bff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
    
            input[type="submit"]:hover {
                background: #0056b3;
            }
        </style>
    </head>        	
</body>
</html>