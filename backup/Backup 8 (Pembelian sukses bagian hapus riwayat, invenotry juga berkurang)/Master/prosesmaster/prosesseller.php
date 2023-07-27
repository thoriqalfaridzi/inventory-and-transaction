<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seller = $_POST['seller'];
    $notelp = $_POST['notelp'];
    $keterangan = $_POST['keterangan'];
    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO master_seller (nama_seller,notelp,keterangan) 
    VALUES ('$seller','$notelp','$keterangan');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        //header('Location: ../MasterSeller.php');
        header('Location: ../../backuprestore/master/autobackup.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $query = "DELETE FROM master_seller WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../MasterSeller.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
