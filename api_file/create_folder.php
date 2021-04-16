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
    $sql = "CREATE TABLE folder_table(folder_id INT ,folder_name VARCHAR(150), folder_new_name VARCHAR(30) ); ";
    $result = $mysqli->query($sql);


    //  echo"created table";

}

if (!isset($_REQUEST['f_id']) || !isset($_REQUEST['req_type']) || !isset($_REQUEST['f_name'])) {
    echo "missing data";
    exit();
}
$folder_id = trim($_REQUEST['f_id']);
$req_type = trim( $_REQUEST['req_type']);
$f_name =  trim($_REQUEST['f_name']);
$folder_new_name; 
//

if(  $req_type =="creat_fold"){
     // create new Folder
  
     while(true){
        $folder_new_name = bin2hex(random_bytes('10'));
        $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id  OR folder_name='$folder_new_name'";
        $result = $mysqli->query($sql);
        if ($result->num_rows =="0") {
            break; 
        }
     }
    //create new table  with table name = new_folder_name
     $sql = "CREATE TABLE folder_table_no_$folder_id( img_id INT  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150) ,visi TINYINT); ";
     $result = $mysqli->query($sql);

}
$sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id ";
$result = $mysqli->query($sql);
print_r($result); 

if ($result->num_rows =="0") {
    //  insert row in folder_table
     $folder_new_name = bin2hex(random_bytes('10'));
     $folder
    echo " creating and inserting ne wtable-";
    $sql = "CREATE TABLE folder_table_no_$folder_id( img_id INT  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150) ,visi TINYINT); ";
    $result = $mysqli->query($sql);
    // print_r($result); 
    // echo "inse  r5tin folder-"; 
    // echo $mysqli->error; 

    $sql = "INSERT INTO  folder_table (folder_id, folder_name,folder_new_name,visi ) VALUES( $folder_id, '$f_name' ,'$folder_new_name',1); ";
    $result = $mysqli->query($sql);
    // echo "<br>-->$folder_new_name<br>"; 
    // echo $sql  ; 
    // echo $mysqli->error;
    // echo "making folder to upload "; 
     mkdir("./upload/".$folder_new_name); 
    // print_r($result); 



    

}
else{

//update the existing folder 
    $sql = "UPDATE folder_table SET folder_name='$f_name' WHERE folder_id=$folder_id ; ";
    $result = $mysqli->query($sql);
    echo $sql  ; 
    echo $mysqli->error;
    echo "updated fodler"; 
}







print_r($_REQUEST);
// print_r($result);
// echo $f_name;
echo "end";
// echo $result->num_rows;
