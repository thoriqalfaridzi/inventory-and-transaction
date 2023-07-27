<?php
include '../../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item = $_POST['id_item'];
    $nofaktur = $_POST['nofaktur'];
    $namaitem = $_POST['namaitem'];
    $kodeitem = $_POST['kodeitem'];
    $hutang_terbayar = $_POST['hutang_terbayar'];
    $harga_jual_terakhir_item = $_POST['harga_jual_terakhir_item'];
    $metodebayarhutang = $_POST['metodebayarhutang'];
    $totalhargafaktur = $_POST['totalhargafaktur'];

    // Menentukan nilai $status_bayar
    $status_bayar = ($totalhargafaktur == $hutang_terbayar) ? 'Lunas' : 'Belum Lunas';

    $query5 = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur';";
    $sql5 = mysqli_query($conn,$query5);

    $result5 = mysqli_fetch_assoc($sql5);
    $tanggal = $result5['tanggal'];
    $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));

    // Update query
    $query = "UPDATE transaksijual SET 
        hutang_terbayar = '$hutang_terbayar',
        status_bayar = '$status_bayar',
        metodebayarhutang = '$metodebayarhutang',
        jatuhtempo = '$jatuhTempo' 
        WHERE nofaktur = '$nofaktur';";
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