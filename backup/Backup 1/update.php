<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['Nama_Barang'];
    $kode_barang = $_POST['Kode_Barang'];
    $harga = $_POST['Harga'];

    // Update query
    $query = "UPDATE tb_barang SET Nama_Barang = '$nama_barang', Kode_Barang = '$kode_barang', Harga = '$harga' WHERE id_barang = '$id_barang';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        header('Location: editbarang.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
