<?php 
    include 'koneksi.php';

    $query = "SELECT * FROM tb_barang;";
    $sql = mysqli_query($conn, $query);

    $no = 0;
    //var_dump($result);
    //echo $result['Kode_Barang'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="header">
    <h1>Stok Barang untuk Rivky</h1>
  </header>
  
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      
      <li><a href="tambah.php">Tambahkan Barang</a></li>
      <li><a href="inventory.php">Inventory</a></li>
      <li><a href="editbarang.php">Edit Barang</a></li>
    </ul>
  </nav>
  
  <div class="container">
    <div class="content">
      <h2>Tambahkan Barang ke Gudang</h2>
      <p>Silahkan masukkan barang</p>
      
      <form method="POST" action="proses.php">
        <label for="Nama_Barang">Nama Produk:</label>
        <input type="text" id="Nama_Barang" name="Nama_Barang" required>
        
        <label for="Kode_Barang">Kode Barang:</label>
        <input type="text" id="Kode_Barang" name="Kode_Barang" required>

        <label for="Harga">Harga Rp:</label>
        <input type="text" id="Harga" name="Harga" required>


        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
