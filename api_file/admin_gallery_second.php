<?php

print_r($_REQUEST);


// DELETE FROM `table` WHERE id IN (264, 265)

include("conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    // echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    http_response_code(500);
    echo json_encode(array("status" => "error", "message" => "Internal Error"));
    exit();
}

if (!isset($_REQUEST['f_id'])  || !isset($_REQUEST['req_type'])) {
    // echo "missing data";
    echo json_encode(array("status" => "error", "message" => "missing data"));

    exit();
}


$folder_id = trim($_REQUEST['f_id']);
$req_type = trim($_REQUEST['req_type']);
// echo  "r_dat->nam= ".( $r_data); 
// print_r($r_data);   
//

if ($req_type == "delete") {

    if (!isset($_REQUEST['s_data'])) {
        echo json_encode(array("status" => "error", "message" => "missing data"));
        return;
    }


    $r_data =     json_decode($_REQUEST['s_data']);
    $len = count($r_data);
    // $r_data = 10;  
    echo "$len ";
    if (!is_array($r_data)) {
        http_response_code(521);
        echo json_encode(array("status" => "error", "message" => "unacceptable data"));
        return;
    }
    // return; 
    $str_id = "(";
    for ($i = 0; $i < $len; $i++) {

        $str_id .= "" . $r_data[$i]  . ($i < $len - 1 ? "," : "");
    }
    $str_id .= ")";
    echo "strdat = $str_id";
    $sql = "DELETE FROM folder_event_table_no_$folder_id WHERE img_id IN $str_id ; ";
    $result = $mysqli->query($sql);
    print_r($result);
    echo "\n\n$sql";
    // echo $mysqli->error; 
    if ($result == "1") {

        echo json_encode(array("status" => "ok", "message" => "Successfully deleted Files"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Not able to delete Files"));
    }
}
else if ($req_type == "title") {
  echo "title "; 
//   "UPDATE folder_table SET folder_name='$f_name' WHERE folder_id=$folder_id ; ";


if (!isset($_REQUEST['f_name'])  ||  !isset($_REQUEST['img_id'])) {
    echo json_encode(array("status" => "error", "message" => "missing data"));
    return;
}
$title = htmlentities( trim($_REQUEST['f_name'])) ;
$img_id = htmlentities( trim($_REQUEST['img_id'])) ;

if( strlen( $title)>150 ||  strlen( $title)==0 ){
    echo json_encode(array("status" => "error", "message" => "Title must be smaller than 150 characters"));
    return; 
}

  $sql = "UPDATE   folder_event_table_no_$folder_id  SET  img_title ='$title' WHERE img_id=$img_id ; ";

    $result = $mysqli->query($sql);
    print_r($result);
    echo "\n\n$sql";
    echo $mysqli->error; 
    if ($result == "1") {

        echo json_encode(array("status" => "ok", "message" => "Successfully Updated Title "));
    } else {
        echo json_encode(array("status" => "error", "message" => "Not able to delete Files"));
    }
}


else if ($req_type == "desc") {
        echo "desc"; 



        echo "title "; 
//   "UPDATE folder_table SET folder_name='$f_name' WHERE folder_id=$folder_id ; ";


if (!isset($_REQUEST['f_name'])  ||  !isset($_REQUEST['img_id'])) {
    echo json_encode(array("status" => "error", "message" => "missing data"));
    return;
}
$desc = htmlentities( trim($_REQUEST['f_name'])) ;
$img_id = htmlentities( trim($_REQUEST['img_id'])) ;

if( strlen( $desc)>1000 ||  strlen( $desc)==0 ){
    echo json_encode(array("status" => "error", "message" => "Description  must be smaller than 1000 characters"));
    return; 
}

  $sql = "UPDATE   folder_event_table_no_$folder_id  SET  img_dicp ='$desc' WHERE img_id=$img_id ; ";

    $result = $mysqli->query($sql);
    print_r($result);
    echo "\n\n$sql";
    echo $mysqli->error; 
    if ($result == "1") {

        echo json_encode(array("status" => "ok", "message" => "Successfully Updated Description"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Not able to delete Files"));
    }
}
echo "end";
