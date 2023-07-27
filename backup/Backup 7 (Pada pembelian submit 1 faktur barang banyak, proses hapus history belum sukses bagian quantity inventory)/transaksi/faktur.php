<?php
include '../koneksi.php';
include 'headertransaksi.php';
$no = 0;
$total_harga_faktur =0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    </head>
<body>
<div class="container">
    <div class="content">
<h1>Beli Barang dan Masukkan ke Gudang</h1>

<table id="printTable">
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        </th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Beli per pcs</th>
        <th>Harga Beli Total</th>


    </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_GET['nofaktur'])) {
            $nofaktur = $_GET['nofaktur'];
            $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {

                // Mendapatkan total harga dari hasil query
                $total_harga = $row['quantity'] * $row['harga_beli'];
                $total_harga_faktur += $total_harga;
        ?>
        <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $row['Barang']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $total_harga; ?></td>

            </td>

        </tr>
        <?php
    }?>
    <tr>
    <td></td>
    <td>Total Harga Faktur</td>
    <td><?php echo $total_harga_faktur; ?></td>       
    </tr>
    <?php
    }

?>

    </tbody>
</table>

