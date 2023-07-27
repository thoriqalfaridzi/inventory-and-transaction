<?php 
    include 'koneksi.php';

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
  
        <header>
            <a href="#" class="logo">Logo</a>
            <ul>
                <li><a href="#" class="active">Home</a></li>
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
                              <a href="transaksi/beli.php">Pembelian</a>
                              <a href="transaksi/jual.php">Penjualan</a>
                              <a href="transaksi/laba.php">Laba</a>
                              <a href="transaksi/biayalain.php">Biaya Lain</a>
                              <a href="transaksi/hutang/hutangbeli.php">Hutang Pembelian</a>
                              <a href="transaksi/hutang/hutangjual.php">Hutang Penjualan</a>
                          </div>
                </li>
                <li class="dropdown">
                    <a href="#">Inventory</a>
                        <div class="dropdown-content">
                              <a href="transaksi/inventory.php">Inventory</a>
                              <a href="transaksi/retur/returbeli.php">Retur Pembelian</a>
                              <a href="transaksi/retur/returjual.php">Retur Penjualan</a>
                          </div>
                          </li>
                          <li class="dropdown">
            <a href="#">Backup & Restore</a>
            <div class="dropdown-content">
                <a href="backuprestore/transaksi/back.php">Backup Penjualan</a>
                <a href="backuprestore/transaksi/restore.php">Restore Penjualan</a>
                <a href="backuprestore/master/back.php">Backup Master</a>
                <a href="backuprestore/master/restore.php">Restore Master</a>
            </div>
        </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>
  

</nav>
  </div>
  <div class="orangwarehouse">
    <img src="image/orangwarehouse.jpg" id="orangindex">
  </div>
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
  var orangWarehouse = document.querySelector('.orangwarehouse');
  orangWarehouse.style.opacity = 1; // Memastikan elemen awalnya terlihat

  // Mengaktifkan animasi setelah 100ms (sesuaikan jika diperlukan)
  setTimeout(function() {
    orangWarehouse.classList.add('fadeIn');
  }, 100);
});
    </script>
</body>
</html>
