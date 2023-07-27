<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nofaktur = $_POST['nofaktur'];
    $diskon = $_POST['diskon'];
    $totalhargafaktur = $_POST['totalhargafaktur'];
    

    $query5 = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur';";
    $sql5 = mysqli_query($conn,$query5);

    $result5 = mysqli_fetch_assoc($sql5);
    $tanggal = $result5['tanggal'];
    $jatuhTempo = date('Y-m-d', strtotime('+90 days', strtotime($tanggal)));

    // Update query
    $query = "UPDATE transaksibeli SET 
        diskonfaktur = '$diskon' 
        WHERE nofaktur = '$nofaktur';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../hutangbeli.php');
        header('Location: ../backuprestore/transaksi/autobackup.php');

        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>