<?php 
    include '../../koneksi.php';
    include 'headerkelolamaster.php';
    $id_supplier = '';
    $namasupplier = '';
    $alamatsupplier = '';
    $contactpersonsupplier = '';
    $notelpsupplier = '';
    $nohpsupplier = '';
    $kodesupplier = '';


    if(isset($_GET['ubah'])){
        $id_supplier = $_GET['ubah'];
        
        $query = "SELECT * FROM master_supplier WHERE id_supplier = '$id_supplier';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namasupplier = $result['nama_supplier'];
        $kodesupplier = $result['kode_supplier'];
        $alamatsupplier = $result['alamat_supplier'];
        $contactpersonsupplier = $result['contactperson_supplier'];
        $notelpsupplier = $result['no_telp_supplier'];
        $nohpsupplier = $result['no_hp_supplier'];

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
      <p>Silahkan masukkan nama supplier</p>
      
      <form method="POST" action="updatesupplier.php">
        <input type="hidden" value="<?php echo $id_supplier;?>" name="id_supplier">
        <label for="nama_supplier">Nama Supplier:</label>
        <input type="text" id="nama_supplier" name="nama_supplier" value="<?php echo $namasupplier; ?>" required>

        <label for="kodesupplier">Kode supplier:</label>
        <input type="text" id="kodesupplier" name="kodesupplier" value="<?php echo $kodesupplier; ?>"required>
       

        <label for="alamatsupplier">Alamat supplier:</label>
        <input type="text" id="alamatsupplier" name="alamatsupplier" value="<?php echo $alamatsupplier; ?>" required>

        <label for="contactperson">Contact Person:</label>
        <input type="text" id="contactperson" name="contactperson" value="<?php echo $contactpersonsupplier; ?>" required>

        <label for="notelp">No Telp:</label>
        <input type="text" id="notelp" name="notelp" value="<?php echo $notelpsupplier; ?>" required>

        <label for="nohp">No HP:</label>
        <input type="text" id="nohp" name="nohp" value="<?php echo $nohpsupplier; ?>">
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
