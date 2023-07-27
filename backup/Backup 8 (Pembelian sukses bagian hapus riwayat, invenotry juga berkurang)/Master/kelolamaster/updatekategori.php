<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];



    // Update query
    $query = "UPDATE master_kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = '$id_kategori';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterKategori.php');
        header('Location: ../../backuprestore/master/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>