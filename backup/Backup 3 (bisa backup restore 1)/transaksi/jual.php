<?php
include '../koneksi.php';
include 'headertransaksi.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$querytable = "SELECT * FROM transaksijual ORDER BY tanggal $orderClause;";
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
    $query = "SELECT * FROM transaksijual";
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
    $queryDelete = "TRUNCATE TABLE transaksijual";
    mysqli_query($conn, $queryDelete);

    // Memasukkan data dari file ke tabel
    while (!feof($file)) {
        $line = fgets($file); // Membaca baris dari file
        $data = explode("\t", $line); // Memecah baris menjadi array

        // Insert data ke tabel
        $queryInsert = "INSERT INTO transaksijual (tanggal, nofaktur, barang, kode_item, harga_jual, quantity)
                        VALUES ('$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]')";
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
}

// Check if the restore button is clicked
if (isset($_POST['restore'])) {
    restoreData($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="../CSS/styles.css">
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
            $('#searchInputmember').on('input', function () {
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

    <h1>Sell Item from Inventory</h1>
    <a href="beli.php">beli</a>
    <a href="../index.php">index</a>
    <a href="inventory.php">Inventory</a>

    <button id="expandButton" class="expand-button">Tambahkan Transaksi Jual</button>
<div id="formSection">
    <form method="post" action="prosesjual.php">
        <label for="nama_item">Item Name:</label>
        <select name="nama_item" required>
            <?php
            // Retrieve item names from inventory
            $sql = "SELECT DISTINCT item_name FROM inventory";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $itemName = $row["item_name"];
                    echo "<option value='$itemName'>$itemName</option>";
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
        <label for="member">Nama Member:</label>
        <select name="member" required>
            <?php
            // Retrieve item names from inventory
            $sql7 = "SELECT * FROM master_member";
            $result7 = $conn->query($sql7);

            if ($result7->num_rows > 0) {
                while ($row = $result7->fetch_assoc()) {
                    $itemName = $row["nama_member"];
                    $itemKode = $row["kode_member"];
                    echo "<option value='$itemName'>$itemKode - $itemName</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="harga_jual">Harga Jual:</label>
        <input type="number" name="harga_jual" required>
        <br>
        <label for="jenis_bayar">Jenis Bayar:</label>
        <select name="jenis_bayar" id="jenis_bayar" required>
                    <option value="Cash" >Cash</option>
                    <option value="Hutang" >Hutang</option>
                </select>
        <br> 
        <label for="seller">Nama Sales:</label>
        <select name="seller" required>
            <?php
            $sql7 = "SELECT * FROM master_seller";
            $result7 = $conn->query($sql7);

            if ($result7->num_rows > 0) {
                while ($row = $result7->fetch_assoc()) {
                    $itemName = $row["nama_seller"];
                    echo "<option value='$itemName'>$itemName</option>";
                }
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Add Stock">
    </form>
    </div>

    <input type="text" id="searchInput" placeholder="Search by Item" />
<input type="text" id="searchInputmember" placeholder="Search by Member" />
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
        <th>Nama Member</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jenis Bayar</th>
        <th>Status Bayar</th>
        <th>Nama Sales</th>
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
            <td ><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaBarang"><?php echo $resulttable['barang']; ?></td>
            <td ><?php echo $resulttable['kode_item']; ?></td>
            <td class="namaMember"><?php echo $resulttable['Member']; ?></td>
            <td ><?php echo $resulttable['harga_jual']; ?></td>
            <td ><?php echo $resulttable['quantity']; ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>
            <td ><?php echo $resulttable['seller']; ?></td>

            <td style="text-align: center;">
                <!-- <a href="kelolajual.php?ubah=<?php echo $resulttable['id']; ?>" type="button"
                   style="text-decoration: none;">
                    <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
                </a> -->

                <a href="prosesjual.php?hapus=<?php echo $resulttable['id']; ?>" type="button"
                onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi <?php echo $resulttable['barang']; ?> dengan monor faktur <?php echo $resulttable['nofaktur']; ?> tersebut???')"
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
</script>
</body>
</html>
