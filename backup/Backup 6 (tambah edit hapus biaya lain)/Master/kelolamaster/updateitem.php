<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item = $_POST['id_item'];
    $namaitem = $_POST['namaitem'];
    $kodeitem = $_POST['kodeitem'];
    $satuan = $_POST['Satuan'];
    $kategori = $_POST['kategori'];
    $supplier = $_POST['supplier'];
    $harga_beli_terakhir_item = $_POST['harga_beli_terakhir_item'];


    $query2 = "SELECT * FROM master_kategori WHERE id_kategori = '$kategori'";
    $result2 = mysqli_query($conn, $query2);
    
    // Fetch the desired data from the result
    if ($row2 = mysqli_fetch_assoc($result2)) {
        $namakategori = $row2['nama_kategori'];
        // Use the $namaSatuan as needed in your code
    }
    
    // SATUAN
    $query3 = "SELECT * FROM master_satuan WHERE id_satuan = '$satuan'";
    $result3 = mysqli_query($conn, $query3);
    
    // Fetch the desired data from the result
    if ($row3 = mysqli_fetch_assoc($result3)) {
        $namaSatuan = $row3['nama_satuan'];
        // Use the $namaSatuan as needed in your code
    }

    $selectedKodeSupplier = $_POST['supplier'];

// Retrieve the 'nama_supplier' based on the selected 'kode_supplier'
    $query4 = "SELECT nama_supplier FROM master_supplier WHERE kode_supplier = '$selectedKodeSupplier'";
    $result4 = mysqli_query($conn, $query4);
    $row = mysqli_fetch_assoc($result4);
    $namaSupplier = $row['nama_supplier'];
    $combinedValue = $selectedKodeSupplier . ' - ' . $namaSupplier;

    // Update query
    $query = "UPDATE master_item SET 
        nama_item = '$namaitem', 
        kode_item = '$kodeitem',
        kode_supplier_item = '$combinedValue',
        kategori_item = '$namakategori',
        satuan_item = '$namaSatuan',
        harga_beli_terakhir_item = '$harga_beli_terakhir_item' 
        WHERE id_item = '$id_item';";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data updated successfully.');</script>";
        //header('Location: ../MasterItem.php');
        header('Location: ../../backuprestore/master/autobackup.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>