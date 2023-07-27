<?php
$conn = mysqli_connect("localhost", "root", "", "barang_gudang");

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';

    if (file_exists($filePath)) {
        $lines = file($filePath);

        foreach ($lines as $line) {
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }

            $sql .= $line;

            // Execute SQL statements when reaching the end of each query
            if (substr(trim($line), -1, 1) == ';') {
                // Check if the line contains a CREATE TABLE statement
                if (strpos($sql, 'CREATE TABLE') !== false) {
                    // Extract the table name from the CREATE TABLE statement
                    preg_match('/CREATE TABLE `([a-zA-Z0-9_]+)`/', $sql, $matches);
                    $tableName = $matches[1];

                    // Drop the table if it already exists
                    mysqli_query($conn, "DROP TABLE IF EXISTS `$tableName`");
                }

                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach

        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
    } // end if file exists
    return $response;
}

if (isset($_POST['restore'])) {
    $file = $_FILES['sql_file'];
    $fileName = $file['name'];
    $filePath = $file['tmp_name'];

    // Move the uploaded file to a directory of your choice
    $uploadDirectory = "path/to/your/directory/";
    $targetPath = $uploadDirectory . $fileName;

    if (move_uploaded_file($filePath, $targetPath)) {
        $restoreResult = restoreMysqlDB($targetPath, $conn);

        if ($restoreResult['type'] == "success") {
            header('Location: ../transaksi/beli.php');
            exit;
        } else {
            $errorMessage = $restoreResult['message'];
        }
    } else {
        $errorMessage = "Failed to upload the SQL file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restore Database</title>
</head>
<body>
    <h1>Restore Database</h1>
    <?php if (isset($errorMessage)) : ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="sql_file" accept=".sql">
        <br><br>
        <button type="submit" name="restore">Restore</button>
    </form>
</body>
</html>
