<?php
// Koneksi ke database
include '../../koneksi.php';
include 'headerretur.php';
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
$no = 0;
// Check the current sorting order and modify the SQL query accordingly
$orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
$query1 = "SELECT DISTINCT barang FROM transaksijual;";
$sql1 = mysqli_query($conn, $query1);

$query2 = "SELECT * FROM inventory ORDER BY item_name $orderClause;";
$sql2 = mysqli_query($conn, $query2);

$query3 = "SELECT * FROM retur_penjualan ORDER BY tanggalretur $orderClause;";
$sql3 = mysqli_query($conn, $query3);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Stok Barang</title>
  <link rel="stylesheet" href="../../CSS/styles.css">
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

  
  <form method="POST" action="prosesretur/prosesreturjual.php">
  <label for="barang">Barang:</label>
  <select id="barang" name="barang" required>
    <?php
      while ($result = mysqli_fetch_assoc($sql1)) {
        $optionValue = $result['id'];
        $optionName = $result['barang'];
        echo "<option value='$optionName'>$optionName</option>";
      }
    ?>
  </select>


  <label for="jumlah">Quantity:</label>
    <input type="number" name="jumlah" required>

  <label for="tanggalretur">Tanggal:</label>
        <input type="date" name="tanggalretur" required>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" required>

  <button type="submit">Submit</button>
</form>

      
      
    
    <input type="text" id="searchInput" placeholder="Search..." />

    <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th><a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">Tanggal Retur<span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a></th>
            <th>Nama Item</th>
            <th>Jumlah</th>
            <th>Keterangan</th>        
          </tr>
        </thead>
        <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql3)){
          ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $result['tanggalretur']; ?></td>
            <td ><?php echo $result['barang']; ?></td>
            <td ><?php echo $result['jumlah']; ?></td>
            <td ><?php echo $result['keterangan']; ?></td>
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