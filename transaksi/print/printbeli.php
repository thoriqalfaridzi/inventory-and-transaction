<?php
include '../../koneksi.php';

$no = 0;
$total_harga_faktur =0;
?>
<style media="print">
    .print-button {
        display: none;
    }
</style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tansaksi</title>
    <link rel="stylesheet" href="print.css">

</head>
<body>
<div class="container">
    <div class="content">
    <!-- <img src="../../IconImage/dbjm.png"  class="logo-portrait"> -->
<h1>Laba Pembelian</h1>
<?php
        if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bulan = $_GET['bulan'] ?? date('n'); // Ambil nilai bulan dari parameter bulan pada URL
            $tahun = $_GET['tahun'] ?? date('Y'); // Ambil nilai tahun dari p
            
            $querytable = "SELECT DISTINCT nofaktur, tanggal, Supplier, status_bayar, jenis_bayar,  total_harga_beli_barang, metodebayarhutang FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal ;";
$sqltable = mysqli_query($conn, $querytable);
$no = 0;
$querybeli = "SELECT SUM(total_harga_beli_barang) AS total_harga_beli_barang FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resultbeli = mysqli_query($conn, $querybeli);
$totalPembelian = mysqli_fetch_assoc($resultbeli)['total_harga_beli_barang'];
            ?>


<button class="print-button" onclick="window.print()">Print</button>
<table id="printTable">
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>Tanggal transaksi</th>
        <th>Nomor Faktur</th>
        <th>Supplier</th>

        
        <th>Jenis Bayar</th>
        <th>Metode Bayar</th>
        <th>Harga Faktur</th>
        

    </tr>
    </thead>
    <tbody>
    <?php
    $previousNofaktur = '';
while ($resulttable = mysqli_fetch_assoc($sqltable)) {
    if ($resulttable['nofaktur'] !== $previousNofaktur) {
        $previousNofaktur = $resulttable['nofaktur'];

        $querysum = "SELECT SUM(total_harga_beli_barang) AS total FROM transaksibeli WHERE nofaktur = '$previousNofaktur'";
                $resultsum = mysqli_query($conn, $querysum);
                $rowsum = mysqli_fetch_assoc($resultsum);
                $totalsum = $rowsum['total'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="nofaktur"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaSupplier"><?php 
            $kodesupplier = $resulttable['Supplier'];
            $query2 = "SELECT * FROM master_supplier WHERE kode_supplier = '$kodesupplier'";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            
            echo $row2['nama_supplier'];?></td>

            
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['metodebayarhutang']; ?></td>

            <td ><?php echo number_format($totalsum,0,',','.'); ?></td>


        </tr>
        <?php
    }
}
?>
<tr>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;">Total Harga Pembelian</td>
    <td style="border-top: 1px solid #000000;"><?php
    echo number_format($totalPembelian,0,',','.');
}
    ?></td>
</tr>
    </tbody>
</table>
</html>