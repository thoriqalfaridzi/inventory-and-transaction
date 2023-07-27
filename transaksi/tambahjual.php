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
    </head>
    <body>
<div class="container">
    <div class="content">


    <h1>Jual Barang dari Gudang</h1>

<body>
 
<div id="form">
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
        <label for="diskon">Diskon:</label>
        <input type="number" name="diskon" required>
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
            $sql = "SELECT * FROM inventory WHERE quantity > 0 ORDER BY kode_item";
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

            <?php
            // Retrieve item names from master_item
            $sql2 = "SELECT * FROM inventory WHERE quantity > 0 ORDER BY kode_item";
            // Ambil data dari database menggunakan $sql2
            $result = $conn->query($sql2);
                    
            $items = array();
            while ($row = $result->fetch_assoc()) {
                $items[] = array(
                    "itemName" => $row["item_name"],
                    "itemCode" => $row["kode_item"]
                );
            }
            
            // Konversi array menjadi format JSON
            $items_json = json_encode($items);
            ?>

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
    
    </div>

<script>


document.getElementById("add-item-btn").addEventListener("click", function() {
        var form = document.getElementById("beliForm");

        // Buat elemen-elemen input baru
        var newItemLabel = document.createElement("label");
        newItemLabel.innerHTML = "Nama Barang:";
        var newItemSelect = document.createElement("select");
        newItemSelect.setAttribute("name", "nama_item[]");
        // Ambil data JSON yang dihasilkan dari PHP dan konversi menjadi objek JavaScript
        var items = <?php echo $items_json; ?>;
        items.forEach(function(item) {
            var option = document.createElement("option");
            option.value = item.itemCode;
            option.text = item.itemCode + " (" + item.itemName + ")";
            newItemSelect.appendChild(option);
        });

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