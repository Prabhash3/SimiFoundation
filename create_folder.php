<?php

// print_r($_REQUEST); 

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

//check and create table if  'folder table' not exist 
$sql = "SHOW TABLES LIKE 'folder_table'; ";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows == 0) {
    $sql = "CREATE TABLE folder_table(folder_id INT ,folder_name VARCHAR(50) ); ";
    $result = $mysqli->query($sql);


    //  echo"created table";

}
print_r($result);
echo "end";
// echo $result->num_rows;
