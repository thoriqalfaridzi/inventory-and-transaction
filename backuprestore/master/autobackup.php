<?php
//ENTER THE RELEVANT INFO BELOW
$mysqlUserName = "root";
$mysqlPassword = "";
$mysqlHostName = "localhost";
$DbName = "barang_gudang";
//$backup_name = "mybackup2.sql";
//$tables = array("transaksibeli", "inventory", "transaksijual");
$backup_name = "autobackup.sql"; // Menggunakan input pengguna sebagai nama file backup
$tables = array("master_item", "master_kategori", "master_member","master_satuan","master_seller","master_supplier"); // Daftar tabel yang akan di-backup
Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $tables, $backup_name);

//or add 5th parameter(array) of specific tables: array("mytable1","mytable2","mytable3") for multiple tables

//Export_Database($mysqlHostName, $mysqlUserName, $mysqlPassword, $DbName, $tables, $backup_name);

function Export_Database($host, $user, $pass, $name, $tables, $backup_name)
{
    $mysqli = new mysqli($host, $user, $pass, $name);
    $mysqli->select_db($name);
    $mysqli->query("SET NAMES 'utf8'");

    $queryTables = $mysqli->query('SHOW TABLES');
    while ($row = $queryTables->fetch_row()) {
        $target_tables[] = $row[0];
    }
    if ($tables !== false) {
        $target_tables = array_intersect($target_tables, $tables);
    }

    $content = '';

    foreach ($target_tables as $table) {
        $result = $mysqli->query('SELECT * FROM ' . $table);
        $fields_amount = $result->field_count;
        $rows_num = $result->num_rows;
        $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
        $TableMLine = $res->fetch_row();
        $content .= "\n\n" . $TableMLine[1] . ";\n\n";

        while ($row = $result->fetch_row()) {
            $content .= "INSERT INTO " . $table . " VALUES (";

            for ($j = 0; $j < $fields_amount; $j++) {
                $row[$j] = str_replace("\n", "\\n", addslashes($row[$j]));

                if (isset($row[$j])) {
                    $content .= '"' . $row[$j] . '"';
                } else {
                    $content .= '""';
                }

                if ($j < ($fields_amount - 1)) {
                    $content .= ',';
                }
            }

            $content .= ");\n";
        }

        $content .= "\n\n";
    }

    $backup_path = "C:/xampp/htdocs/GudangRivky/backuprestore/master/" . $backup_name;
    file_put_contents($backup_path, $content);

    // Tampilkan pesan bahwa backup telah berhasil
    echo "Backup telah berhasil disimpan di: " . $backup_path;
    header('Location: ../../index.php');
}
?>
