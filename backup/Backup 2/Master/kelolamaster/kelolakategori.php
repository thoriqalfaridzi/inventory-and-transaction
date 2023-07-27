<?php 
    include '../../koneksi.php';
    include 'headerkelolamaster.php';
    $id_kategori = '';
    $namakategori = '';


    if(isset($_GET['ubah'])){
        $id_kategori = $_GET['ubah'];
        
        $query = "SELECT * FROM master_kategori WHERE id_kategori = '$id_kategori';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namakategori = $result['nama_kategori'];



        //var_dump($result);

        //die();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="../../CSS/styles.css">
</head>
<body>
  
  <div class="container">
    <div class="content">
    <h2>Edit</h2>
      <p>Silahkan masukkan nama kategori</p>
      
      <form method="POST" action="updatekategori.php">
        <input type="hidden" value="<?php echo $id_kategori;?>" name="id_kategori">
        <label for="nama_kategori">Nama Produk:</label>
        <input type="text" id="nama_kategori" name="nama_kategori" value="<?php echo $namakategori; ?>" required>
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
