<?php
include '../../../koneksi.php';

$id_item = '';
$namaitem = '';
$kodeitem = '';
$kategori_item = '';
$satuan_item = '';
$kode_supplier_item = '';
$harga_beli_terakhir_item = '';

if(isset($_GET['ubah'])){
    $id_item = $_GET['ubah'];
    
    $query = "SELECT * FROM transaksijual WHERE id = '$id_item';";
    $sql = mysqli_query($conn,$query);

    $result = mysqli_fetch_assoc($sql);

    $namaitem = $result['barang'];


    $kodeitem = $result['kode_item'];
    $harga_jual_terakhir_item = $result['harga_jual'];
    $hutang_terbayar = $result['hutang_terbayar'];
    $status_bayar = $result['status_bayar'];
    $kode_member_item = $result['Member'];

    

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
<header>
    <a href="#" class="logo">Logo</a>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li class="dropdown">
            <a href="#">Master</a>
            <div class="dropdown-content">
                <a href="../../../Master/MasterSatuan.php">Master Satuan</a>
                <a href="../../../Master/MasterItem.php">Master Item</a>
                <a href="../../../Master/MasterKategori.php">Master Kategori</a>
                <a href="../../../Master/MasterSupplier.php">Master Supplier</a>
                <a href="../../../Master/MasterMember.php">Master Member</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#" class="active">Transaksi</a>
            <div class="dropdown-content">
                <a href="../../beli.php">Pembelian</a>
                <a href="../../jual.php">Penjualan</a>
                <a href="../../laba.php">Laba</a>
                <a href="../../biayalain.php">Biaya Lain</a>
                <a href="../hutangbeli.php">Hutang Pembelian</a>
                <a href="../hutangjual.php">Hutang Penjualan</a>
            </div>
        </li>
        <li class="dropdown">
                    <a href="#">Inventory</a>
                        <div class="dropdown-content">
                              <a href="../inventory.php">Inventory</a>
                              <a href="../../retur/returbeli.php">Retur Pembelian</a>
                              <a href="../../retur/returjual.php">Retur Penjualan</a>

                          </div>
                          </li>
        <li><a href="../../../logout.php">Logout</a></li>
    </ul>
</header>
<h1>Add Stock to Inventory</h1>

<form method="POST" action="updatehutangjual.php">
      <input type="hidden" name="id_item" value="<?php echo $id_item; ?>">
  <label for="namaitem">Nama Item:</label>
  <input type="text" id="namaitem" name="namaitem" value="<?php echo $namaitem; ?>"required readonly>

  <label for="kodeitem">Kode Item:</label>
  <input type="text" id="kodeitem" name="kodeitem" value="<?php echo $kodeitem; ?>"required readonly>

  <label for="harga_jual_terakhir_item">Harga Jual:</label>
  <input type="text" id="harga_jual_terakhir_item" name="harga_jual_terakhir_item" value="<?php echo $harga_jual_terakhir_item; ?>"required readonly>

  <label for="hutang_terbayar">Hutang Terbayar:</label>
  <input type="text" id="hutang_terbayar" name="hutang_terbayar" value="<?php echo $hutang_terbayar; ?>" required>

  <label for="status_bayar">Status Bayar</label>
  <?php echo $status_bayar; ?>
    <br>
  <button type="submit">Submit</button>
</form>

</body>
</html>