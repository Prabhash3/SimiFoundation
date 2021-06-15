<?php include "validate.php";  ?>

<?php

// print_r($_REQUEST);

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo json_encode(array("status" => "error", "message" => "Failed to connect to Database"));
    // echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}



//check and create table if  'folder table' not exist 



if (!isset($_REQUEST['f_temp_id'])  ||!isset($_REQUEST['p_f_id']) || !isset($_REQUEST['req_type']) || !isset($_REQUEST['f_name'])) {
    http_response_code(500);
    echo json_encode(array("status" => "error", "message" => "missing data"));
    exit();
}

$p_f_id = trim( mysqli_real_escape_string($mysqli, ($_REQUEST['p_f_id'])));

$folder_temp_id = trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_temp_id']))) ;
$req_type = trim( mysqli_real_escape_string($mysqli, ($_REQUEST['req_type'])));
$f_name = htmlentities( trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_name']))));


$folder_new_name;
$folder_id;
$f_id_name =  htmlentities( trim( mysqli_real_escape_string($mysqli, ($_REQUEST['f_id_name']))));
//
// echo " fnae = $f_name";
if ($req_type == "creat_fold") {


//find parent folder 
    $parent_folder ; 
    $sql = "SELECT folder_new_name FROM   folder_table  WHERE folder_id='$p_f_id' ; ";
    $result = $mysqli->query($sql);
   



       $parent_folder = ($result->fetch_assoc())['folder_new_name']; 




    // create new Folder
    while (true) {
        $folder_new_name = bin2hex(random_bytes('10'));
        $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table_no_$p_f_id WHERE folder_id=$folder_id  OR folder_name='$folder_new_name'";
        $result = $mysqli->query($sql);

        if ((!($result)) || $result->num_rows =="0" ) {
            $folder_new_name = "event".$folder_new_name; 
            break;
        }
    }
    //create new table  with table name = new_folder_name
    $sql = "CREATE TABLE folder_event_table_no_$folder_id( img_id  INT  primary key  AUTO_INCREMENT  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150)  ,img_path VARCHAR(150) ,img_title VARCHAR(150),img_dicp VARCHAR(1000) ) ; ";
    $result = $mysqli->query($sql);


    if ($result == "1") {
        $sql = "INSERT INTO  folder_table_no_$p_f_id (folder_id, folder_name,folder_new_name,visi ) VALUES( '$folder_id', '$f_name' ,'$folder_new_name',1); ";
        $result = $mysqli->query($sql);

        if ($result == "1") {
          

            if(  mkdir("./../upload/$parent_folder/" . $folder_new_name)){
                include "write_htaccess_to_folder.php"; 
                write_htaccess_for_folder( "./../upload/$parent_folder/$folder_new_name/"); 

                echo json_encode(array("status" => "ok", "message" => "Event Folder Created "));
            }
            else{
                echo json_encode(array("status" => "error", "message" => "Not able to Create Folder"));
            }

        }

    }
}else{

    //update the existing folder 
        $sql = "UPDATE folder_table_no_$p_f_id SET folder_name='$f_name' WHERE folder_id='$f_id_name' ; ";
        $result = $mysqli->query($sql);
        


        if($result =="1"){
            echo json_encode(array("status" => "ok", "message" => "Updated Folder Name"));
        }
        else{
            echo json_encode(array("status" => "error", "message" => "Not able to Update Folder Name"));
        }

    }

// echo "end"; 
