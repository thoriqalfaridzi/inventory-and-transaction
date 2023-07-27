<?php 
    include '../../koneksi.php';
    $id_member = '';
    $namamember = '';
    $alamatmember = '';
    $contactpersonmember = '';
    $notelpmember = '';
    $nohpmember = '';
    $kodemember = '';

    if(isset($_GET['ubah'])){
        $id_member = $_GET['ubah'];
        
        $query = "SELECT * FROM master_member WHERE id_member = '$id_member';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namamember = $result['nama_member'];
        $kodemember = $result['kode_member'];
        $alamatmember = $result['alamat_member'];
        $contactpersonmember = $result['contactperson_member'];
        $notelpmember = $result['no_telp_member'];
        $nohpmember = $result['no_hp_member'];
        $keterangan = $result['keterangan_member'];



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
      
      <form method="POST" action="updatemember.php">
        <input type="hidden" value="<?php echo $id_member;?>" name="id_member">
        <label for="nama_member">Nama Member:</label>
        <input type="text" id="nama_member" name="nama_member" value="<?php echo $namamember; ?>" required>

        <label for="kodemember">Kode member:</label>
        <input type="text" id="kodemember" name="kodemember" value="<?php echo $kodemember; ?>"required>
       

        <label for="alamatmember">Alamat member:</label>
        <input type="text" id="alamatmember" name="alamatmember" value="<?php echo $alamatmember; ?>" required>

        <label for="contactperson">Contact Person:</label>
        <input type="text" id="contactperson" name="contactperson" value="<?php echo $contactpersonmember; ?>" required>

        <label for="notelp">No Telp:</label>
        <input type="text" id="notelp" name="notelp" value="<?php echo $notelpmember; ?>" required>

        <label for="nohp">No HP:</label>
        <input type="text" id="nohp" name="nohp" value="<?php echo $nohpmember; ?>">

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
