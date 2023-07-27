<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['Nama_Barang'];
    $kode_barang = $_POST['Kode_Barang'];
    $harga = $_POST['Harga'];
    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO tb_barang (Nama_Barang, Kode_Barang, Harga) VALUES ('$nama_barang', '$kode_barang', '$harga');";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        echo "<script>alert('Data inserted successfully.');</script>";
        header('Location: inventory.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id_barang = $_GET['hapus'];
    $query = "DELETE FROM tb_barang WHERE id_barang = '$id_barang';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: editbarang.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
