<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $satuan = $_POST['Satuan'];
    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO master_satuan (nama_satuan) VALUES ('$satuan');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        header('Location: ../MasterSatuan.php');
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
