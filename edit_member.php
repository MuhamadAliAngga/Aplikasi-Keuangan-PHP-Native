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
    <title>EDIT MEMBER</title>
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
            <li><a href="tampil_member.php">
                <i class="fas fa-chart-bar"></i>
                <span class="nav-item">TAMPIL MEMBER</span>
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
    $Id_Member = $_POST ['id_member'];
    $Kode = $_POST ['kode_member'];    
    $Nama = $_POST['nama_member'];
    $Level = $_POST['level'];
	$update=mysqli_query($koneksi,"UPDATE member SET id_member ='$Id_Member', kode_member ='$Kode', nama_member ='$Nama', level = '$Level' WHERE member.id_member='$Id_Member'");
	if($update){
		header("location:tampil_member.php");
	}else{
		echo mysqli_error();
	}
}
$id = $_GET['id'];
	$query_mysqli = mysqli_query($koneksi,"SELECT * FROM member WHERE id_member ='$id'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysqli)){       
?>
<body>
<form method="POST">
        <header>
    <div class="container">
    <h1>EDIT MEMBER</h1>
        </header></div>
		<table>
			 <tr>
                <td>ID Member</td>
                <input type="hidden" name="id_member" value="<?php echo $data['id_member'];?>"/>
                <td><input type="number" name="id_member" required value="<?php echo $data['id_member'];?>"></td>
            </tr>
            <tr>
                <td>Kode Member</td>
                <td><input type="number" name="kode_member"required value="<?php echo $data['kode_member'];?>"></td>
            </tr>
            <tr>
                <td>Nama Member</td>
                <td><input type="text" name="nama_member" required value="<?php echo $data['nama_member'];?>"></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><select name="level">
                <option value="">-----pilih</option>
                <option value="Gold">Gold</option>
                <option value="Silver">Silver</option>
                <option value="Platinum">Platinum</option>
                <?php echo $data[''];?></td>
</select>
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