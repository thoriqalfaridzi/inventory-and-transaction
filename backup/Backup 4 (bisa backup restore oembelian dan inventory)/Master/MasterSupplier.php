<?php 
    include '../koneksi.php';
    include 'headermaster.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
    
    // Check the current sorting order and modify the SQL query accordingly
    $orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $query = "SELECT * FROM master_supplier ORDER BY kode_supplier $orderClause;";
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

  
  <div class="container">
    <div class="content">
      <h2>Master Supplier</h2>
      <button id="expandButton" class="expand-button">Tambahkan Supplier</button>
      <div id="formSection"> 
      
      <form method="POST" action="prosesmaster/prosessupplier.php">
        <label for="kodesupplier">Kode supplier:</label>
        <input type="text" id="kodesupplier" name="kodesupplier" required>
       
        <label for="supplier">supplier:</label>
        <input type="text" id="supplier" name="supplier" required>

        <label for="alamatsupplier">Alamat supplier:</label>
        <input type="text" id="alamatsupplier" name="alamatsupplier" required>

        <label for="contactperson">Contact Person:</label>
        <input type="text" id="contactperson" name="contactperson" required>

        <label for="notelp">No Telp:</label>
        <input type="text" id="notelp" name="notelp" required>

        <label for="nohp">No HP:</label>
        <input type="text" id="nohp" name="nohp">



        <button type="submit">Submit</button>
      </form>
  </div>
      
    
    <input type="text" id="searchInput" placeholder="Search..." />

      <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th><a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">Kode supplier<span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a></th>
            <th>Nama supplier</th>
            <th>Alamat supplier</th>
            <th>Contact Person</th>
            <th>No. Telp</th>
            <th>No. HP</th>

            <th>Edit atau Hapus</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
            while($result = mysqli_fetch_assoc($sql)){
          ?>
          <tr>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $result['kode_supplier']; ?></td>
            <td ><?php echo $result['nama_supplier']; ?></td>
            <td ><?php echo $result['alamat_supplier']; ?></td>
            <td ><?php echo $result['contactperson_supplier']; ?></td>
            <td ><?php echo $result['no_telp_supplier']; ?></td>
            <td ><?php echo $result['no_hp_supplier']; ?></td>
            

            <td style="text-align: center;">
              <a href="kelolamaster/kelolasupplier.php?ubah=<?php echo $result['id_supplier']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a>
              <a href="prosesmaster/prosessupplier.php?hapus=<?php echo $result['id_supplier']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $result['nama_supplier']; ?> tersebut???')" style="text-decoration: none;">
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
    expandButton.textContent = 'Tambahkan Satuan'; // Set the initial button text

    expandButton.addEventListener('click', function() {
      if (formSection.style.display === 'none') {
        formSection.style.display = 'block';
        expandButton.textContent = 'Batal'; // Update button text when expanded
      } else {
        formSection.style.display = 'none';
        expandButton.textContent = 'Tambahkan Satuan'; // Update button text when collapsed
      }
    });
  });
</script>
</body>
</html>
