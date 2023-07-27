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
<body>
<div class="container">
    <div class="content">
    <img src="../../IconImage/dbjm.png"  class="logo">
<h1>Faktur Penjualan</h1>
<?php
        if (isset($_GET['nofaktur'])) {
            $nofaktur = $_GET['nofaktur'];
            $query = "SELECT * FROM transaksijual WHERE nofaktur = '$nofaktur'";
            $result = mysqli_query($conn, $query);
            $result1 = mysqli_query($conn, $query);
            $row1 = mysqli_fetch_assoc($result1);
            $kodesup = $row1['Member'];
            $query2 = "SELECT * FROM master_member WHERE kode_member = '$kodesup'";
            $result2 = mysqli_query($conn, $query2);
            $row2 = mysqli_fetch_assoc($result2);
            ?>
<table>
<tr >
    <td class="awal" style="width: 100px;">No Faktur</td>
    <td class="awal" >: <?php echo $nofaktur; ?></td>

    <td></td>

    <td class="awal">Member</td>
    <td class="awal">:  <?php echo $row2['nama_member']; ?></td>
    
</tr>
<tr >
    <td class="awal" >Jenis Bayar</td>
    <td class="awal">: <?php echo $row1['jenis_bayar']; ?></td>
    
    <td></td>

    <td class="awal">Kode Member</td>
    <td class="awal">:  <?php echo $row2['kode_member']; ?></td>
</tr>
<tr>
    <td class="awal">Tanggal</td>
    <td class="awal">: <?php echo date('d-m-Y', strtotime($row1['tanggal'])); ?></td>

    <td></td>

    <td class="awal">Alamat Member</td>
    <td class="awal">:  <?php echo $row2['alamat_member']; ?></td>
</tr>
<tr >
<td class="awal">Jatuh Tempo</td>
        <?php if ($row1['jenis_bayar'] == 'Cash'): ?>
    <td class="awal">: -</td>
        <?php else: ?>
    <td class="awal">: <?php echo date('d-m-Y', strtotime($row1['jatuhtempo'])); ?></td>
        <?php endif; ?>
    
        <td></td>

        <td class="awal">Contact Person</td>
    <td class="awal">:  <?php echo $row2['contactperson_member']; ?></td>
</tr>
<tr>
    <td class="awal"></td>
    <td class="awal"></td>

    <td style="width: 300px;"> </td>

    <td class="awal">No Telp Member</td>
    <td class="awal">:  <?php echo $row2['no_telp_member']; ?></td>
        </tr>
</table>
<h1> </h1>
<h1> </h1>
<button class="print-button" onclick="window.print()">Print</button>
<table>
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        </th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Jual</th>
        <th>Harga Jual Total</th>


    </tr>
    </thead>
    <tbody>
        <?php
            
            
            while ($row = mysqli_fetch_assoc($result)) {

                // Mendapatkan total harga dari hasil query
                $total_harga = $row['quantity'] * $row['harga_jual'];
                $total_harga_faktur += $total_harga;
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row['kode_item']; ?></td>
                    <td><?php echo $row['barang']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo number_format($row['harga_jual'],0,',','.'); ?></td>
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
</html>