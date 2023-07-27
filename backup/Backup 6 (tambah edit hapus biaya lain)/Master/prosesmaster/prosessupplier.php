<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $supplier = $_POST['supplier'];
    $kodesupplier = $_POST['kodesupplier'];
    $alamatsupplier = $_POST['alamatsupplier'];
    $contactperson = $_POST['contactperson'];
    $notelp = $_POST['notelp'];
    $nohp = $_POST['nohp'];

    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO master_supplier (nama_supplier,kode_supplier,alamat_supplier,contactperson_supplier,no_telp_supplier,no_hp_supplier) 
    VALUES ('$supplier','$kodesupplier','$alamatsupplier','$contactperson','$notelp','$nohp');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        //header('Location: ../MasterSupplier.php');
        header('Location: ../../backuprestore/master/autobackup.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id_supplier = $_GET['hapus'];
    $query = "DELETE FROM master_supplier WHERE id_supplier = '$id_supplier';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../MasterSupplier.php');
        
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
