<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_satuan = $_POST['id_satuan'];
    $nama_satuan = $_POST['nama_satuan'];



    // Update query
    $query = "UPDATE master_satuan SET nama_satuan = '$nama_satuan' WHERE id_satuan = '$id_satuan';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterSatuan.php');
        header('Location: ../../backuprestore/master/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>