<?php
include '../koneksi.php';

$id = $_POST['id'];
$newQuantity = $_POST['quantity'];

$updateQuery = "UPDATE transaksibeli SET quantity = '$newQuantity' WHERE id = '$id';";

if (mysqli_query($conn, $updateQuery)) {
    // Update the quantity in the inventory table
    $getBarangQuery = "SELECT Barang FROM transaksibeli WHERE id = '$id';";
    $barangResult = mysqli_query($conn, $getBarangQuery);
    $barangRow = mysqli_fetch_assoc($barangResult);
    $barang = $barangRow['Barang'];
    $sqlinvent = "SELECT * FROM inventory WHERE item_name = '$id';";

    $updateInventoryQuery = "UPDATE inventory SET quantity = '$newQuantity' WHERE kode_item = '$barang';";
    mysqli_query($conn, $updateInventoryQuery);

    // Redirect to beli.php after successful update
    //header('Location: beli.php');
    header('Location: ../backuprestore/transaksi/autobackup.php');
    exit;
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
