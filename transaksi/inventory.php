<?php 
    include '../koneksi.php';
    include 'headerinventory.php';
    $sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
    $sortIcon = $sortOrder === 'asc' ? '&#9660;' : '&#9650;';
    
    // Check the current sorting order and modify the SQL query accordingly
    $orderClause = $sortOrder === 'asc' ? 'ASC' : 'DESC';
    $query = "SELECT * FROM inventory ORDER BY kode_item $orderClause;";
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
      <h2>Inventory</h2>
      
      
      
      
    </div>
    <input type="text" id="searchInput" placeholder="Search Item..." />

      <table>
        <thead>
          <tr>
            <th style="width: 40px;">No</th>
            <th><a href="?sort=<?php echo $sortOrder === 'asc' ? 'desc' : 'asc'; ?>"style="color: inherit;text-decoration: none;">Kode Barang<span class="sort-icon"><?php echo $sortIcon; ?></span>
              </a></th>
            <th>Nama Barang</th>

            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Kategori</th>
          </tr>
        </thead>
        <tbody>

 <?php
// while ($result = mysqli_fetch_assoc($sql)) {
//     // if ($result['quantity'] == 0) {
//     //     $kodeBarang = $result['kode_item'];
//     //     $deleteQuery = "DELETE FROM inventory WHERE kode_item = '$kodeBarang';";
//     //     mysqli_query($conn, $deleteQuery);
//     //     continue;
//     // }

//     // Baris kode untuk menampilkan data barang jika jumlahnya lebih dari 0
//     echo '<tr>';
//     echo '<td>' . ++$no . '</td>';
//     echo '<td>' . $result['kode_item'] . '</td>';
//     echo '<td class="namaBarang">' . $result['item_name'] . '</td>';
    
//     echo '<td>' . $result['quantity'] . '</td>';
//     echo '<td>' . $result['satuan'] . '</td>'; // Menampilkan satuan
//     echo '<td>' . $result['kategori'] . '</td>'; // Menampilkan kategori
//     echo '<td>
//   <a href="prosesinventory/kelolainventory.php?ubah=' .$result['id_item'].'" type="button" style="text-decoration: none;">
//     <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
//   </a>

// </td>';
//     echo '</tr>';
// }

while ($result = mysqli_fetch_assoc($sql)) {
  if ($result['quantity'] != 0) {
      echo '<tr>';
      echo '<td>' . ++$no . '</td>';
      echo '<td>' . $result['kode_item'] . '</td>';
      echo '<td class="namaBarang">' . $result['item_name'] . '</td>';
      echo '<td>' . $result['quantity'] . '</td>';
      echo '<td>' . $result['satuan'] . '</td>'; // Menampilkan satuan
      echo '<td>' . $result['kategori'] . '</td>'; // Menampilkan kategori
      echo '<td>
            <a href="prosesinventory/kelolainventory.php?ubah=' .$result['id_item'].'" type="button" style="text-decoration: none;">
              <img src="../IconImage/editimg.png" style="width: 20px; height: 20px;">
            </a>
           </td>';
      echo '</tr>';
  }
}

?>
<tr>
  <td></td>
  <td></td>
            <td></td>
            <td><?php
            $sql = "SELECT SUM(quantity) AS total_quantity FROM inventory";

            // Eksekusi query
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $totalQuantity = $row['total_quantity'];
            
                echo "Total Quantity: " . $totalQuantity;
            } else {
                echo "No records found in inventory.";
            }
            ?></td>
            <td></td>
            <td></td>
            <td></td>
</tr>


          
        </tbody>
      </table>
  </div>
  
  <footer class="footer">
    <p>&copy; 2023 by Thoriq.</p>
  </footer>

</body>
</html>
