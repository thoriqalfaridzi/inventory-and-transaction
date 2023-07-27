<?php 
    include '../koneksi.php';
    include 'headertransaksi.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
    
    // Check the current sorting order and modify the SQL query accordingly
    $orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $query = "SELECT * FROM biaya_lain ORDER BY bulan $orderClause;";
    $sql = mysqli_query($conn, $query);
    $bulan = $_POST['bulan'] ?? date('n'); // Ambil bulan yang dipilih oleh pengguna dari form, defaultnya bulan sekarang
    $tahun = $_POST['tahun'] ?? date('Y'); // Ambil tahun yang dipilih oleh pengguna dari form, defaultnya tahun sekarang
    $no = 0;
    $bulanArr = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );
    //var_dump($result);
    //echo $result['Kode_Barang'];
    $queryadd = "SELECT * FROM biaya_lain WHERE bulan = $bulan AND tahun= $tahun;";
    $sqladd = mysqli_query($conn, $queryadd);
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
      <h2>Daftar Biaya Lain</h2>
      <button id="expandButton" class="expand-button">Tambahkan Biaya Lain</button>
      <div id="formSection"> 
            <form method="POST" action="prosesaddbiaya.php">
                <label for="keterangan">Keterangan:</label>
                <input type="text" id="keterangan" name="keterangan" required>
                <label for="biaya">Biaya:</label>
                <input type="text" id="biaya" name="biaya" required>
                <label for="bulan">Bulan:</label>
                <select name="bulan" id="bulan">
                    <option value="1" <?php if ($bulan == 1) echo 'selected'; ?>>Januari</option>
                    <option value="2" <?php if ($bulan == 2) echo 'selected'; ?>>Februari</option>
                    <option value="3" <?php if ($bulan == 3) echo 'selected'; ?>>Maret</option>
                    <option value="4" <?php if ($bulan == 4) echo 'selected'; ?>>April</option>
                    <option value="5" <?php if ($bulan == 5) echo 'selected'; ?>>Mei</option>
                    <option value="6" <?php if ($bulan == 6) echo 'selected'; ?>>Juni</option>
                    <option value="7" <?php if ($bulan == 7) echo 'selected'; ?>>Juli</option>
                    <option value="8" <?php if ($bulan == 8) echo 'selected'; ?>>Agustus</option>
                    <option value="9" <?php if ($bulan == 9) echo 'selected'; ?>>September</option>
                    <option value="10" <?php if ($bulan == 10) echo 'selected'; ?>>Oktober</option>
                    <option value="11" <?php if ($bulan == 11) echo 'selected'; ?>>November</option>
                    <option value="12" <?php if ($bulan == 12) echo 'selected'; ?>>Desember</option>
                </select>
                <label for="tahun">Tahun:</label>
                <input type="number" name="tahun" id="tahun" min="2000" max="2099" value="<?php echo $tahun; ?>">
                <button type="submit">Submit</button>
            </form> 
      </div>
    
      <form method="POST" action="">
            <label for="bulan">Bulan:</label>
            <select name="bulan" id="bulan">
            <option value="1" <?php if ($bulan == 1) echo 'selected'; ?>>Januari</option>
                <option value="2" <?php if ($bulan == 2) echo 'selected'; ?>>Februari</option>
                <option value="3" <?php if ($bulan == 3) echo 'selected'; ?>>Maret</option>
                <option value="4" <?php if ($bulan == 4) echo 'selected'; ?>>April</option>
                <option value="5" <?php if ($bulan == 5) echo 'selected'; ?>>Mei</option>
                <option value="6" <?php if ($bulan == 6) echo 'selected'; ?>>Juni</option>
                <option value="7" <?php if ($bulan == 7) echo 'selected'; ?>>Juli</option>
                <option value="8" <?php if ($bulan == 8) echo 'selected'; ?>>Agustus</option>
                <option value="9" <?php if ($bulan == 9) echo 'selected'; ?>>September</option>
                <option value="10" <?php if ($bulan == 10) echo 'selected'; ?>>Oktober</option>
                <option value="11" <?php if ($bulan == 11) echo 'selected'; ?>>November</option>
                <option value="12" <?php if ($bulan == 12) echo 'selected'; ?>>Desember</option>
                <!-- Tambahkan opsi bulan lainnya -->
            </select>
            <label for="tahun">Tahun:</label>
            <input type="number" name="tahun" id="tahun" min="2000" max="2099" value="<?php echo $tahun; ?>">
            <button type="submit">Tampilkan</button>
        </form>
    <input type="text" id="searchInput" placeholder="Search..." />
      <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th>
            <a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">
                Bulan
                <span class="sort-icon"><?php echo $sortIcon; ?></span>
            </a>
            </th>
            <th>Tahun</th>
            <th>Keterangan</th>
            <th>Biaya</th>
            <th>Edit atau Hapus</th>
          </tr>
        </thead>
        <tbody>
          <?php
while ($resultadd = mysqli_fetch_assoc($sqladd)) {
    //$resultjual = mysqli_fetch_assoc($sqljual); // Ambil data transaksi penjualan yang sesuai dengan data transaksi pembelian

    ?>
            <td><?php echo ++$no; ?></td>
            <td class="namaBarang"><?php echo $bulanArr[$resultadd['bulan']]; ?></td>
            <td class="namaBarang"><?php echo $resultadd['tahun']; ?></td>
            <td class="namaBarang"><?php echo $resultadd['keterangan']; ?></td>
            <td class="namaBarang">Rp. <?php echo $resultadd['biayalain']; ?></td>

            <td style="text-align: center;">
              <a href="kelolabiayalain/kelolabiayalain.php?ubah=<?php echo $resultadd['id']; ?>" type="button" style="text-decoration: none;">
                <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
              </a>
              <a href="prosesaddbiaya.php?hapus=<?php echo $resultadd['id']; ?>" type="button" onClick="return confirm('Apakah anda yakin ingin menghapus data biaya lain dengan keterangan (<?php echo $resultadd['keterangan']; ?>) tersebut???')" style="text-decoration: none;">
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
    expandButton.textContent = 'Tambahkan Biaya Lain'; // Set the initial button text

    expandButton.addEventListener('click', function() {
      if (formSection.style.display === 'none') {
        formSection.style.display = 'block';
        expandButton.textContent = 'Batal'; // Update button text when expanded
      } else {
        formSection.style.display = 'none';
        expandButton.textContent = 'Tambahkan Biaya Lain'; // Update button text when collapsed
      }
    });
  });
</script>
</body>
</html>
