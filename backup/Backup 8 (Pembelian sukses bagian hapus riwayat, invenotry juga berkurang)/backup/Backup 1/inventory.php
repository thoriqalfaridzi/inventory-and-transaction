<?php
include 'koneksi.php';

$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';

// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$query = "SELECT * FROM tb_barang ORDER BY Nama_Barang $orderClause;";

$sql = mysqli_query($conn, $query);

$no = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Triggered when the search input changes
      $('#searchInput').on('input', function() {
        var searchQuery = $(this).val().toLowerCase();

        // Hide rows that don't match the search query
        $('table tbody tr').each(function() {
          var namaBarang = $(this).find('.namaBarang').text().toLowerCase();
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
      <h2>Stok Barang di Gudang</h2>
      <p></p>

      <!-- Add the search input -->
      <input type="text" id="searchInput" placeholder="Search..." />

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>
              
            </th>
            <th>
            <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">
                Kode Barang
                <span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a>
            </th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql)){
          ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $result['Nama_Barang']; ?></td>
            <td><?php echo $result['Kode_Barang']; ?></td>
            <td><?php echo $result['Harga']; ?></td>
          </tr>
          <?php
            }          
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
