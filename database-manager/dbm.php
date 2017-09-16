<?php 
namespace dbm;

function get_database_dir() {
    global $root_path;
    $json = file_get_contents($root_path . "/database-manager/.data/databases.json");
    return json_decode($json, true);
}

function get_database_menu() {
    foreach(get_database_dir() as $dir) {
        $active = "";
        $sr_only = "";
        if($_GET['db'] == $dir['db_name']) {
            $active = "active";
            $sr_only = ' <span class="sr-only">(current)</span>';
        }
        echo '<li class="nav-item">';
        echo '<a class="nav-link '.$active.'" href="?page=db&db='.$dir['db_name'].'">'.$dir['db_name'].$sr_only."</a>";
        echo '</li>';
    }
}

function menu_active($page) {
    if($page == 'home' && empty($_GET)) {
        echo " active";
    }
    if($page == $_GET['page']) {
        echo " active";
    }
}

function create_db($db_name) {
    global $root_path;
    $json = get_json($root_path . "/database-manager/.data/databases.json");
    $next_id = end($json)['id'] + 1;
    array_push($json, array("id"=>$next_id, "db_name"=> $db_name));
    file_put_contents($root_path . "/database-manager/.data/databases.json", json_encode($json, JSON_PRETTY_PRINT));
    mkdir($root_path . "/database-manager/.data/" . $db_name);
}

function delete_db($db_id) {
    global $root_path;
    $json = get_database_dir();
    foreach($json as $i=>$dir) {
        if($dir['id'] == $db_id) {
            unset($json[$i]);
            break;
        }
    }
    file_put_contents($root_path . "/database-manager/.data/databases.json", json_encode($json));
}

function notify($type, $message) {
    global $notification;
    $notification .= '<div class="alert alert-'.$type.'">';
    $notification .= $message;
    $notification .= '</div>';
}

function db_exist($db_name) {
    foreach(get_database_dir() as $dir) {
        if($dir['db_name'] == $db_name) {
            return true;
        }
    }
    return false;
}

function content() {
    if(empty($_GET['page'])) {
        $_GET['page'] = 'dashboard'; 
    }
    include "../database-manager/views/pages/" . $_GET['page'] . ".php";
}

function get_json($file) {
    $json = file_get_contents($file);
    return json_decode($json, true);
}

function get_db_json() {
    global $root_path;
    //get file names in folder
    $path = $root_path . "/database-manager/.data/" . $_GET['db'];
    $records;
    foreach(scandir($path) as $file){
        //filter out the dot directories
        if($file != "." && $file != "..") {
            $filepath = $path . "/" . $file;
            $filesize = filesize($filepath);
            $str = file_get_contents($filepath);
            $json = json_decode($str, true);
            $records = count($json);
            $fields = count($json[0]);
            $notes = $json[0]['notes'];
            echo '<tr>';
            echo '<td><a href="/index.php?page=json&db='.$_GET['db'].'&json='.trim($file, ".json").'">';
            echo trim($file, ".json").'</a></td>';
            echo '<td>'.$records.'</td>';
            echo '<td>'.$filesize.' bytes</td>';
            echo '<td>'.$fields.'</td>';
            echo '<td>'.$notes.'</td>';
            echo '</tr>';
        }
        
    }
}

function get_json_fields() {
    global $root_path;
    //get file names in folder
    $filepath = $root_path . "/database-manager/.data/" . $_GET['db'] . "/" . 
        $_GET['json'] . ".json";
    $str = file_get_contents($filepath);
    $json = json_decode($str, true);
    foreach($json[0] as $index=>$cell) {
        echo '<th>'.$index.'</th>';
    }
}

function get_json_records() {
    global $root_path;
    //get file names in folder
    $filepath = $root_path . "/database-manager/.data/" . $_GET['db'] . "/" . 
        $_GET['json'] . ".json";
    $str = file_get_contents($filepath);
    $json = json_decode($str, true);
    foreach($json as $record){
        echo '<tr>';
        foreach($record as $cell) {
            echo '<td>'.$cell.'</td>';
        }
        echo '</tr>';
    }
}

function removeDirectory($directory)
{
    foreach(glob("{$directory}/*") as $file)
    {
        if(is_dir($file)) { 
            removeDirectory($file);
        } else {
            unlink($file);
        }
    }
    rmdir($directory);
}

function updateDatabaseJSON($dbArray) {
    global $root_path;
    $dbJson = json_encode($dbArray);
    file_put_contents($root_path . "/database-manager/.data/databases.json", $dbJson);
}