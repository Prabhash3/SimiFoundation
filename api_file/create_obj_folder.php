<?php

// print_r($_REQUEST);

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo json_encode(array("status" => "error", "message" => "Failed to connect  Database"));

    exit();
}

//check and create table if  'folder table' not exist 
$sql = "SHOW TABLES LIKE 'folder_table'; ";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows == 0) {
    $sql = "CREATE TABLE folder_table(folder_id VARCHAR(20) ,folder_name VARCHAR(150), folder_new_name VARCHAR(30) ,img_path VARCHAR(25) , visi TINYINT); ";
    $result = $mysqli->query($sql);


    //  echo"created table";

}

if (!isset($_REQUEST['f_temp_id']) || !isset($_REQUEST['req_type']) || !isset($_REQUEST['f_name'])) {
    http_response_code(500);
    echo json_encode(array("status" => "error", "message" => "missing data"));
    exit();
}
$folder_temp_id = trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_temp_id'])));
$req_type = trim( mysqli_real_escape_string($mysqli, ($_REQUEST['req_type'])));
$f_name = htmlentities( trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_name']))));
$folder_new_name;
$folder_id;
$f_id_name =  htmlentities( trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_id_name']))));
//
// echo " fnae = $f_name";
if ($req_type == "creat_fold") {
    // create new Folder

    while (true) {
        $folder_new_name = bin2hex(random_bytes('10'));
        $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id  OR folder_name='$folder_new_name'";
        $result = $mysqli->query($sql);
        // echo"result-"; 
        // print_r($result); 
        // echo "-result"; 
        if ((!($result)) || $result->num_rows =="0" ) {
            $folder_new_name = "obj".$folder_new_name; 
            break;
        }
    }
    //create new table  with table name = new_folder_name


    // $sql = "CREATE TABLE folder_table_no_$folder_id( img_id  VARCHAR(20)  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150)  ,img_path VARCHAR(150),visi TINYINT); ";
    $sql = "CREATE TABLE folder_table_no_$folder_id(folder_id VARCHAR(20) ,folder_name VARCHAR(150), folder_new_name VARCHAR(30) ,img_path VARCHAR(25) , visi TINYINT); ";
 
    $result = $mysqli->query($sql);

    // echo "result-";
    // print_r($result);
    // echo "-result";

    if ($result == "1") {
        $sql = "INSERT INTO  folder_table (folder_id, folder_name,folder_new_name,visi ) VALUES( '$folder_id', '$f_name' ,'$folder_new_name',1); ";
        $result = $mysqli->query($sql);
//     echo "$sql<br>"; 
//  echo "result-";
//  print_r($result);
//  echo "-result";
        if ($result == "1") {
        
            if(  mkdir("./../upload/" . $folder_new_name)){
                echo json_encode(array("status" => "ok", "message" => "Objective Folder Created "));
            }
            else{
                echo json_encode(array("status" => "error", "message" => "Not able to Create Folder"));
            }
            //    echo "$sql<br>"; 
            // echo "temp$temp-<";
            // echo "result-";
            // print_r($result);
            // echo "-result";
        }

        // echo $conn->error_get_last; 
    }
    // echo "ok";
}else{

    //update the existing folder 
        $sql = "UPDATE folder_table SET folder_name='$f_name' WHERE folder_id='$f_id_name' ; ";
        $result = $mysqli->query($sql);
        
        // echo $sql  ; 
        // echo $mysqli->error;

        if($result =="1"){
            echo json_encode(array("status" => "ok", "message" => "Updated Folder Name"));
        }
        else{
            echo json_encode(array("status" => "error", "message" => "Not able to Updated Folder Name"));
        }
        // echo "updated fodler"; 
        // echo "result-";
        //     print_r($result);
        //     echo "-result";
    }


