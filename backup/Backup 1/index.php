<?php 
    include 'koneksi.php';

    $query = "SELECT * FROM tb_barang;";
    $sql = mysqli_query($conn, $query);

    $no = 0;
    //var_dump($result);
    //echo $result['Merk'];
    session_start();
    if(!isset($_SESSION['session_username'])){
        header("location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="CSS/styles.css">
</head>
<body>
  <header class="header">
    <h1>Stok Barang untuk Rivky</h1>
    <div class="logout-container">
        <h5><a href="logout.php">Logout</a></h5>
      </div>
  </header>
  
  <nav>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Master</a>
      <div class="dropdown-content">
        <a href="Master/MasterSatuan.php">Master Satuan</a>
        <a href="Master/MasterItem.php">Master Item</a>
        <a href="Master/MasterKategori.php">Master Kategori</a>
        <a href="Master/MasterSupplier.php">Master Supplier</a>
        <a href="Master/MasterMember.php">Master Member</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Transaksi</a>
      <div class="dropdown-content">
        <a href="#">Pembelian</a>
        <a href="#">Penjualan</a>
      </div>
    </li>
  </ul>
  <ul>
    <li><a href="../inventory.php">Inventory</a></li>
  </ul>
</nav>
  
  <div class="container">
    <div class="content">
      <h2>Selamat Datang</h2>
      <p>Website untuk menyimpan record barang yang dibeli</p>

      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
