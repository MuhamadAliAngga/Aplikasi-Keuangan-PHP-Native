<?php
session_start();
if(!isset($_SESSION['session_username'])){
    header("location:index.php");
    exit();
}

    include 'koneksi.php';
    $query = "SELECT
    m.nama_member AS Member,
    m.level AS Level,
    CONCAT(
        CASE
            WHEN m.level = 'Platinum' THEN '15%'
            WHEN m.level = 'Gold' THEN '10%'
            WHEN m.level = 'Silver' THEN '5%'
            ELSE '0%'
        END
    ) AS 'Diskon Member',
    CASE
        WHEN SUM(t.total) > 100000 THEN '10%'
        ELSE '0%'
    END AS 'Diskon Barang',
    SUM(t.total) AS 'Total Pembelian',
    (
        CASE
            WHEN m.level = 'Platinum' THEN SUM(t.total) * 0.15
            WHEN m.level = 'Gold' THEN SUM(t.total) * 0.10
            WHEN m.level = 'Silver' THEN SUM(t.total) * 0.05
            ELSE 0
        END
    ) +
    (
        CASE
            WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
            ELSE 0
        END
    ) AS 'Total Diskon',
    SUM(t.total) - 
    (
        CASE
            WHEN m.level = 'Platinum' THEN SUM(t.total) * 0.15
            WHEN m.level = 'Gold' THEN SUM(t.total) * 0.10
            WHEN m.level = 'Silver' THEN SUM(t.total) * 0.05
            ELSE 0
        END
    ) -
    (
        CASE
            WHEN SUM(t.total) > 100000 THEN SUM(t.total) * 0.10
            ELSE 0
        END
    ) AS 'Total Transaksi'
FROM
    member m
JOIN
    Penjualan j ON m.nama_member = j.Nama_member
JOIN
    transaksi t ON j.ID_Penjualan = t.penjualan_id
GROUP BY
    m.nama_member, m.level";

$result = $koneksi->query($query);
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UFT-8" />
    <title>PEMOGRAMAN 3.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<body>
    <h2 style="position: absolute; top: 10px; left: 400px; font-size: 50px;">VIEW REPORT</h2>
</body>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">
                <i class="fas fa-home"></i>
                <span class="nav-item">HOME</span>
            </a></li>
            </ul>
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
            <th>Member</th>
            <th>Level</th>
            <th>Diskon Member</th>
            <th>Diskon Barang</th>
            <th>Total Pembelian</th>
            <th>Total Diskon</th>
            <th>Total Transaksi</th>
        </tr>
        <?php
        if ($result !== false) 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Member'] . "</td>";
                echo "<td>" . $row['Level'] . "</td>";
                echo "<td>" . $row['Diskon Member'] . "</td>";
                echo "<td>" . $row['Diskon Barang'] . "</td>";
                echo "<td>" . $row['Total Pembelian'] . "</td>";
                echo "<td>" . $row['Total Diskon'] . "</td>";
                echo "<td>" . $row['Total Transaksi'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Tidak ada data transaksi.";
        }
        $koneksi->close();
        ?>
    </table>
</body>
</html>