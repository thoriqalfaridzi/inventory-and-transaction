<?php
include '../../koneksi.php';
$id = '';
$keterangan = '';
$bulan = '';
$tahun = '';
if(isset($_GET['ubah'])){
    $id = $_GET['ubah'];
    
    $query = "SELECT * FROM biaya_lain WHERE id = '$id';";
    $sql = mysqli_query($conn,$query);

    $result = mysqli_fetch_assoc($sql);

    $keterangan = $result['keterangan'];
    $biayalain = $result['biayalain'];
    $bulan = $result['bulan'];
    $tahun = $result['tahun'];
    $namaBulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );
    
    $namaBulanTerpilih = $namaBulan[$bulan];
    $waktu = $namaBulanTerpilih . ' ' . $tahun;

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
      <p>Silahkan edit biaya lain</p>
      
      <form method="POST" action="updatebiayalain.php">
        <input type="hidden" value="<?php echo $id;?>" name="id">
        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo $keterangan; ?>" required>

        <label for="Bulan">Bulan dan Tahun:</label>
        <input type="text" id="Bulan" name="Bulan" value="<?php echo $waktu; ?>" readonly>

        <label for="biayalain">Jumlah Rupiah:</label>
        <input type="text" id="biayalain" name="biayalain" value="<?php echo $biayalain; ?>" required>
        
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>