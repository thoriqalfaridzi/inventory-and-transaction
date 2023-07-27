<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_member = $_POST['id_member'];
    $namamember = $_POST['nama_member'];
    $alamatmember = $_POST['alamatmember'];
    $contactpersonmember = $_POST['contactperson'];
    $notelpmember = $_POST['notelp'];
    $nohpmember = $_POST['nohp'];
    $kodemember = $_POST['kodemember'];
    $keterangan = $_POST['keterangan'];



    // Update query
    $query = "UPDATE master_member SET 
        nama_member = '$namamember', 
        kode_member = '$kodemember',
        alamat_member = '$alamatmember',
        contactperson_member = '$contactpersonmember',
        no_telp_member = '$notelpmember',
        no_hp_member = '$nohpmember', 
        keterangan_member = '$keterangan'
        WHERE id_member = '$id_member';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        header('Location: ../MasterMember.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>