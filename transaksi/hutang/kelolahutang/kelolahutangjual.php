<?php
include '../../../koneksi.php';
include 'headerkelola.php';
$id_item = '';
$namaitem = '';
$kodeitem = '';
$kategori_item = '';
$satuan_item = '';
$kode_supplier_item = '';
$harga_beli_terakhir_item = '';
$nofaktur = '';
$metodebayarhutang = '';
$tanggal ='';

if(isset($_GET['ubah'])){
    $nofaktur = $_GET['ubah'];
    
    $query = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur';";
    $sql = mysqli_query($conn,$query);

    $result = mysqli_fetch_assoc($sql);

    $namaitem = $result['barang'];
    $kodeitem = $result['kode_item'];
    $harga_jual_terakhir_item = $result['harga_jual'];
    $hutang_terbayar = $result['hutang_terbayar'];
    $status_bayar = $result['status_bayar'];
    $kode_member_item = $result['Member'];
    $metodebayarhutang = $result['metodebayarhutang'];
    $tanggal = $result['tanggal'];
    $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));


    $querysum = "SELECT SUM(total_harga_jual_barang) AS total FROM transaksijual WHERE nofaktur = '$nofaktur'";
    $resultsum = mysqli_query($conn, $querysum);
    $rowsum = mysqli_fetch_assoc($resultsum);
    $totalhargafaktur = $rowsum['total'];

    //var_dump($result);

    //die();
}

session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../../../login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../../../CSS/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Triggered when the search input changes
            $('#searchInput').on('input', function () {
                var searchQuery = $(this).val().toLowerCase();

                // Hide rows that don't match the search query
                $('table tbody tr').each(function () {
                    var namaBarang = $(this).find('.namaBarang').text().toLowerCase();
                    if (namaBarang.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        $(document).ready(function () {
            // Triggered when the search input changes
            $('#searchInputsupplier').on('input', function () {
                var searchQuery = $(this).val().toLowerCase();

                // Hide rows that don't match the search query
                $('table tbody tr').each(function () {
                    var namaBarang = $(this).find('.namaSupplier').text().toLowerCase();
                    if (namaBarang.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

    </script>
</head>
<body>

<h1>Add Stock to Inventory</h1>

<form method="POST" action="updatehutangjual.php">
      <input type="hidden" name="$nofaktur" value="<?php echo $nofaktur; ?>">
  <label for="nofaktur">No Faktur:</label>
  <input type="text" id="nofaktur" name="nofaktur" value="<?php echo $nofaktur; ?>"required readonly>

  <!-- <label for="kodeitem">Kode Item:</label>
  <input type="text" id="kodeitem" name="kodeitem" value="<?php echo $kodeitem; ?>"required readonly> -->

  <!-- <label for="harga_beli_terakhir_item">Harga Beli:</label>
  <input type="text" id="harga_beli_terakhir_item" name="harga_beli_terakhir_item" value="<?php echo $harga_beli_terakhir_item; ?>"required readonly> -->
  
  <label for="totalhargafaktur">Total Harga Faktur:</label>
  <input type="text" id="totalhargafaktur" name="totalhargafaktur" value="<?php echo $totalhargafaktur; ?>" required readonly>

  <label for="hutang_terbayar">Hutang Terbayar:</label>
  <input type="text" id="hutang_terbayar" name="hutang_terbayar" value="<?php echo $hutang_terbayar; ?>" required>

  <label for="metodebayarhutang">Metode Pembayaran:</label>
            <input type="radio" id="cash" name="metodebayarhutang" value="cash" <?php if ($metodebayarhutang === 'cash') echo 'checked'; ?>>
            <label for="cash">Cash</label>

            <input type="radio" id="debit" name="metodebayarhutang" value="debit" <?php if ($metodebayarhutang === 'debit') echo 'checked'; ?>>
            <label for="debit">Debit</label>

            <input type="radio" id="transfer" name="metodebayarhutang" value="transfer" <?php if ($metodebayarhutang === 'transfer') echo 'checked'; ?>>
            <label for="transfer">Transfer</label>

  <label for="status_bayar">Status Bayar</label>
  <?php echo $status_bayar; ?>
    <br>
  <button type="submit">Submit</button>
</form>

</body>
</html>