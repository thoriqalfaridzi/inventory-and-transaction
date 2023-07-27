<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member = $_POST['member'];
    $kodemember = $_POST['kodemember'];
    $alamatmember = $_POST['alamatmember'];
    $contactperson = $_POST['contactperson'];
    $notelp = $_POST['notelp'];
    $nohp = $_POST['nohp'];
    $keterangan = $_POST['keterangan'];
    


    //$jumlah = $_POST['Jumlah'];

    $query = "INSERT INTO master_member (nama_member,kode_member,alamat_member,contactperson_member,no_telp_member,no_hp_member,keterangan_member) 
    VALUES ('$member','$kodemember','$alamatmember','$contactperson','$notelp','$nohp','$keterangan');";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Data inserted successfully.');</script>";
        header('Location: ../MasterMember.php');
    } 
     else {
        echo "Error: " . mysqli_error($conn);
    }
    
}

if(isset($_GET['hapus'])){
    $id_member = $_GET['hapus'];
    $query = "DELETE FROM master_member WHERE id_member = '$id_member';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../MasterMember.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
