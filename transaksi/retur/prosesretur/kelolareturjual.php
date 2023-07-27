<?php 
    include '../../../koneksi.php';
    include 'headerretur.php';
    $id = '';
    $barang = '';
    $jumlah = '';
    $keterangan = '';
    $member = '';
    $diganti = '';
    $nofaktur ='';



    if(isset($_GET['ubah'])){
        $id = $_GET['ubah'];
        
        $query = "SELECT * FROM retur_penjualan WHERE id = '$id';";
        $sql = mysqli_query($conn,$query);

        $result = mysqli_fetch_assoc($sql);

        $barang = $result['barang'];
        $jumlah = $result['jumlah'];
        $keterangan = $result['keterangan'];
        $nofaktur = $result['nofaktur'];
        $defaultMember = $result['member'];
        $defaultDiganti = $result['diganti'];
        $query5 = "SELECT * FROM master_member;";
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
  <link rel="stylesheet" href="../../../CSS/styles.css">
</head>
<body>
  
  <div class="container">
    <div class="content">
    <h2>Edit</h2>
      <p>Silahkan masukkan</p>
      
      <form method="POST" action="updatereturjual.php">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <label for="barang">Barang:</label>
        <input type="text" id="barang" name="barang" value="<?php echo $barang; ?>" required>

        <label for="jumlah">Jumlah:</label>
        <input type="text" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" required>

        <label for="keterangan">keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" required>

        <label for="member">Member:</label>
        <select id="member" name="member" value="<?php echo $member; ?>"required>
            <?php
            while ($result5 = mysqli_fetch_assoc($sql5)) {
            $optionValue = $result5['id_member'];
            $optionName = $result5['nama_member'];

            // Tambahkan kondisi selected jika nilai sama dengan defaultSupplier
            $selected = ($optionName == $defaultMember) ? "selected" : "";

            echo "<option value='$optionName' $selected>$optionName</option>";
            }
            ?>
        </select>

        <label for="diganti">Diganti:</label>
        <select id="diganti" name="diganti" required>
            <option value="Sudah" <?php if ($defaultDiganti == 'Sudah') echo 'selected'; ?>>Sudah</option>
            <option value="Belum" <?php if ($defaultDiganti == 'Belum') echo 'selected'; ?>>Belum</option>
        </select>
        
        <label for="nofaktur">No Faktur:</label>
        <input type="text" name="nofaktur" value="<?php echo $nofaktur; ?>"required>
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
