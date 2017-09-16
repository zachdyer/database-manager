<?php 
include "../../database-manager/config.php";
include "../../database-manager/dbm.php";
foreach(\dbm\get_database_dir() as $db) {
                ?><tr>
                  <td><input type="checkbox" value="<?php echo $db['id']; ?>" name="checkboxes[]" class="checkbox db-checkbox"></td>
                  <td><?php echo $db['id']; ?></td>
                  <td><?php echo $db['db_name']; ?></td>
                  <td>0</td>
                </tr><?php } ?>