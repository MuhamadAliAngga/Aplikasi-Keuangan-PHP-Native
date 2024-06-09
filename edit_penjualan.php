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
    <title>Edit PENJUALAN</title>
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
            <li><a href="tampil_penjualan.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL PENJUALAN</span>
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
    $id_penjualan = $_POST ['id_penjualan'];   
    $Tanggal = $_POST['tanggal_penjualan'];
    $Nama = $_POST['nama_member'];
    $Total = $_POST['total_harga'];
	$update=mysqli_query($koneksi,"UPDATE penjualan SET tanggal_penjualan ='$Tanggal', nama_member ='$Nama', total_harga ='$Total' WHERE penjualan.id_penjualan='$id_penjualan'");
	if($update){
		header("location:tampil_penjualan.php");
	}else{
		echo mysqli_error();
	}
}
$id = $_GET['id'];
	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_penjualan='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){       
?>
<body>
<form method="POST">
        <header>
    <div class="container">
    <h1>EDIT PENJUALAN</h1>
        </header></div>
		<table>
			 <tr>
                <td>Tanggal Penjualan</td>
                <input type="hidden" name="id_penjualan" value="<?php echo $data['id_penjualan'];?>"/>
                <td><input type="date" name="tanggal_penjualan" required value="<?php echo $data['tanggal_penjualan'];?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_member" required value="<?php echo $data['nama_member'];?>"></td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td><input type="number" name="total_harga"required value="<?php echo $data['total_harga'];?>"></td>
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