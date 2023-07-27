<?php 
    include 'koneksi.php';
    $id_barang = '';
    $namabarang = '';
    $kode_barang = '';
    $harga = '';

    if(isset($_GET['ubah'])){
        $id_barang = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_barang WHERE id_barang = '$id_barang';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namabarang = $result['Nama_Barang'];
        $kode_barang = $result['Kode_Barang'];
        $harga = $result['Harga'];


        //var_dump($result);

        //die();
    }
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
      <li><a href="#">Home</a></li>
      
      <li><a href="#">Tambahkan Barang</a></li>
      <li><a href="index.php">Inventory</a></li>
      <li><a href="editbarang.php">Edit Barang</a></li>
    </ul>
  </nav>
  
  <div class="container">
    <div class="content">
      <h2>Selamat Datang</h2>
      <p>Website untuk menyimpan record barang yang dibeli</p>
      
      <form method="POST" action="update.php">
        <input type="hidden" value="<?php echo $id_barang;?>" name="id_barang">
        <label for="Nama_Barang">Nama Produk:</label>
        <input type="text" id="Nama_Barang" name="Nama_Barang" value="<?php echo $namabarang; ?>" required>
        
        <label for="Kode_Barang">Kode Barang:</label>
        <input type="text" id="Kode_Barang" name="Kode_Barang" value="<?php echo $kode_barang; ?>"required>

        <label for="Harga">Harga Rp:</label>
        <input type="text" id="Harga" name="Harga" value="<?php echo $harga; ?>" required>


        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
