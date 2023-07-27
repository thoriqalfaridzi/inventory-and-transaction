<?php 
    include '../../koneksi.php';
    include 'headerkelolamaster.php';
    $id_satuan = '';
    $namasatuan = '';


    if(isset($_GET['ubah'])){
        $id_satuan = $_GET['ubah'];
        
        $query = "SELECT * FROM master_satuan WHERE id_satuan = '$id_satuan';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namasatuan = $result['nama_satuan'];



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
      <p>Silahkan masukkan nama satuan</p>
      
      <form method="POST" action="updatesatuan.php">
        <input type="hidden" value="<?php echo $id_satuan;?>" name="id_satuan">
        <label for="nama_satuan">Nama Satuan:</label>
        <input type="text" id="nama_satuan" name="nama_satuan" value="<?php echo $namasatuan; ?>" required>
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
