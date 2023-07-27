<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $namaseller = $_POST['nama_seller'];
    $notelp = $_POST['notelp'];
    $keterangan = $_POST['keterangan'];



    // Update query
    $query = "UPDATE master_seller SET 
        nama_seller = '$namaseller', 
        notelp = '$notelp',
        keterangan = '$keterangan'
        WHERE id = '$id';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterSeller.php');
        header('Location: ../../backuprestore/master/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>