<?php
include '../../koneksi.php';
include 'headerhutang.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$querytable = "SELECT * FROM transaksibeli WHERE jenis_bayar = 'Hutang' ORDER BY tanggal $orderClause;";
$sqltable = mysqli_query($conn, $querytable);

$no = 0;

session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../../login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../../CSS/styles.css">
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

        function printTable() {
            window.print();
        }
    </script>
</head>
<body>



<div class="container">
    <div class="content">
    <h1>Daftar Hutang Pembelian Supplier</h1>
<input type="text" id="searchInput" placeholder="Search by Item" />
<input type="text" id="searchInputsupplier" placeholder="Search by Supplier" />
<table>
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>
            <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"
               style="color: inherit;text-decoration: none;">
                Tanggal transaksi
                <span class="sort-icon"><?php echo $sortIcon; ?></span>
            </a>
        </th>
        <th>Nomor Faktur</th>
        <th>Nama Barang</th>
        <th>Kode Barang</th>
        <th>Supplier</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jenis Bayar</th>
        <th>Status Bayar</th>
        <th>Hutang Terbayar</th>
        <th>Hutang Belum Terbayar</th>
        <th>Bayar</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($resulttable = mysqli_fetch_assoc($sqltable)) {
        // Menghitung nilai hutang_belum_terbayar
    $hutang_belum_terbayar = $resulttable['harga_beli'] - $resulttable['hutang_terbayar'];
    
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td ><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaBarang"><?php echo $resulttable['Barang']; ?></td>
            <td ><?php echo $resulttable['kode_item']; ?></td>
            <td class="namaSupplier"><?php echo $resulttable['Supplier']; ?></td>
            <td >Rp.<?php echo $resulttable['harga_beli']; ?></td>
            <td ><?php echo $resulttable['quantity']; ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>
            <td >Rp.<?php echo $resulttable['hutang_terbayar']; ?></td>
            <td >Rp.<?php echo $hutang_belum_terbayar; ?></td>

            <td style="text-align: center;" class="no-print">
                <a href="kelolahutang/kelolahutangbeli.php?ubah=<?php echo $resulttable['id']; ?>" type="button"
                   style="text-decoration: none;">
                    <img src="../../IconImage/editimg.png" style="width: 20px; height: 20px;">
                </a> 

                <!-- <a href="prosesbeli.php?hapus=<?php echo $resulttable['id']; ?>" type="button"
                   onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi <?php echo $resulttable['Barang']; ?> dengan monor faktur <?php echo $resulttable['nofaktur']; ?> tersebut???')"
                   style="text-decoration: none;">
                    <img src="../../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
                </a> -->
            </td>

        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
</div>
</div>
<footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var expandButton = document.getElementById('expandButton');
        var formSection = document.getElementById('formSection');

        formSection.style.display = 'none'; // Hide the form section initially
        expandButton.textContent = 'Tambahkan Transaksi Beli'; // Set the initial button text

        expandButton.addEventListener('click', function () {
            if (formSection.style.display === 'none') {
                formSection.style.display = 'block';
                expandButton.textContent = 'Batal'; // Update button text when expanded
            } else {
                formSection.style.display = 'none';
                expandButton.textContent = 'Tambahkan Transaksi Beli'; // Update button text when collapsed
            }
        });
    });





    
    
</script>
</body>
</html>