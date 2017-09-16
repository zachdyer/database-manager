<?php
namespace dbm\json;

function get($file) {
    $json = file_get_contents($file);
    return json_decode($json, true);
}

function get_db() {
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

function get_fields() {
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

function get_records() {
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