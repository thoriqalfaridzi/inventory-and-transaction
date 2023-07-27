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
        header('Location: biayalain.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id_satuan = $_GET['hapus'];
    $query = "DELETE FROM master_satuan WHERE id_satuan = '$id_satuan';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../MasterSatuan.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
