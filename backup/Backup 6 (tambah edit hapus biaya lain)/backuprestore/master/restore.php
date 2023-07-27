<?php
include 'headermaster.php';
$mysqlUserName = "root";
$mysqlPassword = "";
$mysqlHostName = "localhost";
$DbName = "barang_gudang";

// Fungsi untuk menjalankan proses restore
function restoreDatabase($host, $user, $pass, $name, $file)
{
    $mysqli = new mysqli($host, $user, $pass, $name);
    $mysqli->select_db($name);
    $mysqli->query("SET NAMES 'utf8'");

    // Hapus tabel yang ada sebelum restore
    $mysqli->query("DROP TABLE IF EXISTS master_item");
    $mysqli->query("DROP TABLE IF EXISTS master_kategori");
    $mysqli->query("DROP TABLE IF EXISTS master_member");
    $mysqli->query("DROP TABLE IF EXISTS master_satuan");
    $mysqli->query("DROP TABLE IF EXISTS master_seller");
    $mysqli->query("DROP TABLE IF EXISTS master_supplier");

    
    
    
    

    // Baca file backup
    $content = file_get_contents($file);

    // Eksekusi perintah-perintah dalam file backup
    $queries = explode(";", $content);
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            $mysqli->query($query);
        }
    }

    // Tampilkan pesan bahwa restore telah berhasil
    echo "Restore telah berhasil.";
    echo '<a href="../../transaksi/beli.php">Kembali ke halaman beli</a>';

}

// Cek apakah tombol "Restore" telah ditekan
if (isset($_POST['restore'])) {
    // Pastikan file SQL terupload dengan sukses
    if (isset($_FILES['sql_file']) && $_FILES['sql_file']['error'] === UPLOAD_ERR_OK) {
        // Lokasi sementara file yang diunggah
        $file_tmp = $_FILES['sql_file']['tmp_name'];

        // Jalankan proses restore
        restoreDatabase($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $file_tmp);
    } else {
        // Tampilkan pesan kesalahan jika file gagal diunggah
        echo "Terjadi kesalahan dalam mengunggah file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../CSS/styles.css">
    <title>Restore Database</title>
</head>
<body>
    <h2>Restore Database</h2>
    <form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="file" name="sql_file" accept=".sql">
        <br><br>
        <button type="submit" name="restore">Restore</button>
    </form>
</body>
</html>