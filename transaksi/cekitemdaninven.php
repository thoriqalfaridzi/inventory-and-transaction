<?php
include '../koneksi.php';

$query1 = "SELECT * FROM master_item ORDER BY id_item;";
$sql1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM inventory ORDER BY id_item;";
$sql2 = mysqli_query($conn, $query2);

$no = 0;

session_start();
if (!isset($_SESSION['session_username'])) {
    header("location:../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Stok Barang</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>


<table>
    <thead>
    <tr>
        <th style="width: 40px;">No</th>
        <th>id master item</th>
        <th>Master Item</th>
        <th>Kode master</th>
        <th>kode invent</th>
        <th>id invent</th>
        <th>nama invent</th>

    </tr>
    </thead>
    <tbody>
    <?php
    while ($result1 = mysqli_fetch_assoc($sql1)) {
        $result2 = mysqli_fetch_assoc($sql2);
        if ($result1['id_item'] == $result2['id_item']) {
            if ($result1['nama_item'] != $result2['item_name'] || $result1['kode_item'] != $result2['kode_item']) {
    ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $result1['id_item']; ?></td>
                    <td><?php echo $result1['nama_item']; ?></td>
                    <td><?php echo $result1['kode_item']; ?></td>
                    <td><?php echo $result2['kode_item']; ?></td>
                    <td><?php echo $result2['id_item']; ?></td>
                    <td><?php echo $result2['item_name']; ?></td>
                </tr>
    <?php
            }
        }
    }
    ?>
    </tbody>
</table>
</body>
</html>
