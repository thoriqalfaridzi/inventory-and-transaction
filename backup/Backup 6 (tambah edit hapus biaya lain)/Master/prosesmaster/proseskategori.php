<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'];
    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO master_kategori (nama_kategori) VALUES ('$kategori');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        //header('Location: ../MasterKategori.php');
        header('Location: ../../backuprestore/master/autobackup.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id_kategori = $_GET['hapus'];
    $query = "DELETE FROM master_kategori WHERE id_kategori = '$id_kategori';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../MasterKategori.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
