<?php
include '../koneksi.php';
include 'headertransaksi.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
$tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang
//$querytable = "SELECT * FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal $orderClause;";
$querytable = "SELECT DISTINCT nofaktur  , tanggal, Supplier, status_bayar, jenis_bayar, total_harga_beli_barang, diskonfaktur FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal $orderClause;";

$sqltable = mysqli_query($conn, $querytable);

$no = 0;
$totalPembeliand = 0;
$querytotalbeli = "SELECT SUM(total_harga_beli_barang) AS total_harga_beli FROM transaksibeli WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resulttotalbeli = mysqli_query($conn, $querytotalbeli);
$totalPembelian = mysqli_fetch_assoc($resulttotalbeli)['total_harga_beli'];


session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../login.php");
    exit();
}


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

        $(document).ready(function () {
            // Triggered when the search input changes
            $('#searchInputBulan').on('input', function () {
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
<h1>Beli Barang dan Masukkan ke Gudang</h1>
<button id="expandButton" class="expand-button"><a href='tambahbeli.php'>Tambahkan Transaksi Beli</a></button>
<!-- <button id="expandButton" class="expand-button">Tambahkan Transaksi Beli</button> -->
<!-- bawah ini entah kenapa gabisa setelah masukkan beberapa data yang banyak sekitar sudah ada 450 an data 
Jadi diganti pake button href-->


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
        
       <!-- Print jual -->
       <?php
        $urlCetak = 'print/printbeli.php?&bulan=' . $bulan . '&tahun=' . $tahun;
        ?>
        <a href="<?php echo $urlCetak; ?>" target="_blank" type="button" style="text-decoration: none;">
            <img src="../IconImage/printimg.png" style="width: 20px; height: 20px;">
        </a>
<!-- <button onclick="printPage()">Cetak</button> -->
<!-- <input type="text" id="searchInput" placeholder="Search by Item" /> -->
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
        <th>Supplier</th>
        <th>Harga Faktur</th>
        <th>Jenis Bayar</th>
        <th>Status Bayar</th>
        <th>Hapus</th>
        <th class="print-button">Cetak</th>

    </tr>
    </thead>
    <tbody>
        <?php
    $previousNofaktur = '';
while ($resulttable = mysqli_fetch_assoc($sqltable)) {
    if ($resulttable['nofaktur'] !== $previousNofaktur) {
        $previousNofaktur = $resulttable['nofaktur'];
                // Tambahkan nilai total_harga_beli_barang ke totalhargafaktur
                $querysum = "SELECT SUM(total_harga_beli_barang) AS total FROM transaksibeli WHERE nofaktur = '$previousNofaktur'";
                $resultsum = mysqli_query($conn, $querysum);
                $rowsum = mysqli_fetch_assoc($resultsum);
                $totalsum = $rowsum['total'];
                
                $diskon = $resulttable['diskonfaktur'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="nofaktur"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaSupplier"><?php echo $resulttable['Supplier']; ?></td>
            <td ><?php 
            
            $harga_diskon = ($diskon / 100) * $totalsum;
            $harga_faktur_akhir = $totalsum - $harga_diskon;
            // Menambahkan harga faktur akhir ke total pembelian
            $totalPembeliand += $harga_faktur_akhir;
            echo number_format($harga_faktur_akhir,0,',','.'); 
            ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>

            <td style="text-align: center;" class="print-button">
                <a href="faktur.php?nofaktur=<?php echo $resulttable['nofaktur']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
                </a>

                <a href="prosesbeli.php?hapus=<?php echo $resulttable['nofaktur']; ?>" type="button"
                   onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi dengan nomor faktur <?php echo $resulttable['nofaktur']; ?> tersebut???')"
                   style="text-decoration: none;">
                   
                    <img src="../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
                </a>
            </td>
            <td class="print-button">
            <a href="print/printfaktur.php?nofaktur=<?php echo $resulttable['nofaktur']; ?>" target="_blank" type="button" style="text-decoration: none;">
                <img src="../IconImage/printimg.png" style="width: 20px; height: 20px;">
                </a>
            </td>

        </tr>
        <?php
    }
}
?>
<tr>
    <td></td>
    <td></td>
    <td>Total Harga Pembelian</td>
    <td>=</td>
    <td><?php
    echo number_format($totalPembeliand,0,',','.');
    ?></td>
</tr>
    </tbody>
</table>
<!-- <h1>Backup & Restore Data</h1> -->

<!-- <form method="post" action="">
    <input type="submit" name="backup" value="Backup Data">
    <input type="submit" name="restore" value="Restore Data">
</form> -->
<!-- <a href="../backuprestore/transaksi/beli/backup.php" type="button">
                    Backup
                </a> -->
<!-- <a href="../backuprestore/restore.php" type="button">
                    Restore
                </a> -->
    <!-- <form method="POST" enctype="multipart/form-data" action="../backuprestore/transaksi/beli/restore.php">
        <input type="file" name="sql_file" accept=".sql">
        <br><br>
        <button type="submit" name="restore">Restore</button>
    </form> -->

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
    
        //     document.addEventListener("DOMContentLoaded", function() {
        //     var addItemButton = document.getElementById("add-item-btn");
        //     addItemButton.addEventListener("click", function() {
        //         var multipleItemsSection = document.getElementById("multiple-items-section");
        //         var newItemSection = document.createElement("div");
        //         newItemSection.classList.add("item-section");
        //         newItemSection.innerHTML = `
        //             <label for="nama_item">Item Name:</label>
        //             <select name="nama_item[]" required>
        //                <?php
        //                 // Retrieve item names from master_item
        //                 $sql = "SELECT * FROM master_item";
        //                 $result = $conn->query($sql);

        //                 if ($result->num_rows > 0) {
        //                     while ($row = $result->fetch_assoc()) {
        //                         $itemName = $row["nama_item"];
        //                         $itemCode = $row["kode_item"];
        //                         echo "<option value='$itemName'>$itemCode-$itemName</option>";
        //                     }
        //                 }
        //                 ?>
        //             </select>
        //             <br>
        //             <label for="quantity">Quantity:</label>
        //             <input type="number" name="quantity[]" required>
        //             <br>
        //             <label for="harga_beli">Harga Beli:</label>
        //             <input type="number" name="harga_beli[]" required>
        //             <br>

        //         `;
        //         multipleItemsSection.appendChild(newItemSection);
        //     });
        // });

        document.getElementById("add-item-btn").addEventListener("click", function() {
        var form = document.getElementById("beliForm");

        // Buat elemen-elemen input baru
        var newItemLabel = document.createElement("label");
        newItemLabel.innerHTML = "Item Name:";
        var newItemSelect = document.createElement("select");
        newItemSelect.setAttribute("name", "nama_item[]");
        <?php
        // Retrieve item names from master_item
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $itemName = $row["nama_item"];
                $itemCode = $row["kode_item"];
                echo "newItemSelect.innerHTML += \"<option value='$itemCode'>$itemCode ($itemName)</option>\";";
            }
        }
        ?>

        var newQuantityLabel = document.createElement("label");
        newQuantityLabel.innerHTML = "Quantity:";
        var newQuantityInput = document.createElement("input");
        newQuantityInput.setAttribute("type", "number");
        newQuantityInput.setAttribute("name", "quantity[]");
        newQuantityInput.setAttribute("required", "");

        var newHargaBeliLabel = document.createElement("label");
        newHargaBeliLabel.innerHTML = "Harga Beli:";
        var newHargaBeliInput = document.createElement("input");
        newHargaBeliInput.setAttribute("type", "number");
        newHargaBeliInput.setAttribute("name", "harga_beli[]");
        newHargaBeliInput.setAttribute("required", "");

        // Ambil elemen "Tambahkan Item Lain" yang sudah ada
        var addItemBtn = document.getElementById("add-item-btn");

        // Sisipkan elemen-elemen baru ke formulir sebelum tombol "Tambahkan Item Lain"
        form.insertBefore(newItemLabel, addItemBtn);
        form.insertBefore(newItemSelect, addItemBtn);
        form.insertBefore(newQuantityLabel, addItemBtn);
        form.insertBefore(newQuantityInput, addItemBtn);
        form.insertBefore(newHargaBeliLabel, addItemBtn);
        form.insertBefore(newHargaBeliInput, addItemBtn);

        // Tambahkan baris kosong untuk pemisah
        form.insertBefore(document.createElement("br"), addItemBtn);
    });
</script>
</body>
</html>
