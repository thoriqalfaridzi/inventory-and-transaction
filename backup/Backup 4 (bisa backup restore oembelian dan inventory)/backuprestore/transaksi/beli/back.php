<!DOCTYPE html>
<html>
<head>
    <title>Backup dan Restore Database</title>
</head>
<body>
    <h1>Backup dan Restore Database Barang Gudang</h1>

    <!-- Formulir untuk melakukan backup -->
    <form action="backup.php" method="post">
        <input type="submit" name="backup" value="Backup Tabel">
    </form>

    <!-- Formulir untuk melakukan restore -->
    <form action="restore.php" method="post">
        <input type="submit" name="restore" value="Restore Tabel">
    </form>
</body>
</html>
