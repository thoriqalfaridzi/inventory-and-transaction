<?php
include '../koneksi.php';
include 'headertransaksi.php';
$no = 0;
session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../login.php");
    exit();
}

$bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
$tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang

$querybeli = "SELECT * FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal;";
$sqlbeli = mysqli_query($conn, $querybeli);

$querytotalbeli = "SELECT SUM(harga_beli) AS total_harga_beli FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resulttotalbeli = mysqli_query($conn, $querytotalbeli);
$totalPembelian = mysqli_fetch_assoc($resulttotalbeli)['total_harga_beli'];

$queryjual = "SELECT * FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal;";
$sqljual = mysqli_query($conn, $queryjual);

$queryjual = "SELECT SUM(harga_jual) AS total_harga_jual FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resultjual = mysqli_query($conn, $queryjual);
$totalPenjualan = mysqli_fetch_assoc($resultjual)['total_harga_jual'];



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


<div class="container">
    <div class="content">
        <h2>Inventory</h2>

        <form method="POST" action="">
            <label for="bulan">Bulan:</label>
            <select name="bulan" id="bulan">
            <option value="1" <?php if ($bulan == 1) echo 'selected'; ?>>Januari</option>
                <option value="2" <?php if ($bulan == 2) echo 'selected'; ?>>Februari</option>
                <option value="3" <?php if ($bulan == 3) echo 'selected'; ?>>Maret</option>
                <option value="4" <?php if ($bulan == 4) echo 'selected'; ?>>April</option>
                <option value="5" <?php if ($bulan == 5) echo 'selected'; ?>>Mei</option>
                <option value="6" <?php if ($bulan == 6) echo 'selected'; ?>>Juni</option>
                <option value="7" <?php if ($bulan == 7) echo 'selected'; ?>>Juli</option>
                <option value="8" <?php if ($bulan == 8) echo 'selected'; ?>>Agustus</option>
                <option value="9" <?php if ($bulan == 9) echo 'selected'; ?>>September</option>
                <option value="10" <?php if ($bulan == 10) echo 'selected'; ?>>Oktober</option>
                <option value="11" <?php if ($bulan == 11) echo 'selected'; ?>>November</option>
                <option value="12" <?php if ($bulan == 12) echo 'selected'; ?>>Desember</option>
                <!-- Tambahkan opsi bulan lainnya -->
            </select>
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" id="tahun" min="2000" max="2099" value="<?php echo $tahun; ?>">
            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <table>
        <thead>
        <tr>
            <th style="width: 40px;">No</th>
            <th>Tanggal</th>
            <th>No. Faktur</th>
            <th>Nama Barang</th>
            <th>Kode Item</th>
            <!-- <th>JumlahBeli</th> -->
            <th>Satuan</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($resultbeli = mysqli_fetch_assoc($sqlbeli)) {
            $resultjual = mysqli_fetch_assoc($sqljual); // Ambil data transaksi penjualan yang sesuai dengan data transaksi pembelian

            ?>
            <tr>
                <td><?php echo ++$no; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['tanggal']; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['nofaktur']; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['Barang']; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['kode_item']; ?></td>
                <!-- <td class="namaBarang"><?php echo $resultbeli['quantity']; ?></td> -->
                <td class="namaBarang"><?php echo $resultbeli['satuan']; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['kategori']; ?></td>
                <td class="namaBarang"><?php echo $resultbeli['harga_beli']; ?></td>
                <td class="namaBarang"><?php echo isset($resultjual['harga_jual']) ? $resultjual['harga_jual'] : '-'; ?></td>

                <td style="text-align: center;">
                    <!-- ... Tombol edit dan hapus ... -->
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<?php 
// Mengambil bulan dan tahun saat ini


$queryBiayaLain = "SELECT * FROM biaya_lain WHERE bulan='$bulan' AND tahun='$tahun'";
$resultBiayaLain = mysqli_query($conn, $queryBiayaLain);

if ($resultBiayaLain && mysqli_num_rows($resultBiayaLain) > 0) {
    $row = mysqli_fetch_assoc($resultBiayaLain);
    $biayaLain = $row['biayalain'];
    $totalbiayaLain = $row['biayalain'];

    $querybiaya = "SELECT SUM(biayalain) AS total_harga_biaya FROM biaya_lain 
    WHERE bulan='$bulan' AND tahun='$tahun'";
    $resultbiaya = mysqli_query($conn, $querybiaya);
    $totalbiaya = mysqli_fetch_assoc($resultbiaya)['total_harga_biaya'];
} else {
    $biayaLain = 0;
}

// Menghitung laba bersih
$labaBersih = $totalPenjualan - $totalPembelian - $totalbiaya;

// ...

// Menampilkan hasil
echo "Total Pembelian = " . $totalPembelian . "<br>";
echo "Total Penjualan = " . $totalPenjualan . "<br>";
echo "Biaya Lain-Lain = " . $totalbiaya . "<br>";
echo "Laba Bersih = " . $labaBersih;

?>


<footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
</footer>

</body>
</html>
