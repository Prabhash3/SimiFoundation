<?php include "validate.php";  ?>

<?php

// print_r($_REQUEST); 

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    // echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    http_response_code(500);
    echo json_encode(array("status" => "error", "message" => "Internal Error"));
    exit();
}


if (!isset($_REQUEST['f_id']) || !isset($_REQUEST['req_type']) ||!isset($_REQUEST['p_f_id']) ) {
    // echo "missing data";
    echo json_encode(array("status" => "error", "message" => "missing data"));
    exit();
}

$p_f_id = trim( mysqli_real_escape_string($mysqli, $_REQUEST['p_f_id'] ));
$folder_id = trim( mysqli_real_escape_string($mysqli, $_REQUEST['f_id'] ));
$req_type = trim( mysqli_real_escape_string($mysqli,  $_REQUEST['req_type']));
// $f_name =  trim($_REQUEST['f_name']);


if( $req_type=="hide"){
    $sql = "UPDATE folder_table_no_$p_f_id SET visi=0 WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    if($result=="1"){

        echo json_encode(array("status" => "ok", "message" => "Folder is Now Hidden"));
    }

}
else if( $req_type=="unhide"){
    $sql = "UPDATE folder_table_no_$p_f_id SET visi=1 WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    if($result=="1"){

        echo json_encode(array("status" => "ok", "message" => "Folder is Now Visible"));
    }
    
}

else if( $req_type=="edit"){

// echo "edit"; 




if(isset($_FILES['upload_file'] ) &&  $_FILES['upload_file']['size']>0 &&$_FILES['upload_file']['size']<40000000  ){

 





    $file_new_name =""; 
    $temp = 2; 
    $file_ext = explode('.',rtrim(   mysqli_real_escape_string($mysqli, basename($_FILES['upload_file']['name'])))); 
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
        $sql = "SELECT img_path FROM folder_table_no_$p_f_id WHERE folder_id='$folder_id' ";
        $result = $mysqli->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            // print_r($row);  
        
            $prev_img_path = $row ?$row['img_path']:NULL; 
        
        
        
        
            if($prev_img_path && file_exists('./../upload/'.$prev_img_path)){
                 unlink('./../upload/'.$prev_img_path); 
            //    echo "file delted"; 
                
            }
            // echo "path s = $prev_img_path->"; 
        }
        
      }


    if($len<1){
        echo json_encode(array("status" => "error", "message" => "File  is Not Acceptable"));
        return; 
    }


  
        while (true) {
        $file_new_name = bin2hex(random_bytes('5'));
        // $folder_id  = bin2hex(random_bytes('3'));
        $sql = "SELECT * FROM folder_table_no_$p_f_id WHERE img_path='$file_new_name.$file_ext'";
        // echo"inside"; 
    
        $result = $mysqli->query($sql);

        if (!(isset($result)) || $result->num_rows =="0" ) {
            $file_new_name  = "$p_f_id-$file_new_name"; 
            break;
        }
    }

    $sql = "UPDATE folder_table_no_$p_f_id SET img_path='$file_new_name.$file_ext' WHERE folder_id='$folder_id' ; ";
    $result = $mysqli->query($sql);
    


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
