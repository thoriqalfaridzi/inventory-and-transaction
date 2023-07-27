<?php
include 'koneksi.php';

// Determine the sort order
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

$query = "SELECT * FROM tb_barang ORDER BY Nama_Barang $sortOrder;";
$sql = mysqli_query($conn, $query);

$no = 0;

// Delete item
if(isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM tb_barang WHERE id = '$deleteId';";
    $deleteResult = mysqli_query($conn, $deleteQuery);
    
    if ($deleteResult) {
        echo "<script>alert('Data deleted successfully.');</script>";
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Triggered when the search input changes
      $('#searchInput').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();

        // Hide rows that don't match the search query
        $('table tbody tr').each(function() {
          var namaBarang = $(this).find('td:nth-child(2)').text().toLowerCase();
          if (namaBarang.includes(searchQuery)) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });
  </script>
</head>
<body>
  <header class="header">
    <h1>Stok Barang untuk Rivky</h1>
  </header>

  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="tambah.php">Tambahkan Barang</a></li>
      <li><a href="inventory.php">Inventory</a></li>
      <li><a href="editbarang.php">Edit Barang</a></li>
    </ul>
  </nav>

  <div class="container">
    <div class="content">
      <h2>Sunting Barang di Gunting</h2>
      <p>Gunakan ikon gambar sunting untuk menyunting barang dan gambar sampah untuk menghapus barang dari gudang.</p>

      <!-- Add the search input -->
      <input type="text" id="searchInput" placeholder="Search...">

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>
              <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">
                Nama Produk
                <?php if ($sortOrder === 'asc'): ?>
                  <span class="sort-icon">&#9660;</span>
                <?php else: ?>
                  <span class="sort-icon">&#9650;</span>
                <?php endif; ?>
              </a>
            </th>
            <th>Kode Barang</th>
            <th>Harga</th>
            <th>Edit atau Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php while($result = mysqli_fetch_assoc($sql)): ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td><?php echo $result['Nama_Barang']; ?></td>
            <td><?php echo $result['Kode_Barang']; ?></td>
            <td><?php echo $result['Harga']; ?></td>
            <td style="text-align: center;">
              <a href="kelola.php?ubah=<?php echo $result['id_barang']; ?>" type="button" style="text-decoration: none;">
                <img src="IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a>
              <a href="proses.php?hapus=<?php echo $result['id_barang']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $result['Nama_Barang']; ?> tersebut???')" style="text-decoration: none;">
                <img src="IconImage/deleteimg.png" style="width: 20px; height: 20px;">
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
