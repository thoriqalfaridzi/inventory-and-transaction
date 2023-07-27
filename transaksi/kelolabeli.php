<?php 
    include '../koneksi.php';
    include 'headertransaksi.php';
    $id = '';
    $quantity = '';
    $barang = '';


    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];
        
        $query = "SELECT * FROM transaksibeli WHERE id = '$id';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $quantity = $result['quantity'];
        $barang = $result['Barang'];



        //var_dump($result);

        //die();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

  
  <div class="container">
    <div class="content">
    <h2>Edit</h2>
      <p>Silahkan masukkan jumlah dari barang <?php echo $barang; ?> </p>
      
      <form method="POST" action="updatebeli.php">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <label for="quantity">quantity:</label>
        <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
