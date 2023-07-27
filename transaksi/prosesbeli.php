<?php
include '../koneksi.php';

// Retrieve the form data
$faktur = $_POST["faktur"];
$tanggal = $_POST["tanggal"];
$jenis_bayar = $_POST["jenis_bayar"];
//$hutangterbayar = $_POST["hutangterbayar"];
$kode_supplier = $_POST["kode_supplier"];
$diskon = $_POST["diskon"];
// Check if 'nama_item' is an array
if (is_array($_POST['nama_item'])) {
    // Call the addStock function for each item
    for ($i = 0; $i < count($_POST['nama_item']); $i++) {
        $ItemCode = $_POST["nama_item"][$i];
        $quantity = $_POST["quantity"][$i];
        $hargaBeli = $_POST["harga_beli"][$i];
        $total_harga_beli_barang = $hargaBeli * $quantity;

        addStock($diskon,$ItemCode, $quantity, $tanggal, $hargaBeli, $faktur, $kode_supplier, $jenis_bayar, $total_harga_beli_barang, $conn);
    }
} else {
    echo "Invalid 'nama_item' data.";
}

// Function to add stock to inventory
function addStock($diskon,$ItemCode, $quantity, $tanggal, $hargaBeli, $faktur, $kode_supplier, $jenis_bayar , $total_harga_beli_barang, $conn)
{
    // Retrieve item details from master_item
    $sql = "SELECT * FROM master_item WHERE kode_item = '$ItemCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemId = $row["id_item"];
        //$itemSupplier = $row["kode_supplier_item"];
        $itemCode = $row["kode_item"];
        $itemsatuan = $row["satuan_item"];
        $itemkategori = $row["kategori_item"];
        $ItemName = $row["nama_item"];
        // Check if item already exists in inventory
        $sql2 = "SELECT * FROM inventory WHERE kode_item = '$ItemCode'";
        $result = $conn->query($sql2);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Add the entered quantity to the existing quantity
            $currentQuantity = $row["quantity"];
            $newQuantity = $currentQuantity + $quantity;

            // Update the inventory with the new quantity
            $sql3 = "UPDATE inventory SET quantity = '$newQuantity' WHERE kode_item = '$itemCode'";
            if ($conn->query($sql3) !== TRUE) {
                echo "Error updating inventory: " . $conn->error;
                return;
            }
        } else {
            // Insert a new row for the item in the inventory
            $sql4 = "INSERT INTO inventory (id_item, item_name, kode_item, quantity, satuan, kategori)
            VALUES ('$itemId', '$ItemName', '$itemCode', '$quantity', '$itemsatuan', '$itemkategori')";
            if ($conn->query($sql4) !== TRUE) {
                echo "Error inserting into inventory: " . $conn->error;
                return;
            }
        }

        // Insert a new row for the transaction in transaksibeli


        // Hitung tanggal jatuh tempo
        $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));

        $sql5 = "INSERT INTO transaksibeli (id_item, diskonfaktur, tanggal, quantity, harga_beli, total_harga_beli_barang, kode_item, supplier, satuan, kategori, Barang, nofaktur, jenis_bayar, hutang_terbayar, status_bayar, jatuhtempo)
        VALUES ('$itemId', '$diskon','$tanggal', '$quantity', '$hargaBeli', '$total_harga_beli_barang', '$itemCode', '$kode_supplier', '$itemsatuan', '$itemkategori', '$ItemName', '$faktur', '$jenis_bayar', '0',";

        if ($jenis_bayar == 'Hutang') {
            $sql5 .= "'Belum Lunas', '$jatuhTempo')";
        } else if ($jenis_bayar == 'Cash') {
            $sql5 .= "'Lunas', NULL)";
        }

        if ($conn->query($sql5) !== TRUE) {
            echo "Error inserting into transaksibeli: " . $conn->error;
            return;
        }

        echo "$quantity $ItemCode(s) added to inventory.";
        header('Location: beli.php');
        header('Location: ../backuprestore/transaksi/autobackup.php');
    } else {
        echo "Item not found in master_item.";
    }
}

