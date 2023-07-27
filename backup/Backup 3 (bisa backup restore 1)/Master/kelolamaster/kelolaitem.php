<?php 
    include '../../koneksi.php';
    include 'headerkelolamaster.php';
    $id_item = '';
    $namaitem = '';
    $kodeitem = '';
    $kategori_item = '';
    $satuan_item = '';
    $kode_supplier_item = '';
    $harga_beli_terakhir_item = '';


    if(isset($_GET['ubah'])){
        $id_item = $_GET['ubah'];
        
        $query = "SELECT * FROM master_item WHERE id_item = '$id_item';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $namaitem = $result['nama_item'];
        $kodeitem = $result['kode_item'];
        $kategori_item = $result['kategori_item'];
        $satuan_item = $result['satuan_item'];
        $kode_supplier_item = $result['kode_supplier_item'];
        $harga_beli_terakhir_item = $result['harga_beli_terakhir_item'];



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

  
  <div class="container">
    <div class="content">
    <h2>Edit</h2>
      <p>Silahkan masukkan nama item</p>
      
      <form method="POST" action="updateitem.php">
      <input type="hidden" name="id_item" value="<?php echo $id_item; ?>">
  <label for="namaitem">Nama Item:</label>
  <input type="text" id="namaitem" name="namaitem" value="<?php echo $namaitem; ?>"required>

  <label for="kodeitem">Kode Item:</label>
  <input type="text" id="kodeitem" name="kodeitem" value="<?php echo $kodeitem; ?>"required>
  
  <label for="Satuan">Satuan:</label>
  <select id="Satuan" name="Satuan" value="<?php echo $satuan_item; ?>"required>
    <?php
        while ($result5 = mysqli_fetch_assoc($sql5)) {
            $optionValue = $result5['id_satuan'];
            $optionName = $result5['nama_satuan'];

            // Check if the current option matches the $satuan_item
            $selected = ($optionValue == $satuan_item) ? 'selected' : '';

            echo "<option value='$optionValue' $selected>$optionName</option>";
        }
    ?>
  </select>
  
  <label for="kategori">Kategori:</label>
  <select id="kategori" name="kategori" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql2)) {
        $optionValue = $result['id_kategori'];
        $optionName = $result['nama_kategori'];
        echo "<option value='$optionValue'>$optionName</option>";
      }
    ?>
  </select>

  <label for="supplier">Supplier:</label>
  <select id="supplier" name="supplier" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql3)) {
        $optionValue = $result['id_supplier'];
        $optionName = $result['nama_supplier'];
        $optionCode = $result['kode_supplier'];
        echo "<option value='$optionCode'>$optionCode - $optionName</option>";
      }
    ?>
  </select>

  <label for="harga_beli_terakhir_item">Harga Beli Terakhir Item:</label>
  <input type="text" id="harga_beli_terakhir_item" name="harga_beli_terakhir_item" required>

  <button type="submit">Submit</button>
</form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>