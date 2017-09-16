<?php 
include "../../database-manager/config.php";
include "../../database-manager/dbm.php";
$databases = \dbm\get_database_dir();
foreach($databases as $db) {
    foreach($_GET['checkboxes'] as $checkbox) {
        if($db['id'] == $checkbox) {
            //updateDatabaseJSON($databases);
            \dbm\removeDirectory("../../.data/".$db['db_name']);
            \dbm\delete_db($db['id']);
            echo "directory removed\n";
        }
    }
}
 