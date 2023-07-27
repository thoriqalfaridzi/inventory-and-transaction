<?php
include '../koneksi.php';

        // Retrieve the form data
        $faktur = $_POST["faktur"];
        $tanggal = $_POST["tanggal"];
        $jenis_bayar = $_POST["jenis_bayar"];
        $hutangterbayar = 0;
        $member = $_POST["member"];
        $seller = $_POST["seller"];
        $diskon = $_POST["diskon"];

        // Call the sellItem function
        //sellItem($itemName, $quantity, $tanggal, $hargaJual, $faktur, $member, $jenis_bayar, $seller, $conn);
    
        // Check if 'nama_item' is an array
        if (is_array($_POST['nama_item'])) {
            // Call the addStock function for each item
            for ($i = 0; $i < count($_POST['nama_item']); $i++) {
                $itemCode = $_POST["nama_item"][$i];
                $quantity = $_POST["quantity"][$i];
                $hargaJual = $_POST["harga_jual"][$i];
                $total_harga_jual_barang = $hargaJual * $quantity;

                sellItem($diskon,$itemCode, $quantity, $tanggal, $hargaJual,  $faktur, $member, $seller, $jenis_bayar, $hutangterbayar, $total_harga_jual_barang,$conn);
            }
        } else {
            echo "Invalid 'nama_item' data.";
        }


    // Function to sell item from inventory
