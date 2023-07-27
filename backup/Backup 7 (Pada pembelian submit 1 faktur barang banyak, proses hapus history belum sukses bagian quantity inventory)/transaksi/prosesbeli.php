<?php
include '../koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $faktur = $_POST["faktur"];
    $tanggal = $_POST["tanggal"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $hutangterbayar = $_POST["hutangterbayar"];

    // Check if 'nama_item' is an array
    if (is_array($_POST['nama_item'])) {
        // Call the addStock function for each item
        for ($i = 0; $i < count($_POST['nama_item']); $i++) {
            $itemName = $_POST["nama_item"][$i];
            $quantity = $_POST["quantity"][$i];
            $hargaBeli = $_POST["harga_beli"][$i];
            $total_harga_beli_barang = $hargaBeli * $quantity;

            addStock($itemName, $quantity, $tanggal, $hargaBeli, $faktur, $jenis_bayar, $hutangterbayar, $total_harga_beli_barang,$conn);
        }
    } else {
        echo "Invalid 'nama_item' data.";
    }
}

// Function to add stock to inventory
function addStock($itemName, $quantity, $tanggal, $hargaBeli, $faktur, $jenis_bayar, $hutangterbayar, $total_harga_beli_barang,$conn) {
    // Retrieve item details from master_item
    $sql = "SELECT * FROM master_item WHERE nama_item = '$itemName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemId = $row["id_item"];
        $itemSupplier = $row["kode_supplier_item"];
        $itemCode = $row["kode_item"];
        $itemsatuan = $row["satuan_item"];
        $itemkategori = $row["kategori_item"];

        // Check if item already exists in inventory
        $sql2 = "SELECT * FROM inventory WHERE id_item = '$itemId'";
        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Add the entered quantity to the existing quantity
            $currentQuantity = $row["quantity"];
            $newQuantity = $currentQuantity + $quantity;

            // Update the inventory with the new quantity
            $sql3 = "UPDATE inventory SET quantity = '$newQuantity' WHERE id_item = '$itemId'";
            if ($conn->query($sql3) !== TRUE) {
                echo "Error updating inventory: " . $conn->error;
                return;
            }
        } else {
            // Insert a new row for the item in the inventory
            $sql4 = "INSERT INTO inventory (id_item, item_name, kode_supplier_item, kode_item, quantity, satuan, kategori)
            VALUES ('$itemId', '$itemName', '$itemSupplier', '$itemCode', '$quantity', '$itemsatuan', '$itemkategori')";
            if ($conn->query($sql4) !== TRUE) {
                echo "Error inserting into inventory: " . $conn->error;
                return;
            }
        }

        // Insert a new row for the transaction in transaksibeli
        $sql5 = "INSERT INTO transaksibeli (tanggal, quantity, harga_beli, total_harga_beli_barang, kode_item, supplier, satuan, kategori, Barang, nofaktur, jenis_bayar, hutang_terbayar, status_bayar)
        VALUES ('$tanggal', '$quantity', '$hargaBeli', '$total_harga_beli_barang','$itemCode', '$itemSupplier', '$itemsatuan', '$itemkategori', '$itemName','$faktur', '$jenis_bayar', '$hutangterbayar',";

        if ($jenis_bayar == 'Hutang') {
            $sql5 .= "'Belum Lunas')";
        } else if ($jenis_bayar == 'Cash') {
            $sql5 .= "'Lunas')";
        }

        if ($conn->query($sql5) !== TRUE) {
            echo "Error inserting into transaksibeli: " . $conn->error;
            return;
        }

        echo "$quantity $itemName(s) added to inventory.";
        header('Location: beli.php');
        header('Location: ../backuprestore/transaksi/autobackup.php');
    } else {
        echo "Item not found in master_item.";
    }
}

// Check if the delete button is clicked
if (isset($_GET['hapus'])) {
    $nofaktur = $_GET['hapus'];

    // Get the item code and quantity from the transaksibeli table
    $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $itemCode = $row['kode_item'];
    $quantity = $row['quantity'];
    $itemId = $row["id_item"];
    // Reduce the quantity in the inventory
    $query2 = "UPDATE inventory SET quantity = quantity - $quantity WHERE kode_item = '$itemCode'";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        // Delete the transaction from transaksibeli table
        $query3 = "DELETE FROM transaksibeli WHERE nofaktur = '$nofaktur'";
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            header('Location: beli.php');
            exit;
        } else {
            echo "Error deleting transaction: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating inventory: " . mysqli_error($conn);
    }
}

?>
