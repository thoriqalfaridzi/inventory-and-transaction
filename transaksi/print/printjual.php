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
<h1>Laba Penjualan</h1>
<?php
        if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $bulan = $_GET['bulan'] ?? date('n'); // Ambil nilai bulan dari parameter bulan pada URL
            $tahun = $_GET['tahun'] ?? date('Y'); // Ambil nilai tahun dari p
            
            $querytable = "SELECT DISTINCT nofaktur, tanggal, Member, status_bayar, jenis_bayar, seller, total_harga_jual_barang, metodebayarhutang FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal ;";
$sqltable = mysqli_query($conn, $querytable);
$no = 0;
$queryjual = "SELECT SUM(total_harga_jual_barang) AS total_harga_jual_barang FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resultjual = mysqli_query($conn, $queryjual);
$totalPenjualan = mysqli_fetch_assoc($resultjual)['total_harga_jual_barang'];
            ?>


<button class="print-button" onclick="window.print()">Print</button>
<table id="printTable">
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>Tanggal transaksi</th>
        <th>Nomor Faktur</th>
        <th>Member</th>

        
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

        $querysum = "SELECT SUM(total_harga_jual_barang) AS total FROM transaksijual WHERE nofaktur = '$previousNofaktur'";
                $resultsum = mysqli_query($conn, $querysum);
                $rowsum = mysqli_fetch_assoc($resultsum);
                $totalsum = $rowsum['total'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="nofaktur"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaSupplier"><?php 
            $kodemember = $resulttable['Member'];
            $query2 = "SELECT * FROM master_member WHERE kode_member = '$kodemember'";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            
            echo $row2['nama_member'];?></td>

            
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
    <td style="border-top: 1px solid #000000;">Total Harga Penjualan</td>
    <td style="border-top: 1px solid #000000;"><?php
    echo number_format($totalPenjualan,0,',','.');
}
    ?></td>
</tr>
    </tbody>
</table>
</html>