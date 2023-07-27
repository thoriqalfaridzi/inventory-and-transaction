<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>
 
	</center>
 
	<?php 
	include '../../koneksi.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $querytable = "SELECT * FROM transaksibeli ORDER BY tanggal $orderClause;";
    $sqltable = mysqli_query($conn, $querytable);
    $no = 0;
	?>
 
 <table border="1" style="width: 100%">
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>
                Tanggal transaksi
        </th>
        <th>Nomor Faktur</th>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Supplier</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jenis Bayar</th>
        <th>Status Bayar</th>
 

    </tr>
    </thead>
    <tbody>
    <?php
    while ($resulttable = mysqli_fetch_assoc($sqltable)) {
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="nofaktur"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaBarang"><?php echo $resulttable['Barang']; ?></td>
            <td ><?php echo $resulttable['kode_item']; ?></td>
            <td class="namaSupplier"><?php echo $resulttable['Supplier']; ?></td>
            <td ><?php echo $resulttable['harga_beli']; ?></td>
            <td ><?php echo $resulttable['quantity']; ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>

        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>