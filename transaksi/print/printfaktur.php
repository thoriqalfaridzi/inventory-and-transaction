<?php
include '../../koneksi.php';

$no = 0;
$total_harga_faktur =0;


?>
<style media="print">
    .print-button {
        display: none;
    }


</style>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tansaksi</title>
    <link rel="stylesheet" href="print.css">

</head>
<header> 
    <!-- <h2>DJAYA BERKAT MOTOR</h2> -->
    <img src="../../IconImage/djbm.png"  class="logo-portrait">

<h1>Faktur Pembelian</h1>
</header>
<body>

<div class="container">
    <div class="content">
    

<?php
        if (isset($_GET['nofaktur'])) {
            $nofaktur = $_GET['nofaktur'];
            $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
            $result = mysqli_query($conn, $query);
            $result1 = mysqli_query($conn, $query);
            $row1 = mysqli_fetch_assoc($result1);
            $kodesup = $row1['Supplier'];
            $query2 = "SELECT * FROM master_supplier WHERE kode_supplier = '$kodesup'";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            ?>
<table>
<tr >
    <td class="awal" style="width: 100px;">No Faktur</td>
    <td class="awal" >: <?php echo $nofaktur; ?></td>

    <td></td>

    <td class="awal" style="width: 100px;">Supplier</td>
    <td class="awal">:  <?php echo $row2['nama_supplier']; ?></td>
    
</tr>
<tr >
<td class="awal">Tanggal</td>
    <td class="awal">: <?php echo date('d-m-Y', strtotime($row1['tanggal'])); ?></td>
    
    <td></td>

    <td class="awal">Alamat Supplier</td>
    <td class="awal">:  <?php echo $row2['alamat_supplier']; ?></td>
</tr>
<tr>
<td class="awal">Jatuh Tempo</td>
        <?php if ($row1['jenis_bayar'] == 'Cash'): ?>
    <td class="awal">: -</td>
        <?php else: ?>
    <td class="awal">: <?php echo date('d-m-Y', strtotime($row1['jatuhtempo'])); ?></td>
        <?php endif; ?>

</tr>


</table>
<h5> </h5>

<button class="print-button" onclick="window.print()">Print</button>
<table>
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        </th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th  style="width: 100px;">Harga</th>
        <th>Harga Beli Total</th>


    </tr>
    </thead>
    <tbody>
        <?php
            
            
            while ($row = mysqli_fetch_assoc($result)) {

                // Mendapatkan total harga dari hasil query
                $total_harga = $row['quantity'] * $row['harga_beli'];
                $total_harga_faktur += $total_harga;
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row['kode_item']; ?></td>
                    <td><?php echo $row['Barang']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
                    <td><?php echo number_format($total_harga,0,',','.'); ?></td>
                </tr>
                <?php
            }   
            ?>
    <tr>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td style="border-top: 1px solid #000000;"></td>
    <td class="totalharga">Total Harga</td>
    <td class="totalharga"><?php echo number_format($total_harga_faktur,0,',','.'); ?></td>       
    </tr>
    <?php
    }

?>

    </tbody>
</table>
<footer>
        <p>ACCOUNT a/n RUDI HARYANTO</p>
        <p>BCA : 6730124731</p>
</footer>
</html>