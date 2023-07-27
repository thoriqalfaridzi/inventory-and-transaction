<?php
include '../koneksi.php';
include 'headertransaksi.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
$tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang
$querytable = "SELECT DISTINCT nofaktur, tanggal, Member, status_bayar, jenis_bayar, seller, total_harga_jual_barang, diskonfaktur FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun ORDER BY tanggal $orderClause;";
$sqltable = mysqli_query($conn, $querytable);

$no = 0;
$totalPenjualand = 0;
$queryjual = "SELECT SUM(total_harga_jual_barang) AS total_harga_jual_barang FROM transaksijual WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun";
$resultjual = mysqli_query($conn, $queryjual);
$totalPenjualan = mysqli_fetch_assoc($resultjual)['total_harga_jual_barang'];

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

        $(document).ready(function () {
            // Triggered when the search input changes
            $('#searchInputsales').on('input', function () {
                var searchQuery = $(this).val().toLowerCase();

                // Hide rows that don't match the search query
                $('table tbody tr').each(function () {
                    var namaBarang = $(this).find('.namaSales').text().toLowerCase();
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


    <h1>Jual Barang dari Gudang</h1>


    <!-- <button id="expandButton" class="expand-button">Tambahkan Transaksi Beli</button> -->
    <button id="expandButton" class="expand-button">
        <a href='tambahjual.php'>Tambahkan Transaksi Jual</a>
    </button>
<div id="formSection">
    <form method="post" action="prosesjual.php" id="beliForm">
    <label for="faktur">Nomor Faktur:</label>
        <input type="text" name="faktur" required>
        <br>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required>
        <br>
        <label for="member">Member:</label>
        <select name="member" required>
            <?php
            // Retrieve item names from inventory
            $sql7 = "SELECT * FROM master_member";
            $result7 = $conn->query($sql7);

            if ($result7->num_rows > 0) {
                while ($row = $result7->fetch_assoc()) {
                    $member = $row["nama_member"];
                    $kodemember = $row["kode_member"];
                    echo "<option value='$kodemember'>$kodemember - $member</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="seller">Nama Sales:</label>
        <select name="seller" required>
            <?php
            $sql8 = "SELECT * FROM master_seller";
            $result8 = $conn->query($sql8);

            if ($result8->num_rows > 0) {
                while ($row = $result8->fetch_assoc()) {
                    $seller = $row["nama_seller"];
                    echo "<option value='$seller'>$seller</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="jenis_bayar">Jenis Bayar:</label>
        <select name="jenis_bayar" id="jenis_bayar" required>
            <option value="Cash">Cash</option>
            <option value="Hutang">Hutang</option>
        </select>
        <br>
        <!-- <label for="hutangterbayar">Hutang yang sudah dibayar (opsional):</label>
        <input type="number" name="hutangterbayar">
        <br> -->
        <label for="nama_item">Nama Barang:</label>
        <select name="nama_item[]" required>
            <?php
            // Retrieve item names from master_item
            $sql = "SELECT * FROM inventory WHERE quantity > 0";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $itemName = $row["item_name"];
                    $itemCode = $row["kode_item"];
                    echo "<option value='$itemCode'>$itemCode-$itemName</option>";
                }
            }
            ?>
        </select>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity[]" required>
        <br>
        <label for="harga_jual">Harga Jual:</label>
        <input type="number" name="harga_jual[]" required>
        <br>
        

        <button type="button" id="add-item-btn">Tambahkan Item Lain</button>

        <br>
        <input type="submit" value="Add Stock">
    </form>
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

        <!-- Print jual -->
        <?php
        $urlCetak = 'print/printjual.php?&bulan=' . $bulan . '&tahun=' . $tahun;
        ?>
        <a href="<?php echo $urlCetak; ?>" target="_blank" type="button" style="text-decoration: none;">
            <img src="../IconImage/printimg.png" style="width: 20px; height: 20px;">
        </a>

    <input type="text" id="searchInput" placeholder="Search by Item" />
<input type="text" id="searchInputmember" placeholder="Search by Member" />
<input type="text" id="searchInputsales" placeholder="Search by Sales" />
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
        <th>Member</th>
        <th>Sales</th>
        <th>Harga Faktur</th>
        <th>Jenis Bayar</th>
        <th>Status Bayar</th>
        
        <th>Hapus</th>
        <th>Cetak</th>

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

                $diskon = $resulttable['diskonfaktur'];
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td ><?php echo $resulttable['tanggal']; ?></td>
            <td class="nofaktur"><?php echo $resulttable['nofaktur']; ?></td>
            <td class="namaSupplier"><?php echo $resulttable['Member']; ?></td>
            <td ><?php echo $resulttable['seller']; ?></td>
            <td ><?php 
            
            $harga_diskon = ($diskon / 100) * $totalsum;
            $harga_faktur_akhir = $totalsum - $harga_diskon;
            // Menambahkan harga faktur akhir ke total pembelian
            $totalPenjualand += $harga_faktur_akhir;
            echo number_format($harga_faktur_akhir,0,',','.'); 
            ?></td>
            <td ><?php echo $resulttable['jenis_bayar']; ?></td>
            <td ><?php echo $resulttable['status_bayar']; ?></td>

            <td style="text-align: center;" class="no-print">
                <a href="fakturjual.php?nofaktur=<?php echo $resulttable['nofaktur']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
                </a>

                <a href="prosesjual.php?hapus=<?php echo $resulttable['nofaktur']; ?>" type="button"
                   onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi dengan nomor faktur <?php echo $resulttable['nofaktur']; ?> tersebut???')"
                   style="text-decoration: none;">
                   
                    <img src="../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
                </a>
            </td>
            <td class="print-button">
            <a href="print/printfakturjual.php?nofaktur=<?php echo $resulttable['nofaktur']; ?>" target="_blank" type="button" style="text-decoration: none;">
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
    <td></td>
    <td>Total Harga Penjualan</td>
    <td>=</td>
    <td><?php
    echo number_format($totalPenjualand,0,',','.');
    ?></td>
</tr>
    </tbody>
</table>
</div>
</div>
<footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
    <script>
    // document.addEventListener('DOMContentLoaded', function () {
    //     var expandButton = document.getElementById('expandButton');
    //     var formSection = document.getElementById('formSection');

    //     formSection.style.display = 'none'; // Hide the form section initially
    //     expandButton.textContent = 'Tambahkan Transaksi Jual'; // Set the initial button text

    //     expandButton.addEventListener('click', function () {
    //         if (formSection.style.display === 'none') {
    //             formSection.style.display = 'block';
    //             expandButton.textContent = 'Batal'; // Update button text when expanded
    //         } else {
    //             formSection.style.display = 'none';
    //             expandButton.textContent = 'Tambahkan Transaksi Jual'; // Update button text when collapsed
    //         }
    //     });
    // });

    function printTable() {
        var table = document.getElementById('printTable');
        var newWin = window.open('', 'Print', 'height=500,width=600');

        newWin.document.write('<html><head><title>Print</title></head><body>');
        newWin.document.write(table.outerHTML);
        newWin.document.write('</body></html>');

        newWin.print();
        newWin.close();
    }

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
                $itemName = $row["item_name"];
                $itemCode = $row["kode_item"];
                echo "newItemSelect.innerHTML += \"<option value='$itemCode'>$itemCode-$itemName</option>\";";
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
        newHargaBeliLabel.innerHTML = "Harga Jual:";
        var newHargaBeliInput = document.createElement("input");
        newHargaBeliInput.setAttribute("type", "number");
        newHargaBeliInput.setAttribute("name", "harga_jual[]");
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
