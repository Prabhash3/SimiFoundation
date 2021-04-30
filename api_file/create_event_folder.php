<?php

print_r($_REQUEST);

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}



//check and create table if  'folder table' not exist 



if (!isset($_REQUEST['f_temp_id'])  ||!isset($_REQUEST['p_f_id']) || !isset($_REQUEST['req_type']) || !isset($_REQUEST['f_name'])) {
    http_response_code(500);
    echo json_encode(array("status" => "error", "message" => "missing data"));
    exit();
}

$p_f_id = trim($_REQUEST['p_f_id']);

$folder_temp_id = trim($_REQUEST['f_temp_id']);
$req_type = trim($_REQUEST['req_type']);
$f_name = htmlentities( trim($_REQUEST['f_name']));


$folder_new_name;
$folder_id;
$f_id_name =  htmlentities( trim($_REQUEST['f_id_name']));
//
// echo " fnae = $f_name";
if ($req_type == "creat_fold") {


//find parent folder 
    $parent_folder ; 
    $sql = "SELECT folder_new_name FROM   folder_table  WHERE folder_id='$p_f_id' ; ";
    $result = $mysqli->query($sql);
   

    // echo "\n$sql \n"; 
    //   echo"result-"; 
    //     print_r($result->fetch_assoc()); 
    //     echo "-result"; 
    //    echo $mysqli->connect_errno; 


       $parent_folder = ($result->fetch_assoc())['folder_new_name']; 

       echo "->".$parent_folder; 





    // create new Folder
    while (true) {
        $folder_new_name = bin2hex(random_bytes('10'));
        $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table_no_$p_f_id WHERE folder_id=$folder_id  OR folder_name='$folder_new_name'";
        $result = $mysqli->query($sql);
        echo"result-"; 
        print_r($result); 
        echo "-result"; 
        if ((!($result)) || $result->num_rows =="0" ) {
            $folder_new_name = "event".$folder_new_name; 
            break;
        }
    }
    //create new table  with table name = new_folder_name
    $sql = "CREATE TABLE folder_event_table_no_$folder_id( img_id  INT  primary key  AUTO_INCREMENT  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150)  ,img_path VARCHAR(150) ,img_title VARCHAR(150),img_dicp VARCHAR(1000) ) ; ";
    $result = $mysqli->query($sql);
    //  echo  $mysqli->error ;
    // echo "result1-";
    // print_r($result);
    // echo "-result";

    if ($result == "1") {
        $sql = "INSERT INTO  folder_table_no_$p_f_id (folder_id, folder_name,folder_new_name,visi ) VALUES( '$folder_id', '$f_name' ,'$folder_new_name',1); ";
        $result = $mysqli->query($sql);
//     echo "$sql<br>"; 
//  echo "result-";
//  print_r($result);
//  echo "-result";
        if ($result == "1") {
          

            if(  mkdir("./../upload/$parent_folder/" . $folder_new_name)){
                echo json_encode(array("status" => "ok", "message" => "Event Folder Created "));
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
        $sql = "UPDATE folder_table_no_$p_f_id SET folder_name='$f_name' WHERE folder_id='$f_id_name' ; ";
        $result = $mysqli->query($sql);
        
        echo $sql  ; 
        echo $mysqli->error;

        if($result =="1"){
            echo json_encode(array("status" => "ok", "message" => "Update Folder Name"));
        }
        else{
            echo json_encode(array("status" => "error", "message" => "Not able to Update Folder Name"));
        }
        // echo "updated fodler"; 
        // echo "result-";
        //     print_r($result);
        //     echo "-result";
    }

echo "end"; 

/*
$sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id ";
$result = $mysqli->query($sql);
print_r($result); 

if ($result->num_rows =="0") {
    //  insert row in folder_table
     $folder_new_name = bin2hex(random_bytes('10'));
    //  $folder
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


*/