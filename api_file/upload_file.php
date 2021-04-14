<?php


// echo" start "; 
// http_response_code(500);
// $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

// print_r( $_FILES); 
// print_r( $_GET); 
// print_r( $_REQUEST); 
if(isset($_FILES["upload_file"])   && $_FILES["upload_file"]['size'] > 0    ){
   sleep(1); 
    echo json_encode(   array("status"=>"ok", "message"=>"file received" , "file name " => $_FILES["upload_file"]['name'] )); 
    //   echo json_encode(array("status"=>"ok", "message"=>"file received" )) ; 
}
else{
    sleep(1); 
    http_response_code(500);
    echo json_encode(array("status"=>"error", "message"=>"file not found")) ; 
}
// echo json_encode($age);
// echo"end " ; 

?>