// Check if the delete button is clicked
// if (isset($_GET['hapus'])) {
// $nofaktur = $_GET['hapus'];

//      // Get the item code and quantity from the transaksibeli table
//      $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
//      $result = mysqli_query($conn, $query);
//      $row = mysqli_fetch_assoc($result);
//      $itemCode = $row['kode_item'];
//      $quantity = $row['quantity'];

//      // Reduce the quantity in the inventory
//      $query2 = "UPDATE inventory SET quantity = quantity - $quantity WHERE kode_item = '$itemCode'";
//      $result2 = mysqli_query($conn, $query2);
//      if ($result2) {
//          // Delete the transaction from transaksibeli table
//          $query3 = "DELETE FROM transaksibeli WHERE nofaktur = '$nofaktur'";
//          $result3 = mysqli_query($conn, $query3);
//          if ($result3) {
//              header('Location: beli.php');
//              exit;
//          } else {
//              echo "Error deleting transaction: " . mysqli_error($conn);
//          }
//      } else {
//         echo "Error updating inventory: " . mysqli_error($conn);
//      }
// }


// Pengecekan apakah parameter 'hapus' telah diterima
// if (isset($_GET['hapus'])) {
//     $nofaktur = $_GET['hapus'];

//     // Query untuk menghapus transaksi pembelian
//     $deleteQuery = "DELETE FROM transaksibeli WHERE nofaktur = '$nofaktur'";
//     $resultDelete = mysqli_query($conn, $deleteQuery);

//     // Pengecekan apakah penghapusan berhasil
//     if ($resultDelete) {
//         // Query untuk mengurangi stok pada tabel inventaris
//         $updateQuery = "UPDATE inventory SET quantity = quantity - (SELECT quantity FROM transaksibeli WHERE nofaktur = '$nofaktur' LIMIT 1) WHERE kode_item IN (SELECT kode_item FROM transaksibeli WHERE nofaktur = '$nofaktur')";
//         $resultUpdate = mysqli_query($conn, $updateQuery);

//         if ($resultUpdate) {
//             // Penghapusan berhasil dan pengurangan stok berhasil
//             echo "Transaksi berhasil dihapus dan stok berhasil diperbarui.";
//         } else {
//             // Penghapusan berhasil tetapi gagal dalam mengurangi stok
//             echo "Transaksi berhasil dihapus, tetapi gagal mengurangi stok.";
//         }
//     } else {
//         // Gagal menghapus transaksi pembelian
//         echo "Gagal menghapus transaksi pembelian.";
//     }
// }

if (isset($_GET['hapus'])) {
    $nofaktur = $_GET['hapus'];

    // Get the item codes and quantities from the transaksibeli table
    $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
    $result = mysqli_query($conn, $query);

    // Loop through each row in the result
    while ($row = mysqli_fetch_assoc($result)) {
        $itemCode = $row['kode_item'];
        $quantity = $row['quantity'];

        // Reduce the quantity in the inventory
        $query2 = "UPDATE inventory SET quantity = quantity - $quantity WHERE kode_item = '$itemCode'";
        $result2 = mysqli_query($conn, $query2);

        if (!$result2) {
            echo "Error updating inventory for item code: $itemCode - " . mysqli_error($conn);
            // You can choose to break the loop or continue updating other items
        }
    }

    // Delete all transactions from transaksibeli table with the given nofaktur
    $query3 = "DELETE FROM transaksibeli WHERE nofaktur = '$nofaktur'";
    $result3 = mysqli_query($conn, $query3);

    if ($result3) {
        header('Location: beli.php');
        exit;
    } else {
        echo "Error deleting transactions: " . mysqli_error($conn);
    }
}

?>