function sellItem($diskon,$itemCode, $quantity, $tanggal, $hargaJual,  $faktur, $member, $seller, $jenis_bayar, $hutangterbayar, $total_harga_jual_barang,$conn) 
{
    // Check if item exists in inventory
    $sql = "SELECT * FROM inventory WHERE kode_item = '$itemCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemId = $row["id_item"];
        $currentQuantity = $row["quantity"];
        //$itemSupplier = $row["kode_supplier_item"];
        $itemCode = $row["kode_item"];
        $itemsatuan = $row["satuan"];
        $itemkategori = $row["kategori"];
        $itemName = $row["item_name"];

        // Check if the entered quantity is valid
        if ($quantity > $currentQuantity) {
            echo "Barang pada inventory tidak mencukupi untuk melakukan jual.";
            return;
        }

        // Calculate the new quantity
        $newQuantity = $currentQuantity - $quantity;

        // Update the inventory with the new quantity
        $sql2 = "UPDATE inventory SET quantity = '$newQuantity' WHERE kode_item = '$itemCode'";
        if ($conn->query($sql2) === TRUE) {
            echo "$quantity $itemName(s) sold from inventory.";
            header('Location: ../backuprestore/transaksi/autobackup.php');
            // Check if the quantity reaches 0, then delete the item from inventory
            // if ($newQuantity == 0) {
            //     $sql3 = "DELETE FROM inventory WHERE id_item = '$itemId'";
            //     if ($conn->query($sql3) === TRUE) {
            //         echo "Item removed from inventory.";
            //         header('Location: ../backuprestore/transaksi/autobackup.php');
            //     } else {
            //         echo "Error removing item from inventory: " . $conn->error;
            //     }
            // }
        } else {
            echo "Error updating inventory: " . $conn->error;
        }
                
        $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));
        // Insert a new row for the transaction in transaksibeli 
        $sql5 = "INSERT INTO transaksijual (id_item, diskonfaktur, tanggal, quantity, harga_jual, total_harga_jual_barang, Member, seller, kode_item, satuan, kategori, barang, nofaktur, jenis_bayar, hutang_terbayar, status_bayar, jatuhtempo)
        VALUES ('$itemId', '$diskon', '$tanggal', '$quantity', '$hargaJual', '$total_harga_jual_barang', '$member', '$seller', '$itemCode', '$itemsatuan', '$itemkategori', '$itemName','$faktur', '$jenis_bayar', '$hutangterbayar',";

        if ($jenis_bayar == 'Hutang') {
            $sql5 .= "'Belum Lunas', '$jatuhTempo')";
        } else if ($jenis_bayar == 'Cash') {
            $sql5 .= "'Lunas', NULL)";
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
// if(isset($_GET['hapus'])){
//     $id_jual = $_GET['hapus'];

//     // Get the item code and quantity from the transaksibeli table
//     $query = "SELECT kode_item, quantity FROM transaksijual WHERE id = '$id_jual'";
//     $result = mysqli_query($conn, $query);
//     $row = mysqli_fetch_assoc($result);
//     $itemCode = $row['kode_item'];
//     $quantity = $row['quantity'];

//     // Reduce the quantity in the inventory
//     $query2 = "UPDATE inventory SET quantity = quantity + $quantity WHERE kode_item = '$itemCode'";
//     $result2 = mysqli_query($conn, $query2);
//     if ($result2) {
//         // Delete the transaction from transaksijual table
//         $query3 = "DELETE FROM transaksijual WHERE id = '$id_jual'";
//         $result3 = mysqli_query($conn, $query3);
//         if ($result3) {
//             header('Location: inventory.php');
            
//             exit;
//         } else {
//             echo "Error deleting transaction: " . mysqli_error($conn);
//         }
//     } else {
//         echo "Error updating inventory: " . mysqli_error($conn);
//     }
// }

 if(isset($_GET['hapus'])){
     $nofaktur = $_GET['hapus'];
     // Get the item code and quantity from the transaksibeli table
     //$query = "SELECT kode_item, quantity FROM transaksijual WHERE id = '$id_jual'";
     $query = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur'";
     $result = mysqli_query($conn, $query);
         // Loop through each row in the result
     while ($row = mysqli_fetch_assoc($result)) {
         $itemCode = $row['kode_item'];
         $quantity = $row['quantity'];
         // Reduce the quantity in the inventory
         $query2 = "UPDATE inventory SET quantity = quantity + $quantity WHERE kode_item = '$itemCode'";
         $result2 = mysqli_query($conn, $query2);
         if (!$result2) {
             echo "Error updating inventory for item code: $itemCode - " . mysqli_error($conn);
             // You can choose to break the loop or continue updating other items
         }
     }
     
         // Delete the transaction from transaksijual table
         $query3 = "DELETE FROM transaksijual WHERE nofaktur = '$nofaktur'";
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
 

// if(isset($_GET['hapus'])){
//     $nofaktur = $_GET['hapus'];

//     // Get the item code and quantity from the transaksijual table
//     //$query = "SELECT kode_item, quantity FROM transaksijual WHERE id = '$id_jual'";
//     $query = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur'";
//     $result = mysqli_query($conn, $query);

//     // Loop through each row in the result
//     while ($row = mysqli_fetch_assoc($result)) {
//         $itemCode = $row['kode_item'];
//         $quantity = $row['quantity'];

//         // Check if the item code exists in the inventory
//         $checkQuery = "SELECT COUNT(*) as count FROM inventory WHERE kode_item = '$itemCode'";
//         $checkResult = mysqli_query($conn, $checkQuery);
//         $checkRow = mysqli_fetch_assoc($checkResult);
//         $itemExists = $checkRow['count'];

//         if ($itemExists > 0) {
//             // Reduce the quantity in the inventory
//             $updateQuery = "UPDATE inventory SET quantity = quantity - $quantity WHERE kode_item = '$itemCode'";
//             $updateResult = mysqli_query($conn, $updateQuery);

//             if (!$updateResult) {
//                 echo "Error updating inventory for item code: $itemCode - " . mysqli_error($conn);
//                 // You can choose to break the loop or continue updating other items
//             }
//         } else {
//             // Insert the new item code into the inventory
//             $insertQuery = "INSERT INTO inventory (kode_item, quantity) VALUES ('$itemCode', -$quantity)";
//             $insertResult = mysqli_query($conn, $insertQuery);

//             if (!$insertResult) {
//                 echo "Error inserting new item code into inventory: " . mysqli_error($conn);
//                 // You can choose to break the loop or continue updating other items
//             }
//         }
//     }

//     // Delete the transaction from transaksijual table
//     $deleteQuery = "DELETE FROM transaksijual WHERE nofaktur = '$nofaktur'";
//     $deleteResult = mysqli_query($conn, $deleteQuery);

//     if ($deleteResult) {
//         header('Location: inventory.php');
//         exit;
//     } else {
//         echo "Error deleting transaction: " . mysqli_error($conn);
//     }
// }


?>