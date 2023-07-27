<?php
include 'headertransaksi.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../CSS/styles.css">
    <title>Backup dan Restore Database</title>
</head>
<body>
    <h1>Backup dan Restore Database Barang Gudang</h1>

<body>
    <h2>Backup Database</h2>
    <form method="POST" action="backup.php">
        <label for="backup_name">Nama File Backup:</label>
        <input type="text" name="backup_name" id="backup_name" required>
        <button type="submit" name="backup">Backup</button>
    </form>


    <!-- <a href="backup.php">Tekan untuk melakukan proses Back Up</a> -->
</body>
</html>
