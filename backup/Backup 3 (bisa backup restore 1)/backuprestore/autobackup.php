<?php
    //ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "barang_gudang";
    $backup_name        = "autobackup.sql";
    $tables             = array("transaksibeli");

   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName, $tables, $backup_name);

    function Export_Database($host,$user,$pass,$name, $tables, $backup_name)
    {
        $mysqli = new mysqli($host,$user,$pass,$name);
        $mysqli->select_db($name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES');
        while($row = $queryTables->fetch_row())
        {
            $target_tables[] = $row[0];
        }
        if($tables !== false)
        {
            $target_tables = array_intersect($target_tables, $tables);
        }

        $content = '';

        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);
            $fields_amount  =   $result->field_count;
            $rows_num       =   $result->num_rows;
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table);
            $TableMLine     =   $res->fetch_row();
            $content        .=  "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0)
            {
                $content .= "\nINSERT INTO ".$table." VALUES";

                while($row = $result->fetch_row())
                {
                    if ($st_counter%100 == 0 || $st_counter == 0)
                    {
                        $content .= "\n(";
                    }
                    else
                    {
                        $content .= ",\n(";
                    }

                    for($j = 0; $j < $fields_amount; $j++)
                    {
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) );

                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"';
                        }
                        else
                        {
                            $content .= '""';
                        }

                        if ($j < ($fields_amount - 1))
                        {
                            $content .= ',';
                        }
                    }

                    $content .= ")";
                    $st_counter++;
                }

                if ($st_counter > 0)
                {
                    $content .= ";";
                }
            }

            $content .= "\n\n\n";
        }

        //$backup_name = $backup_name ? $backup_name : $name . "_" . date('Y-m-d_H-i-s') . ".sql";

        $backup_path = "C:/xampp/htdocs/GudangRivky/backuprestore/" . $backup_name;
        file_put_contents($backup_path, $content);

        // Tampilkan pesan bahwa backup telah berhasil
        echo "Backup telah berhasil disimpan di: ".$backup_path;
        header('Location: ../transaksi/beli.php');
    }
?>
