<?php
include '../koneksi.php';
include 'headertransaksi.php';
$id_item = '';
$namaitem = '';
$kodeitem = '';
$nofaktur = '';
$metodebayarhutang = '';
$tanggal ='';

if(isset($_GET['ubah'])){
    $nofaktur = $_GET['ubah'];
    
    $query = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur';";
    $sql = mysqli_query($conn,$query);

    $result = mysqli_fetch_assoc($sql);

    $diskon = $result['diskonfaktur'];
    $tanggal = $result['tanggal'];
    $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));

    $querysum = "SELECT SUM(total_harga_jual_barang) AS total FROM transaksijual WHERE nofaktur = '$nofaktur'";
    $resultsum = mysqli_query($conn, $querysum);
    $rowsum = mysqli_fetch_assoc($resultsum);
    $totalhargafaktur = $rowsum['total'];

}

session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../login.php");
    exit();
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
<h1>Add Stock to Inventory</h1>

<form method="POST" action="updatefakturjual.php">
      <input type="hidden" name="$nofaktur" value="<?php echo $nofaktur; ?>">
  <label for="nofaktur">No Faktur:</label>
  <input type="text" id="nofaktur" name="nofaktur" value="<?php echo $nofaktur; ?>"required readonly>

  <label for="totalhargafaktur">Total Harga Faktur:</label>
  <input type="text" id="totalhargafaktur" name="totalhargafaktur" value="<?php echo $totalhargafaktur; ?>" required readonly>

  <label for="diskon">Diskon:</label>
  <input type="text" id="diskon" name="diskon" value="<?php echo $diskon; ?>" required>

    <br>
  <button type="submit">Submit</button>
</form>

</body>
</html>