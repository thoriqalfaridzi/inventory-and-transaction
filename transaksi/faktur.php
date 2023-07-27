<?php
include '../koneksi.php';
include 'headertransaksi.php';
$no = 0;
$total_harga_faktur =0;
if (isset($_GET['nofaktur'])) {
    $nofaktur = $_GET['nofaktur'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script>
    

        function printTable() {
        var table = document.getElementById('printTable');
        var newWin = window.open('', 'Print', 'height=500,width=600');

        newWin.document.write('<html><head><title>Print</title></head><body>');
        newWin.document.write(table.outerHTML);
        newWin.document.write('</body></html>');

        newWin.print();
        newWin.close();
    }
    </script>
</head>
<body>
<div class="container">
    <div class="content">
<h1>Faktur <?php echo $nofaktur;?></h1>
<button onclick="printTable()">Print</button>
<button>
    <a href='tambah1faktur.php?tambah=<?php echo $nofaktur; ?>'>Tambahkan Item</a>
</button>

<!-- edit -->



              
<table id="printTable">
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        </th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Beli per pcs</th>
        <th>Harga Beli Total</th>


    </tr>
    </thead>
    <tbody>
        <?php
        
            
            $query = "SELECT * FROM transaksibeli WHERE nofaktur = '$nofaktur'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {

                // Mendapatkan total harga dari hasil query
                $total_harga = $row['quantity'] * $row['harga_beli'];
                $total_harga_faktur += $total_harga;
                $diskon = $row['diskonfaktur'];
                ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row['kode_item']; ?></td>
                    <td><?php echo $row['Barang']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
                    <td><?php echo number_format($total_harga,0,',','.'); ?></td>
                    <td>
                        <a href="prosesfaktur.php?hapus=yes&nofaktur=<?php echo $row['nofaktur']; ?>&kode_item=<?php echo $row['kode_item']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data transaksi dengan nomor faktur <?php echo $row['nofaktur']; ?> dan kode item <?php echo $row['kode_item']; ?> tersebut???')" style="text-decoration: none;">
                            <img src="../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
                        </a>
                    </td>


                </tr>
                <?php
                }   
                ?>
                <tr>
                <td></td>
                <td>Total Harga Faktur</td>
                <td><?php echo number_format($total_harga_faktur,0,',','.'); ?></td>       
                </tr>

                <tr>
                <td><a href="kelolafaktur.php?ubah=<?php echo $nofaktur; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a></td>
                <td>Diskon <?php echo $diskon?> %</td>
                <td><?php 
                $harga_diskon = ($diskon / 100) * $total_harga_faktur;
                echo number_format($harga_diskon,0,',','.'); 
                ?></td>       
                </tr>

                <tr>
                <td></td>
                <td>Harga Akhir</td>
                <td><?php 
                $harga_faktur_akhir = $total_harga_faktur - $harga_diskon;
                echo number_format($harga_faktur_akhir,0,',','.'); 
                ?></td>       
                </tr>
                <?php
                }

?>

    </tbody>
</table>

