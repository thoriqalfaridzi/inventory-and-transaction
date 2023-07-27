<?php
include '../../koneksi.php';

$query2 = "SELECT * FROM master_item";
$result2 = mysqli_query($conn, $query2);

while ($row = mysqli_fetch_assoc($result2)) {
    $id_item = $row['id_item'];
    $kodeitem = $row['kode_item'];

    $query = "UPDATE transaksibeli SET id_item = '$id_item' WHERE kode_item = '$kodeitem';";
    $result = mysqli_query($conn, $query);

    $query = "UPDATE transaksijual SET id_item = '$id_item' WHERE kode_item = '$kodeitem';";
    $result = mysqli_query($conn, $query);
}

?>
