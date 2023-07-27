<?php 
    include '../koneksi.php';
    include 'headermaster.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
    
    // Check the current sorting order and modify the SQL query accordingly
    $orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $query = "SELECT * FROM master_satuan ORDER BY nama_satuan $orderClause;";
    $sql = mysqli_query($conn, $query);

    $query2 = "SELECT * FROM master_kategori ORDER BY nama_kategori $orderClause;";
    $sql2 = mysqli_query($conn, $query2);

    $query3 = "SELECT * FROM master_supplier ORDER BY kode_supplier $orderClause;";
    $sql3 = mysqli_query($conn, $query3);

    $query4 = "SELECT * FROM master_item ORDER BY kode_item $orderClause;";
    $sql4 = mysqli_query($conn, $query4);

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



  <div class="container">
    <div class="content">
      <h2>Master Item</h2>

      <button id="expandButton" class="expand-button">Tambahkan Item</button>
      <div id="formSection">   
  <form method="POST" action="prosesmaster/prosesitem.php">
  <label for="namaitem">Nama Item:</label>
  <input type="text" id="namaitem" name="namaitem" required>

  <label for="kodeitem">Kode Item:</label>
  <input type="text" id="kodeitem" name="kodeitem" required>
  
  <label for="Satuan">Satuan:</label>
  <select id="Satuan" name="Satuan" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql)) {
        $optionValue = $result['id_satuan'];
        $optionName = $result['nama_satuan'];
        echo "<option value='$optionValue'>$optionName</option>";
      }
    ?>
  </select>
  
  <label for="kategori">Kategori:</label>
  <select id="kategori" name="kategori" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql2)) {
        $optionValue = $result['id_kategori'];
        $optionName = $result['nama_kategori'];
        echo "<option value='$optionValue'>$optionName</option>";
      }
    ?>
  </select>

  <label for="supplier">Supplier:</label>
  <select id="supplier" name="supplier" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql3)) {
        $optionValue = $result['id_supplier'];
        $optionName = $result['nama_supplier'];
        $optionCode = $result['kode_supplier'];
        echo "<option value='$optionCode'>$optionCode - $optionName</option>";
      }
    ?>
  </select>

  <label for="harga_beli_terakhir_item">Harga Beli Terakhir Item:</label>
  <input type="text" id="harga_beli_terakhir_item" name="harga_beli_terakhir_item" required>

  <button type="submit">Submit</button>
</form>
</div>
      
      
    
    <input type="text" id="searchInput" placeholder="Search..." />

    <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th><a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">Kode Item<span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a></th>
            <th>Nama Item</th>
            <th>Kategori</th>
            <th>Satuan</th>
            <th>Supplier</th>
            <th>Harga Beli Terakhir</th>

            <th>Edit atau Hapus</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql4)){
          ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $result['kode_item']; ?></td>
            <td ><?php echo $result['nama_item']; ?></td>
            <td ><?php echo $result['kategori_item']; ?></td>
            <td ><?php echo $result['satuan_item']; ?></td>
            <td ><?php echo $result['kode_supplier_item']; ?></td>
            <td >Rp. <?php echo $result['harga_beli_terakhir_item']; ?>,00</td>
            
            

            <td style="text-align: center;">
              <a href="kelolamaster/kelolaitem.php?ubah=<?php echo $result['id_item']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a>
              <a href="prosesmaster/prosesitem.php?hapus=<?php echo $result['id_item']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $result['nama_item']; ?> tersebut???')" style="text-decoration: none;">
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
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var expandButton = document.getElementById('expandButton');
    var formSection = document.getElementById('formSection');

    formSection.style.display = 'none'; // Hide the form section initially
    expandButton.textContent = 'Tambahkan Item'; // Set the initial button text

    expandButton.addEventListener('click', function() {
      if (formSection.style.display === 'none') {
        formSection.style.display = 'block';
        expandButton.textContent = 'Batal'; // Update button text when expanded
      } else {
        formSection.style.display = 'none';
        expandButton.textContent = 'Tambahkan Item'; // Update button text when collapsed
      }
    });
  });
</script>

</body>
</html>