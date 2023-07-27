<?php 
    include '../../koneksi.php';
    include 'headerkelolamaster.php';
    $id= '';
    $namaseller = '';
    $notelp = '';
    $keterangan = '';


    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];
        
        $query = "SELECT * FROM master_seller WHERE id = '$id';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namaseller = $result['nama_seller'];
        $notelp = $result['notelp'];
        $keterangan = $result['keterangan'];



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
      <p>Silahkan masukkan nama seller</p>
      
      <form method="POST" action="updateseller.php">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <label for="nama_seller">Nama Seller:</label>
        <input type="text" id="nama_seller" name="nama_seller" value="<?php echo $namaseller; ?>" required>

        <label for="notelp">No Telp:</label>
        <input type="text" id="notelp" name="notelp" value="<?php echo $notelp; ?>" >

        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>">
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
