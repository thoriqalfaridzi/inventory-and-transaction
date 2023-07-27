<?php
include '../../../koneksi.php';
// Tangkap data yang dikirimkan oleh form returjual.php
$barang = $_POST['barang'];
$tanggalRetur = $_POST['tanggalretur'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];

// Query untuk menyimpan data retur penjualan ke dalam tabel retur_penjualan
$sql = "INSERT INTO retur_penjualan (barang, tanggalretur, jumlah, keterangan) VALUES ('$barang', '$tanggalRetur', '$jumlah', '$keterangan')";

if (mysqli_query($conn, $sql)) {
    echo "Data retur penjualan berhasil disimpan.";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Query untuk mengupdate quantity dalam tabel inventory
$sqlUpdate = "UPDATE inventory SET quantity = quantity + '$jumlah' WHERE item_name = '$barang'";

if (mysqli_query($conn, $sqlUpdate)) {
    echo "Data inventory berhasil diperbarui.";
    header('Location: ../returjual.php');
} else {
    echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>