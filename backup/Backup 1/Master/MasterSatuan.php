<?php 
    include '../koneksi.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
    
    // Check the current sorting order and modify the SQL query accordingly
    $orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $query = "SELECT * FROM master_satuan ORDER BY nama_satuan $orderClause;";
    $sql = mysqli_query($conn, $query);

    $no = 0;
    //var_dump($result);
    //echo $result['Kode_Barang'];

    session_start();
    if(!isset($_SESSION['session_username'])){
        header("location:../login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="../CSS/styles.css">
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
    <div class="logout-container">
        <h5><a href="../logout.php">Logout</a></h5>
      </div>
  </header>
  
  <nav>
  <ul>
    <li><a href="../index.php">Home</a></li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Master</a>
      <div class="dropdown-content">
        <a href="MasterSatuan.php">Master Satuan</a>
        <a href="MasterItem.php">Master Item</a>
        <a href="MasterKategori.php">Master Kategori</a>
        <a href="MasterSupplier.php">Master Supplier</a>
        <a href="MasterMember.php">Master Member</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="#" class="dropbtn">Transaksi</a>
      <div class="dropdown-content">
        <a href="#">Pembelian</a>
        <a href="#">Penjualan</a>
      </div>
    </li>
  </ul>
</nav>
  
  <div class="container">
    <div class="content">
      <h2>Tambahkan Satuan ke Daftar</h2>
      
      
      <form method="POST" action="prosesmaster/prosessatuan.php">
        <label for="Satuan">Satuan:</label>
        <input type="text" id="Satuan" name="Satuan" required>
       
        <button type="submit">Submit</button>
      </form>
      
      
    </div>
    <input type="text" id="searchInput" placeholder="Search..." />

      <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th>
            <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">
                Satuan
                <span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a>
            </th>
            <th>Edit atau Hapus</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql)){
          ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $result['nama_satuan']; ?></td>

            <td style="text-align: center;">
              <a href="kelolamaster/kelolasatuan.php?ubah=<?php echo $result['id_satuan']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a>
              <a href="prosesmaster/prosessatuan.php?hapus=<?php echo $result['id_satuan']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $result['nama_satuan']; ?> tersebut???')" style="text-decoration: none;">
                <img src="../IconImage/deleteimg.png" style="width: 20px; height: 20px;">
              </a>
            </td>

          </tr>

          <?php
            }          
          ?>
          
        </tbody>
      </table>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>
</body>
</html>
