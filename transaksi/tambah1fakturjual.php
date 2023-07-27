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

if (isset($_GET['tambah'])) {
    $nofaktur = $_GET['tambah'];

    // Lakukan query untuk mendapatkan tanggal dari tabel transaksibeli
    $sqlfaktur = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur'";
    $resultfaktur = mysqli_query($conn, $sqlfaktur);
    if ($resultfaktur && mysqli_num_rows($resultfaktur) > 0) {
        $rowfaktur = mysqli_fetch_assoc($resultfaktur);
        $tanggal = $rowfaktur['tanggal']; // Ambil nilai tanggal dari hasil query
        $member = $rowfaktur['Member'];
        $seller = $rowfaktur['seller'];
        $diskonfaktur = $rowfaktur['diskonfaktur'];
        $jenis_bayar = $rowfaktur['jenis_bayar'];
    } else {
        // Handle jika data tidak ditemukan atau ada kesalahan dalam query
        // Contoh:
        echo "Data faktur tidak ditemukan atau terjadi kesalahan dalam query.";
        exit();
    }

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


    <h1>Tambah Item Faktur <?php echo $nofaktur; ?></h1>

<body>
 
<div id="form">
    <form method="post" action="prosesjual.php" id="beliForm">
        <input type="hidden" name="faktur" value="<?php echo $nofaktur; ?>">
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal; ?>" required readonly>
        <br>
        <label for="member">Member:</label>
        <input type="text" name="member" value="<?php echo $member; ?>" required readonly>
        <br>
        <label for="seller">Seller:</label>
        <input type="text" name="seller" value="<?php echo $seller; ?>" required readonly>
        <br>
        <label for="diskon">Diskon:</label>
        <input type="number" name="diskon" value="<?php echo $diskonfaktur; ?>" required readonly>
        <br>
        <label for="jenis_bayar">Jenis Bayar:</label>
        <input type="text" name="jenis_bayar" id="jenis_bayar" value="<?php echo $jenis_bayar; ?>" required required readonly>
        <br>
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