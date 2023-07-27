<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_supplier = $_POST['id_supplier'];
    $namasupplier = $_POST['nama_supplier'];
    $alamatsupplier = $_POST['alamatsupplier'];
    $contactpersonsupplier = $_POST['contactperson'];
    $notelpsupplier = $_POST['notelp'];
    $nohpsupplier = $_POST['nohp'];
    $kodesupplier = $_POST['kodesupplier'];



    // Update query
    $query = "UPDATE master_supplier SET 
        nama_supplier = '$namasupplier', 
        kode_supplier = '$kodesupplier',
        alamat_supplier = '$alamatsupplier',
        contactperson_supplier = '$contactpersonsupplier',
        no_telp_supplier = '$notelpsupplier',
        no_hp_supplier = '$nohpsupplier' 
        WHERE id_supplier = '$id_supplier';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterSupplier.php');
        header('Location: ../../backuprestore/master/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>