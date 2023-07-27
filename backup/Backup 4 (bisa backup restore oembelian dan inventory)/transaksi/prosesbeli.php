<?php
include '../koneksi.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $itemName = $_POST["nama_item"];
    $quantity = $_POST["quantity"];
    $tanggal = $_POST["tanggal"];
    $hargaBeli = $_POST["harga_beli"];
    $faktur = $_POST["faktur"];
    $jenis_bayar = $_POST["jenis_bayar"];
    $hutangterbayar = $_POST["hutangterbayar"];

    // Call the addStock function
    addStock($itemName, $quantity, $tanggal, $hargaBeli, $faktur, $jenis_bayar, $hutangterbayar, $conn);
}


// Function to add stock to inventory
function addStock($itemName, $quantity, $tanggal, $hargaBeli, $faktur, $jenis_bayar, $hutangterbayar, $conn) {
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
            if ($conn->query($sql3) === TRUE) {
                echo "$quantity $itemName(s) added to inventory.";
                header('Location: beli.php');
                header('Location: ../backuprestore/transaksi/beli/autobackup.php');
            } else {
                echo "Error updating inventory: " . $conn->error;
            }
        } else {
            // Insert a new row for the item in the inventory
            $sql4 = "INSERT INTO inventory (id_item, item_name, kode_supplier_item, kode_item, quantity, satuan, kategori)
            VALUES ('$itemId', '$itemName', '$itemSupplier', '$itemCode', '$quantity', '$itemsatuan', '$itemkategori')";
            if ($conn->query($sql4) === TRUE) {
                echo "$quantity $itemName(s) added to inventory.";
                header('Location: beli.php');
                header('Location: ../backuprestore/transaksi/beli/autobackup.php');
            } else {
                echo "Error inserting into inventory: " . $conn->error;
            }
        }

        // Insert a new row for the transaction in transaksibeli
        $sql5 = "INSERT INTO transaksibeli (tanggal, quantity, harga_beli, kode_item, supplier, satuan, kategori, Barang, nofaktur, jenis_bayar, hutang_terbayar, status_bayar)
        VALUES ('$tanggal', '$quantity', '$hargaBeli', '$itemCode', '$itemSupplier', '$itemsatuan', '$itemkategori', '$itemName','$faktur', '$jenis_bayar', '$hutangterbayar',";

if ($jenis_bayar == 'Hutang') {
    $sql5 .= "'Belum Lunas')";
} else if ($jenis_bayar == 'Cash') {
    $sql5 .= "'Lunas')";
}

if ($conn->query($sql5) === TRUE) {
    echo "Transaction added to transaksibeli.";
    header('Location: beli.php');
    header('Location: ../backuprestore/transaksi/beli/autobackup.php');
} else {
    echo "Error inserting into transaksibeli: " . $conn->error;
}

    } else {
        echo "Item not found in master_item.";
    }
}

// Check if the delete button is clicked
if(isset($_GET['hapus'])){
    $id_beli = $_GET['hapus'];

    // Get the item code and quantity from the transaksibeli table
    $query = "SELECT kode_item, quantity FROM transaksibeli WHERE id = '$id_beli'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $itemCode = $row['kode_item'];
    $quantity = $row['quantity'];

    // Reduce the quantity in the inventory
    $query2 = "UPDATE inventory SET quantity = quantity - $quantity WHERE kode_item = '$itemCode'";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        // Delete the transaction from transaksibeli table
        $query3 = "DELETE FROM transaksibeli WHERE id = '$id_beli'";
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