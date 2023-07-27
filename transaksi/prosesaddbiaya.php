<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $biaya = $_POST['biaya'];
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    $keterangan = $_POST['keterangan'];
    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO biaya_lain (bulan,tahun,keterangan,biayalain) VALUES ('$bulan','$tahun','$keterangan','$biaya');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        //header('Location: biayalain.php');
        header('Location: ../backuprestore/transaksi/autobackup.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $query = "DELETE FROM biaya_lain WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: biayalain.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



?>
