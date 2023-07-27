<?php
include '../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $barang = $_POST['barang'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    $supplier = $_POST['supplier'];
    $diganti = $_POST['diganti'];
    $nofaktur = $_POST['nofaktur'];



    // Update query
    $query = "UPDATE retur_pembelian SET 
    barang = '$barang',
    jumlah = '$jumlah',
    keterangan = '$keterangan',
    supplier = '$supplier',
    diganti = '$diganti',
    nofaktur = '$nofaktur'
    WHERE id = '$id';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterKategori.php');
        header('Location: ../../../backuprestore/transaksi/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>