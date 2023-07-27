<?php
// Include file koneksi
include '../koneksi.php';

if (isset($_GET['hapus']) && $_GET['hapus'] === 'yes') {
    // Pastikan parameter nofaktur dan kode_item tersedia
    if (isset($_GET['nofaktur']) && isset($_GET['kode_item'])) {
        // Lakukan sanitasi terhadap nilai yang diterima, jika diperlukan
        $nofaktur = $_GET['nofaktur'];
        $kode_item = $_GET['kode_item'];

        // Ambil nilai quantity dari tabel transaksibeli berdasarkan nofaktur dan kode_item
        $query_get_quantity = "SELECT quantity FROM transaksijual WHERE nofaktur = '$nofaktur' AND kode_item = '$kode_item'";
        $result_get_quantity = mysqli_query($conn, $query_get_quantity);
        $row_get_quantity = mysqli_fetch_assoc($result_get_quantity);
        $quantity = $row_get_quantity['quantity'];

        // Buat pernyataan SQL untuk menghapus data item dengan nofaktur dan kode_item tertentu
        $query = "DELETE FROM transaksijual WHERE nofaktur = '$nofaktur' AND kode_item = '$kode_item'";

        // Buat pernyataan SQL untuk mengupdate quantity di tabel inventory
        $query_update_inventory = "UPDATE inventory SET quantity = quantity + $quantity WHERE kode_item = '$kode_item'";
        $result_update_inventory = mysqli_query($conn, $query_update_inventory);

        // Eksekusi pernyataan SQL untuk menghapus data
        if (mysqli_query($conn, $query)) {
            // Redirect kembali ke halaman sebelumnya setelah menghapus data
            header("Location: jual.php");
            exit();
        } else {
            echo "Error dalam menghapus data: " . mysqli_error($conn);
        }
    } else {
        // Jika parameter nofaktur atau kode_item tidak tersedia
        echo "Parameter nofaktur dan kode_item tidak valid.";
    }
}
?>
