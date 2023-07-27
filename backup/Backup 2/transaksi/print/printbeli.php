<?php
include '../../koneksi.php';

$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$querytable = "SELECT * FROM transaksibeli ORDER BY tanggal $orderClause;";
$sqltable = mysqli_query($conn, $querytable);

$no = 0;

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
    <!-- <link rel="stylesheet" href="../../CSS/styles.css"> -->

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

        $(document).ready(function () {
            // Triggered when the search input changes
            $('#searchInputfaktur').on('input', function () {
                var searchQuery = $(this).val().toLowerCase();

                // Hide rows that don't match the search query
                $('table tbody tr').each(function () {
                    var namaBarang = $(this).find('.nofaktur').text().toLowerCase();
                    if (namaBarang.includes(searchQuery)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });

        function printTable() {
            var divToPrint = document.getElementById('tableContainer').innerHTML;
            var h1ToPrint = document.getElementById('h1d').innerHTML;
            var newWindow = window.open('', '_blank');
            newWindow.document.write('<html><head><title>Print</title></head><body>'+ h1ToPrint + divToPrint + '</body></html>');
            newWindow.document.close();
            newWindow.print();
        }
    </script>
</head>
<body>

<h1 id="h1d">Riwayat Transaksi Pembelian</h1>

<button onclick="printTable()">Print</button>

<input type="text" id="searchInput" placeholder="Search by Item" />
<input type="text" id="searchInputsupplier" placeholder="Search by Supplier" />
<input type="text" id="searchInputfaktur" placeholder="Search by Faktur" />
<div id="tableContainer">
<table border="1" style="width: 100%">
    <thead>
    <tr>
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
</div>
<script>


    
    
    
</script>
</body>
</html>
