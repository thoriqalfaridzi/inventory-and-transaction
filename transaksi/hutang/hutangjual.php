<?php
include '../../koneksi.php';
include 'headerhutang.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
$bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
$tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
//$querytable = "SELECT * FROM transaksijual WHERE jenis_bayar = 'Hutang' ORDER BY tanggal $orderClause;";
$querytable = "SELECT DISTINCT nofaktur  , tanggal, jatuhtempo, metodebayarhutang, Member, seller, status_bayar, jenis_bayar, hutang_terbayar, total_harga_jual_barang FROM transaksijual WHERE jenis_bayar = 'Hutang' ORDER BY tanggal $orderClause;";
$sqltable = mysqli_query($conn, $querytable);

$querytable2 = "SELECT DISTINCT nofaktur  , tanggal, jatuhtempo, metodebayarhutang, Member, seller, status_bayar, jenis_bayar, hutang_terbayar, total_harga_jual_barang FROM transaksijual WHERE jenis_bayar = 'Hutang' ORDER BY tanggal $orderClause;";
$sqltable2 = mysqli_query($conn, $querytable2);

$no = 0;

$previousNofaktur = '';
$previousNofaktur2 = '';

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
            $('#searchInputMember').on('input', function () {
                var searchQuery = $(this).val().toLowerCase();

                // Hide rows that don't match the search query
                $('table tbody tr').each(function () {
                    var namaBarang = $(this).find('.namaMember').text().toLowerCase();
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
    <h1>Daftar Hutang Member Penjualan</h1>
    <button id="expandButton" class="expand-button">Deadline</button>
      <div id="deadline"> 
            <table>
                <tr>
                <th class="thdead">No faktur</th>
                <th class="thdead">Member</th>
                <th class="thdead">Jumlah Hutang</th>
                <th class="thdead">Sisa Hari</th>
                </tr>

               <?php 
                 while ($resulttable2 = mysqli_fetch_assoc($sqltable2)) {
                      if ($resulttable2['nofaktur'] !== $previousNofaktur2) {
                          if ($resulttable2['jenis_bayar'] == 'Hutang'){
                              $previousNofaktur2 = $resulttable2['nofaktur'];
                          // Tambahkan nilai total_harga_jual_barang ke totalhargafaktur
                          $querysum2 = "SELECT SUM(total_harga_jual_barang) AS total2 FROM transaksijual WHERE nofaktur = '$previousNofaktur2'";
                          $resultsum2 = mysqli_query($conn, $querysum2);
                          $rowsum2 = mysqli_fetch_assoc($resultsum2);
                          $totalsum2 = $rowsum2['total2'];
                          // Menghitung nilai hutang_belum_terbayar
                          $hutang_belum_terbayar2 = $totalsum2 - $resulttable2['hutang_terbayar'];
                          $tanggalSekarang = date('Y-m-d');
                          $selisihHari2 = floor((strtotime($resulttable2['jatuhtempo']) - strtotime($tanggalSekarang)) / (60 * 60 * 24));
    
                              if ($selisihHari2 <= 20 ){
                      ?>
                            <tr>
                                <td class="thdead"><?php echo $resulttable2['nofaktur']; ?></td>
                                <td class="thdead"><?php echo $resulttable2['Member']; ?></td>
                                <td class="thdead">Rp.<?php echo $hutang_belum_terbayar2; ?></td>
                                <td class="thdead"><?php echo $selisihHari2; ?></td>
              
                            </tr>
                  <?php
                              }
                          }
                      }
                  }
    ?>
                
            </table>
            
      </div>

<input type="text" id="searchInput" placeholder="Cari Berdasarkan Faktur..." />
<input type="text" id="searchInputMember" placeholder="Cari Berdasarkan Member..." />
<table>
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>
            <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"
               style="color: inherit;text-decoration: none;">
                Tanggal Transaksi
                <span class="sort-icon"><?php echo $sortIcon; ?></span>
            </a>
        </th>
        <th>Nomor Faktur</th>
        <th>Member</th>
        <th>Sales</th>
        <th>Harga</th>
        <th>Jenis Bayar</th>
        <th>Metode Bayar</th>
        <th>Status Bayar</th>
        <th>Hutang Terbayar</th>
        <th>Hutang Belum Terbayar</th>
        <th>Jatuh Tempo</th>
        <th>Hari sisa</th>
        <th>Bayar</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($resulttable = mysqli_fetch_assoc($sqltable)) {
        if ($resulttable['nofaktur'] !== $previousNofaktur) {
            $previousNofaktur = $resulttable['nofaktur'];

                    $querysum = "SELECT SUM(total_harga_jual_barang) AS total FROM transaksijual WHERE nofaktur = '$previousNofaktur'";
                    $resultsum = mysqli_query($conn, $querysum);
                    $rowsum = mysqli_fetch_assoc($resultsum);
                    $totalsum = $rowsum['total'];
        // Menghitung nilai hutang_belum_terbayar
        $hutang_belum_terbayar = $totalsum - $resulttable['hutang_terbayar'];
        $tanggalSekarang = date('Y-m-d');
        $selisihHari = floor((strtotime($resulttable['jatuhtempo']) - strtotime($tanggalSekarang)) / (60 * 60 * 24));

        ?>
        <tr>
        <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="namaBarang"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaMember"><?php echo $resulttable['Member']; ?></td>
            <td><?php echo $resulttable['seller']; ?></td>
            <td >Rp.<?php echo number_format($totalsum,0,',','.'); ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['metodebayarhutang']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>
            <td >Rp.<?php echo number_format($resulttable['hutang_terbayar'],0,',','.'); ?></td>
            <td >Rp.<?php echo number_format($hutang_belum_terbayar,0,',','.'); ?></td>
            <td style="width: 100px;"><?php echo $resulttable['jatuhtempo']; ?></td>
            <td ><?php echo $selisihHari; ?></td>

            <td style="text-align: center;" class="no-print">
                <a href="kelolahutang/kelolahutangjual.php?ubah=<?php echo $resulttable['nofaktur']; ?>" type="button"
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
        var deadline = document.getElementById('deadline');

        deadline.style.display = 'none'; // Hide the form section initially

        <?php
        $query = "SELECT * FROM transaksijual WHERE jenis_bayar = 'Hutang'";
        $sqltable2 = mysqli_query($conn, $query);
        $rowCount = 0; // Variable to store the count of qualifying rows
        
        while ($resulttable2 = mysqli_fetch_assoc($sqltable2)) {
            if ($resulttable2['nofaktur'] !== $previousNofaktur2) {
                if ($resulttable2['jenis_bayar'] == 'Hutang') {
                    $previousNofaktur2 = $resulttable2['nofaktur'];
                    // Tambahkan nilai total_harga_jual_barang ke totalhargafaktur
                    $querysum2 = "SELECT SUM(total_harga_jual_barang) AS total FROM transaksijual WHERE nofaktur = '$previousNofaktur'";
                    $resultsum2 = mysqli_query($conn, $querysum2);
                    $rowsum2 = mysqli_fetch_assoc($resultsum2);
                    $totalsum2 = $rowsum2['total'];
                    // Menghitung nilai hutang_belum_terbayar
                    $hutang_belum_terbayar2 = $totalsum2 - $resulttable2['hutang_terbayar'];
                    $tanggalSekarang = date('Y-m-d');
                    $selisihHari2 = floor((strtotime($resulttable2['jatuhtempo']) - strtotime($tanggalSekarang)) / (60 * 60 * 24));

                    if ($selisihHari2 <= 20) {
                        $rowCount++;
                    }
                }
            }
        }
        ?>

        expandButton.textContent = 'Deadline (<?php echo $rowCount; ?>)'; // Set the initial button text

        expandButton.addEventListener('click', function () {
            if (deadline.style.display === 'none') {
                deadline.style.display = 'block';
                expandButton.textContent = 'Batal'; // Update button text when expanded
            } else {
                deadline.style.display = 'none';
                expandButton.textContent = 'Deadline (<?php echo $rowCount; ?>)'; // Update button text when collapsed
            }
        });
    });
</script>
</body>
</html>