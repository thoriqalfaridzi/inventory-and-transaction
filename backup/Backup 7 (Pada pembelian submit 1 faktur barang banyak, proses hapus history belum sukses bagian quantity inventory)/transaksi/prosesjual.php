<?php
include '../koneksi.php';
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the form data
        $itemName = $_POST["nama_item"];
        $quantity = $_POST["quantity"];
        $tanggal = $_POST["tanggal"];
        $hargaJual = $_POST["harga_jual"];
        $faktur = $_POST["faktur"];
        $member = $_POST["member"];
        $jenis_bayar = $_POST["jenis_bayar"];
        $seller = $_POST["seller"];

        // Call the sellItem function
        sellItem($itemName, $quantity, $tanggal, $hargaJual, $faktur, $member, $jenis_bayar, $seller, $conn);
    }

    // Function to sell item from inventory
function sellItem($itemName, $quantity, $tanggal, $hargaJual, $faktur, $member, $jenis_bayar, $seller, $conn) {
    // Check if item exists in inventory
    $sql = "SELECT * FROM inventory WHERE item_name = '$itemName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemId = $row["id_item"];
        $currentQuantity = $row["quantity"];
        $itemSupplier = $row["kode_supplier_item"];
        $itemCode = $row["kode_item"];
        $itemsatuan = $row["satuan"];
        $itemkategori = $row["kategori"];

        // Check if the entered quantity is valid
        if ($quantity > $currentQuantity) {
            echo "Insufficient quantity in inventory.";
            return;

        }

        // Calculate the new quantity
        $newQuantity = $currentQuantity - $quantity;

        // Update the inventory with the new quantity
        $sql2 = "UPDATE inventory SET quantity = '$newQuantity' WHERE id_item = '$itemId'";
        if ($conn->query($sql2) === TRUE) {
            echo "$quantity $itemName(s) sold from inventory.";

            // Check if the quantity reaches 0, then delete the item from inventory
            if ($newQuantity == 0) {
                $sql3 = "DELETE FROM inventory WHERE id_item = '$itemId'";
                if ($conn->query($sql3) === TRUE) {
                    echo "Item removed from inventory.";
                    header('Location: ../backuprestore/transaksi/autobackup.php');
                } else {
                    echo "Error removing item from inventory: " . $conn->error;
                }
            }
        } else {
            echo "Error updating inventory: " . $conn->error;
        }
                
        // Insert a new row for the transaction in transaksibeli 
        $sql5 = "INSERT INTO transaksijual (tanggal, quantity, harga_jual, Member, kode_item, satuan, kategori, barang, nofaktur, jenis_bayar, seller, status_bayar)
        VALUES ('$tanggal', '$quantity', '$hargaJual', '$member','$itemCode', '$itemsatuan', '$itemkategori', '$itemName','$faktur', '$jenis_bayar', '$seller', ";

if ($jenis_bayar == 'Hutang') {
    $sql5 .= "'Belum Lunas')";
} else if ($jenis_bayar == 'Cash') {
    $sql5 .= "'Lunas')";
}

        if ($conn->query($sql5) === TRUE) {
                echo "Transaction added to transaksijual.";
                header('Location: jual.php');
                header('Location: ../backuprestore/transaksi/autobackup.php');
            } else {
                echo "Error inserting into transaksijual: " . $conn->error;
            }
    } else {
        echo "Item not found in inventory.";
    }
}

// Check if the delete button is clicked
if(isset($_GET['hapus'])){
    $id_jual = $_GET['hapus'];

    // Get the item code and quantity from the transaksibeli table
    $query = "SELECT kode_item, quantity FROM transaksijual WHERE id = '$id_jual'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $itemCode = $row['kode_item'];
    $quantity = $row['quantity'];

    // Reduce the quantity in the inventory
    $query2 = "UPDATE inventory SET quantity = quantity + $quantity WHERE kode_item = '$itemCode'";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        // Delete the transaction from transaksijual table
        $query3 = "DELETE FROM transaksijual WHERE id = '$id_jual'";
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            header('Location: inventory.php');
            
            exit;
        } else {
            echo "Error deleting transaction: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating inventory: " . mysqli_error($conn);
    }
}

?>