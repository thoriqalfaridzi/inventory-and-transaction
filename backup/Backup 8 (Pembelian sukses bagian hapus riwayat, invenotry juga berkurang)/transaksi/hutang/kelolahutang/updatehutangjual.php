<?php
include '../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item = $_POST['id_item'];
    $namaitem = $_POST['namaitem'];
    $kodeitem = $_POST['kodeitem'];
    $hutang_terbayar = $_POST['hutang_terbayar'];
    $harga_jual_terakhir_item = $_POST['harga_jual_terakhir_item'];
    $metodebayarhutang = $_POST['metodebayarhutang'];

    // Menentukan nilai $status_bayar
    $status_bayar = ($harga_beli_terakhir_item == $hutang_terbayar) ? 'Lunas' : 'Belum Lunas';


    // Update query
    $query = "UPDATE transaksijual SET 
        hutang_terbayar = '$hutang_terbayar',
        status_bayar = '$status_bayar',
        harga_jual = '$harga_jual_terakhir_item',
        metodebayarhutang = '$metodebayarhutang' 
        WHERE id = '$id_item';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../hutangjual.php');
        header('Location: ../../../backuprestore/transaksi/autobackup.php');
        
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>