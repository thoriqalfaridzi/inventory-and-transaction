<?php
$conn = mysqli_connect("localhost", "root", "", "barang_gudang");
$filePath = "C:/xampp/htdocs/GudangRivky/backuprestore/autobackup.sql";

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

restoreMysqlDB($filePath, $conn);
header('Location: ../transaksi/beli.php');
?>
