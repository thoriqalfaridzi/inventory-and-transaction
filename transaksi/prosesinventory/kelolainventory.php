<?php 
    include '../../koneksi.php';
    $id_item = '';
    $namaitem = '';
    $kodeitem = '';
    $kategori_item = '';
    $satuan_item = '';
    $kode_supplier_item = '';
    $harga_beli_terakhir_item = '';
    $quantity = '';


    if(isset($_GET['ubah'])){
        $id_item = $_GET['ubah'];
        
        $query = "SELECT * FROM inventory WHERE id_item = '$id_item';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namaitem = $result['item_name'];
        $kodeitem = $result['kode_item'];
        $kategori_item = $result['kategori'];
        $satuan_item = $result['satuan'];
        $kode_supplier_item = $result['kode_supplier_item'];
        //$harga_beli_terakhir_item = $result['harga_beli_terakhir_item'];
        $quantity = $result['quantity'];



        $query2 = "SELECT * FROM master_kategori;";
        $sql2 = mysqli_query($conn, $query2);
    
        $query3 = "SELECT * FROM master_supplier;";
        $sql3 = mysqli_query($conn, $query3);
    
        $query4 = "SELECT * FROM master_item;";
        $sql4 = mysqli_query($conn, $query4);

        $query5 = "SELECT * FROM master_satuan;";
        $sql5 = mysqli_query($conn, $query5);
        

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
<header>
            <a href="#" class="logo">Logo</a>
            <ul>
                <li><a href="../../index.php" >Home</a></li>
                <li class="dropdown">
                    <a href="#" class="active">Master</a>
                          <div class="dropdown-content">
                              <a href="../MasterSatuan.php">Master Satuan</a>
                              <a href="../MasterItem.php">Master Item</a>
                              <a href="../MasterKategori.php">Master Kategori</a>
                              <a href="../MasterSupplier.php">Master Supplier</a>
                              <a href="../MasterMember.php">Master Member</a>
                          </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Transaksi</a>
                          <div class="dropdown-content">
                              <a href="#">Pembelian</a>
                              <a href="#">Penjualan</a>
                          </div>
                </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </header>
  
  <div class="container">
    <div class="content">
    <h2>Edit</h2>
      <p>Silahkan Masukkan jumlah yang ingin diedit pada item ini</p>
      
      <form method="POST" action="updateinventory.php">
      <input type="hidden" name="id_item" value="<?php echo $id_item; ?>">
  <label for="namaitem">Nama Item:</label>
  <input type="text" id="namaitem" name="namaitem" value="<?php echo $namaitem; ?>"readonly required>

  <label for="kodeitem">Kode Item:</label>
  <input type="text" id="kodeitem" name="kodeitem" value="<?php echo $kodeitem; ?>"readonly required>
  
  <label for="Satuan">Satuan:</label>
  <input type="text" name="Satuan" value="<?php echo $satuan_item; ?>"readonly required>
    
  
  <label for="kategori">Kategori:</label>
  <input type="text" name="kategori" value="<?php echo $kategori_item; ?>"readonly required>
    

  <label for="supplier">Supplier:</label>
  <input type="text" id="supplier" value="<?php echo $kode_supplier_item; ?>"name="supplier" readonly required>

  <label for="quantity">Quantity:</label>
  <input type="text" id="quantity" value="<?php echo $quantity; ?>"name="quantity" required>
    

  

  <button type="submit">Submit</button>
</form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>