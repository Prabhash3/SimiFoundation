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
// $sql = "SHOW TABLES LIKE 'folder_table'; ";

// $result = $mysqli->query($sql);
// $row = $result->fetch_assoc();
// if ($result->num_rows == 0) {
//     $sql = "CREATE TABLE folder_table(folder_id INT ,folder_name VARCHAR(150), folder_new_name VARCHAR(150) ); ";
//     $result = $mysqli->query($sql);


//     //  echo"created table";

// }
print_r($_REQUEST); 
if (!isset($_REQUEST['f_id']) || !isset($_REQUEST['req_type']) ) {
    echo "missing data";
    exit();
}
$folder_id = trim($_REQUEST['f_id']);
$req_type = trim( $_REQUEST['req_type']);
// $f_name =  trim($_REQUEST['f_name']);


if( $req_type=="hide"){
    $sql = "UPDATE folder_table SET visi=0 WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    if($result=="1"){

        echo json_encode(array("status" => "ok", "message" => "Folder is Now Hidden"));
    }
    // echo $sql  ; 
    //  echo"result-"; 
    //     print_r($result); 
    //     echo "-result";
    // echo $mysqli->error;
    // echo "updated fodler"; 
}
else if( $req_type=="unhide"){
    $sql = "UPDATE folder_table SET visi=1 WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    if($result=="1"){

        echo json_encode(array("status" => "ok", "message" => "Folder is Now Visible"));
    }
    
}

else if( $req_type=="edit"){

echo "edit"; 




if(isset($_FILES['upload_file'] ) &&  $_FILES['upload_file']['size']>0 &&$_FILES['upload_file']['size']<40000000  ){

 





    $file_new_name =""; 
    $temp = 2; 
    $file_ext = explode('.',rtrim( basename($_FILES['upload_file']['name']))); 
    $len  = count($file_ext)-1 ; 
    $file_ext = $file_ext[$len]; 
    // print_r($file_ext) ; 
    // echo "len =$len "; 



    $extension_arr = array("php", "bash", "exe", );

    if (in_array($file_ext, $extension_arr))
      {
        echo json_encode(array("status" => "error", "message" => "File extensio  is Not Acceptable"));
        return; 
      }

      else{

        //delete prev file 
        $sql = "SELECT img_path FROM folder_table WHERE folder_id='$folder_id' ";
        $result = $mysqli->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            print_r($row);  
        
            $prev_img_path = $row ?$row['img_path']:NULL; 
        
        
        
        
            if($prev_img_path && file_exists('./../upload/'.$prev_img_path)){
               echo unlink('./../upload/'.$prev_img_path); 
            //    echo "file delted"; 
                
            }
            // echo "path s = $prev_img_path->"; 
        }
        
      }


    if($len<1){
        echo json_encode(array("status" => "error", "message" => "File  is Not Acceptable"));
        return; 
    }

    // $file_ext = pathinfo("mohan.txt"); 

//  file_ex
    // echo "fle exten $file_ext"; 
  
        while (true) {
        $file_new_name = bin2hex(random_bytes('10'));
        // $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table WHERE img_path='$file_new_name.$file_ext'";
        // echo"inside"; 
        // echo"$sql"; 
        // return ;
        $result = $mysqli->query($sql);
        // echo"result-"; 
        // print_r($result); 
        // echo "-result"; 
        // basename(':\xampp\xampp\tmp\phpB2F9.tmp'); 
        if (!(isset($result)) || $result->num_rows =="0" ) {
            break;
        }
    }

    $sql = "UPDATE folder_table SET img_path='$file_new_name.$file_ext' WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    

    // echo "$sql<br>"; 
    //  echo "result-";
    //  print_r($result);
    //  echo "-result";
     
  if($result){

    if( move_uploaded_file($_FILES['upload_file']['tmp_name'], "./../upload/" .$file_new_name.".".$file_ext) ){
        echo json_encode(array("status" => "ok", "message" => "Updated Image Successfully"));
  
    }else{
        echo json_encode(array("status" => "error", "message" => "Not able to Update Image"));
  
    }
  }

    
    

}
}
else if($req_type=="delete")
{

}

