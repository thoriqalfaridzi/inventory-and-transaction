<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item = $_POST['id_item'];
    $namaitem = $_POST['namaitem'];
    $kodeitem = $_POST['kodeitem'];
    $satuanitem = $_POST['Satuan'];
    $kategoriitem = $_POST['kategori'];
    $supplieritem = $_POST['supplier'];
    $hargaterakhiritem = $_POST['harga_beli_terakhir_item'];




    // Update query
    $query = "UPDATE master_item SET 
        nama_item = '$namaitem', 
        kode_item = '$kodeitem',
        kode_supplier_item = '$supplieritem',
        kategori_item = '$kategoriitem',
        satuan_item = '$satuanitem',
        harga_beli_terakhir_item = '$hargaterakhiritem' 
        WHERE id_item = '$id_item';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        header('Location: ../MasterItem.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>