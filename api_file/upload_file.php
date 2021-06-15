<?php include "validate.php";  ?>

<?php




include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
  // echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  http_response_code(500);
  echo json_encode(array("status" => "error", "message" => "Internal Error"));
  exit();
}

if (isset($_REQUEST["p_f_id"])   && isset($_REQUEST["p_p_f_id"])   && isset($_FILES["upload_file"])   && $_FILES["upload_file"]['size'] > 0) {
  // sleep(1);


  $p_f_id = trim( mysqli_real_escape_string($mysqli, (($_REQUEST["p_f_id"]))));
  $p_p_f_id = trim( mysqli_real_escape_string($mysqli, (($_REQUEST["p_p_f_id"]))));
  $file_org_name =trim( mysqli_real_escape_string($mysqli,  $_FILES["upload_file"]['name']));
  $p_folder;
  $event_folder;

  //get objective folder 
  $sql = "SELECT folder_new_name FROM folder_table_no_$p_p_f_id WHERE folder_id='$p_f_id'";
  $result = $mysqli->query($sql);
  
  

  $sql2 = "SELECT folder_new_name FROM folder_table WHERE folder_id='$p_p_f_id'";
  $result2 = $mysqli->query($sql2);
  if ($result->num_rows > 0 && $result2->num_rows > 0) {

    $event_folder  = ($result->fetch_assoc())['folder_new_name'];
    $obj_folder  = ($result2->fetch_assoc())['folder_new_name'];
    // echo "isnide required folder id = $event_folder\n-";




    $file_new_name = "";
    $temp = 2;
    $file_ext = explode('.', trim( mysqli_real_escape_string($mysqli, (basename($_FILES['upload_file']['name'])))));
    $len  = count($file_ext) - 1;
    $file_ext = $file_ext[$len];
    // print_r($file_ext) ; 
    // echo "len =$len "; 



    $extension_arr = array("php", "bash", "exe",);

    if (in_array($file_ext, $extension_arr)) {
      echo json_encode(array("status" => "error", "message" => "File extension  is Not Acceptable"));
      return;
    } else {

      //delete prev file 
      while (true) {
        $file_new_name = bin2hex(random_bytes('5'));
        // $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table_no_$p_f_id WHERE img_path='$file_new_name.$file_ext'";
        // echo"inside"; 

        $result = $mysqli->query($sql);

        
        if (  $result=="" || $result->num_rows == "0") {
          $file_new_name  = $file_new_name . "." . $file_ext;
          // echo "breaing ";
          //  return;

          break;
        }
      }


      if ($len < 1) {
        echo json_encode(array("status" => "error", "message" => "File  is Not Acceptable"));
        return;
      }

      $img_path = "$obj_folder/$event_folder/$file_new_name" ;
      // echo "path ->$img_path<-"; 
      $sql = "INSERT INTO  folder_event_table_no_$p_f_id (img_org_name,img_new_name,img_path) VALUES( '$file_org_name','$file_new_name','$img_path' ) ; ";
      $result = $mysqli->query($sql);

  // echo "\ntill here ->$p_folder\n"; 

      if ($result) {

        if (move_uploaded_file($_FILES['upload_file']['tmp_name'], "./../upload/$img_path")) {
          echo json_encode(array("status" => "ok", "message" => "Image Successfully Uploaded", "img_path" => "$event_folder/$file_new_name"));
        } else {
          echo json_encode(array("status" => "error", "message" => "Not able to Upload Image"));
        }
      }else{

        
           return ;
      }







      return;
    }
  }





























  //   echo json_encode(array("status"=>"ok", "message"=>"file received" )) ; 

} else {
  // sleep(1);
  http_response_code(500);
  echo json_encode(array("status" => "error", "message" => "missing required information"));
}
// echo json_encode($age);
// echo"end " ; 











// $file_new_name =""; 
// $temp = 2; 
// $file_ext = explode('.',rtrim( basename($_FILES['upload_file']['name']))); 
// $len  = count($file_ext)-1 ; 
// $file_ext = $file_ext[$len]; 
// // print_r($file_ext) ; 
// // echo "len =$len "; 



// $extension_arr = array("php", "bash", "exe", );

// if (in_array($file_ext, $extension_arr))
//   {
//     echo json_encode(array("status" => "error", "message" => "File extensio  is Not Acceptable"));
//     return; 
//   }

//   else{

//     //delete prev file 
//     $sql = "SELECT img_path FROM folder_table WHERE folder_id='$folder_id' ";
//     $result = $mysqli->query($sql);
//     if($result){
//         $row = $result->fetch_assoc();
//         print_r($row);  
    
//         $prev_img_path = $row ?$row['img_path']:NULL; 
    
    
    
    
//         if($prev_img_path && file_exists('./../upload/'.$prev_img_path)){
//            echo unlink('./../upload/'.$prev_img_path); 
//         //    echo "file delted"; 
            
//         }
//         // echo "path s = $prev_img_path->"; 
//     }
    
//   }


// if($len<1){
//     echo json_encode(array("status" => "error", "message" => "File  is Not Acceptable"));
//     return; 
// }

// // $file_ext = pathinfo("mohan.txt"); 

// //  file_ex
// // echo "fle exten $file_ext"; 

// // basename(':\xampp\xampp\tmp\phpB2F9.tmp'); 

//     while (true) {
//     $file_new_name = bin2hex(random_bytes('5'));
//     // $folder_id  = bin2hex(random_bytes('3'));
//     $sql = "SELECT * FROM folder_table WHERE img_path='$file_new_name.$file_ext'";
//     // echo"inside"; 
//     // echo"$sql"; 
//     // return ;
//     $result = $mysqli->query($sql);
//     // echo"result-"; 
//     // print_r($result); 
//     // echo "-result"; 
//     // basename(':\xampp\xampp\tmp\phpB2F9.tmp'); 
//     if (!(isset($result)) || $result->num_rows =="0" ) {
//         $file_new_name  = "obj-$file_new_name"; 
//         break;
//     }
// }

// $sql = "UPDATE folder_table SET img_path='$file_new_name.$file_ext' WHERE folder_id='$folder_id' ; ";
// $result = $mysqli->query($sql);


// // echo "$sql<br>"; 
// //  echo "result-";
// //  print_r($result);
// //  echo "-result";
 
// if($result){

// if( move_uploaded_file($_FILES['upload_file']['tmp_name'], "./../upload/" .$file_new_name.".".$file_ext) ){
//     echo json_encode(array("status" => "ok", "message" => "Updated Image Successfully"));

// }else{
//     echo json_encode(array("status" => "error", "message" => "Not able to Update Image"));

// }
// }