// print_r($_FILES); 
// // print_r($result); 

// $mysqli->connect_error;

// return; 
// $people = array("Peter", "Joe", "Glenn", "Cleveland");

// if (in_array("Glenn", $people))
//   {
//   echo "Match found";
//   }
// else
//   {
//   echo "Match not found";
//   }

// if(isset($_FILES["upload_file"])   && $_FILES["upload_file"]['size'] > 0    ){
//     sleep(1); 
//      echo json_encode(   array("status"=>"ok", "message"=>"file received" , "file name " => $_FILES["upload_file"]['name'] )); 
//      //   echo json_encode(array("status"=>"ok", "message"=>"file received" )) ; 
//  }
//  else{
//      sleep(1); 
//      http_response_code(500);
//      echo json_encode(array("status"=>"error", "message"=>"file not found")) ; 
//  }
//     while (true) {
//         $folder_new_name = bin2hex(random_bytes('10'));
//         $folder_id  = bin2hex(random_bytes('3'));
//         $sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id  OR folder_name='$folder_new_name'";
//         $result = $mysqli->query($sql);
//         // echo"result-"; 
//         // print_r($result); 
//         // echo "-result"; 
//         if (!($result)) {
//             break;
//         }
//     }
//     //create new table  with table name = new_folder_name
//     $sql = "CREATE TABLE folder_table_no_$folder_id( img_id  VARCHAR(20)  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150) ,visi TINYINT); ";
//     $result = $mysqli->query($sql);

//     // echo "result-";
//     // print_r($result);
//     // echo "-result";

//     if ($result == "1") {
//         $sql = "INSERT INTO  folder_table (folder_id, folder_name,folder_new_name,visi ) VALUES( '$folder_id', '$f_name' ,'$folder_new_name',1); ";
//         $result = $mysqli->query($sql);
//     echo "$sql<br>"; 
//  echo "result-";
//  print_r($result);
//  echo "-result";
//         if ($result == "1") {
//             $temp =  mkdir("./../upload/" . $folder_new_name);
//             //    echo "$sql<br>"; 
//             echo "temp$temp-<";
//             echo "result-";
//             print_r($result);
//             echo "-result";
//         }

//         // echo $conn->error_get_last; 
//     }
// }

//


// $sql = "SELECT * FROM folder_table WHERE folder_id=$folder_id ";
// $result = $mysqli->query($sql);
// print_r($result); 

// if ($result->num_rows =="0") {
//     //create new folder_table and insert row in folder_table
//      $folder_new_name = bin2hex(random_bytes('10')); 
//     echo " creating and inserting ne wtable-";
//     $sql = "CREATE TABLE folder_table_no_$folder_id( img_id INT  ,img_org_name VARCHAR(150),img_new_name VARCHAR(150) ); ";
//     $result = $mysqli->query($sql);
//     // print_r($result); 
//     // echo "inse  r5tin folder-"; 
//     // echo $mysqli->error; 

//     $sql = "INSERT INTO  folder_table (folder_id, folder_name,folder_new_name ) VALUES( $folder_id, '$f_name' ,'$folder_new_name'); ";
//     $result = $mysqli->query($sql);
//     // echo "<br>-->$folder_new_name<br>"; 
//     // echo $sql  ; 
//     // echo $mysqli->error;
//     // echo "making folder to upload "; 
//      mkdir("./upload/".$folder_new_name); 
//     // print_r($result); 



    

// }
// else{

// //update the existing folder 
//     $sql = "UPDATE folder_table SET folder_name='$f_name' WHERE folder_id=$folder_id ; ";
//     $result = $mysqli->query($sql);
//     echo $sql  ; 
//     echo $mysqli->error;
//     echo "updated fodler"; 
// }







// print_r($_REQUEST);
// print_r($result);
// echo $f_name;
// echo "end";
// echo $result->num_rows;
