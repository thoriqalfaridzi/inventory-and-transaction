<?php
include '../koneksi.php';
include 'headertransaksi.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
$tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang
$querytable = "SELECT * FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal $orderClause;";
$sqltable = mysqli_query($conn, $querytable);

$no = 0;

session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../login.php");
    exit();
}

// Fungsi untuk melakukan backup data
function backupData($conn)
{
    // Query untuk mengambil data dari tabel
    $query = "SELECT * FROM transaksibeli";
    $result = mysqli_query($conn, $query);

    // Membuka file untuk menulis
    $file = fopen("backup.txt", "w");

    // Menulis data ke file
    while ($row = mysqli_fetch_assoc($result)) {
        $line = implode("\t", $row); // Menggabungkan data dalam satu baris, dipisahkan dengan tab
        fwrite($file, $line . "\n"); // Menulis baris ke file
    }

    // Menutup file
    fclose($file);

    // Menampilkan pesan berhasil
    echo "Backup data berhasil disimpan.";
}

// Fungsi untuk melakukan restore data
function restoreData($conn)
{
    // Membuka file untuk dibaca
    $file = fopen("backup.txt", "r");

    // Menghapus semua data dari tabel
    //$queryDelete = "TRUNCATE TABLE transaksibeli";
    //mysqli_query($conn, $queryDelete);

    // Memasukkan data dari file ke tabel
    while (($line = fgets($file)) !== false) {
        $line = fgets($file); // Membaca baris dari file
        $data = explode("\t", trim($line));

        // Insert data ke tabel
        $queryInsert = "INSERT INTO transaksibeli (id, tanggal, nofaktur, Barang, Supplier, quantity, harga_beli, jenis_bayar, status_bayar, hutang_terbayar, kode_item, satuan, kategori)
                VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[11]', '$data[12]')";

        mysqli_query($conn, $queryInsert);
    }

    // Menutup file
    fclose($file);

    // Menampilkan pesan berhasil
    echo "Data berhasil direstore.";
}

// Check if the backup button is clicked
if (isset($_POST['backup'])) {
    backupData($conn);
    header('Location: beli.php');
}

// Check if the restore button is clicked
if (isset($_POST['restore'])) {
    restoreData($conn);
    header('Location: beli.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <style>

</style>
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
            window.print();
        }
    </script>
</head>
<body>
<div class="container">
    <div class="content">
<h1>Add Stock to Inventory</h1>

<button id="expandButton" class="expand-button">Tambahkan Transaksi Beli</button>
<div id="formSection">
    <form method="post" action="prosesbeli.php">
        <label for="nama_item">Item Name:</label>
        <select name="nama_item" required>
            <?php
            // Retrieve item names from master_item
            $sql = "SELECT * FROM master_item";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $itemName = $row["nama_item"];
                    $itemCode = $row["kode_item"];
                    echo "<option value='$itemName'>$itemCode-$itemName </option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="faktur">Nomor Faktur:</label>
        <input type="text" name="faktur" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required>
        <br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required>
        <br>
        <label for="harga_beli">Harga Beli:</label>
        <input type="number" name="harga_beli" required>
        <br>
        <label for="jenis_bayar">Jenis Bayar:</label>
        <select name="jenis_bayar" id="jenis_bayar" required>
                    <option value="Cash" >Cash</option>
                    <option value="Hutang" >Hutang</option>
                </select>
        <br>
        <label for="hutangterbayar">Hutang yang sudah dibayar (opsional):</label>
        <input type="number" name="hutangterbayar">
        <br>
        <input type="submit" value="Add Stock">
    </form>
</div>

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
        
<button onclick="printTable()">Print</button>
<button onclick="printPage()">Cetak</button>
<input type="text" id="searchInput" placeholder="Search by Item" />
<input type="text" id="searchInputsupplier" placeholder="Search by Supplier" />
<input type="text" id="searchInputfaktur" placeholder="Search by Faktur" />
<table id="printTable">
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
        <th>Hapus</th>

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

            <td style="text-align: center;" class="no-print">
                <!-- <a href="kelolabeli.php?ubah=<?php echo $resulttable['id']; ?>" type="button"
                   style="text-decoration: none;">
                    <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
                </a> -->

                <a href="prosesbeli.php?hapus=<?php echo $resulttable['id']; ?>" type="button"
                   onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi <?php echo $resulttable['Barang']; ?> dengan monor faktur <?php echo $resulttable['nofaktur']; ?> tersebut???')"
                   style="text-decoration: none;">
                    <img src="../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
                </a>
            </td>

        </tr>

        <?php
    }
    ?>

    </tbody>
</table>
<h1>Backup & Restore Data</h1>

<!-- <form method="post" action="">
    <input type="submit" name="backup" value="Backup Data">
    <input type="submit" name="restore" value="Restore Data">
</form> -->
<a href="../backuprestore/backup.php" type="button">
                    Backup
                </a>
<!-- <a href="../backuprestore/restore.php" type="button">
                    Restore
                </a> -->
    <form method="POST" enctype="multipart/form-data" action="../backuprestore/restore.php">
        <input type="file" name="sql_file" accept=".sql">
        <br><br>
        <button type="submit" name="restore">Restore</button>
    </form>

</div>
</div>
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

    function printTable() {
        var table = document.getElementById('printTable');
        var newWin = window.open('', 'Print', 'height=500,width=600');

        newWin.document.write('<html><head><title>Print</title></head><body>');
        newWin.document.write(table.outerHTML);
        newWin.document.write('</body></html>');

        newWin.print();
        newWin.close();
    }


            function printPage() {
             window.open('print/printbeli.php');
             
            }
    
    
</script>
</body>
</html>
