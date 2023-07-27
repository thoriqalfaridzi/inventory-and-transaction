<?php
include '../../../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Tangkap data yang dikirimkan oleh form returbeli.php
$barang = $_POST['barang'];
$tanggalRetur = $_POST['tanggalretur'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];
$diganti = 'Belum';
$supplier = $_POST['supplier'];
$nofaktur = $_POST['nofaktur'];

// Query untuk menyimpan data retur penbelian ke dalam tabel retur_penbelian
$sql = "INSERT INTO retur_pembelian
(barang, 
tanggalretur, 
jumlah, 
keterangan, 
diganti, 
supplier,
nofaktur) 
VALUES 
('$barang', 
'$tanggalRetur', 
'$jumlah', 
'$keterangan', 
'$diganti', 
'$supplier',
'$nofaktur')";

if (mysqli_query($conn, $sql)) {
    echo "Data retur pembelian berhasil disimpan.";
    header('Location: ../../../backuprestore/transaksi/autobackup.php');
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Query untuk mengupdate quantity dalam tabel inventory
// $sqlUpdate = "UPDATE inventory SET quantity = quantity - '$jumlah' WHERE item_name = '$barang'";

// if (mysqli_query($conn, $sqlUpdate)) {
//     echo "Data inventory berhasil diperbarui.";
//     //header('Location: ../returbeli.php');
//     header('Location: ../../../backuprestore/transaksi/autobackup.php');
// } else {
//     echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
// }

// Tutup koneksi
mysqli_close($conn);
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    $query = "DELETE FROM retur_pembelian WHERE id = '$id';";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header('Location: ../returbeli.php');
        //exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>