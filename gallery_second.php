
<?php 

if(!isset($_REQUEST['f_id'])){
  header("location:./gallery_first.php"); 
}

$f_id = trim($_REQUEST['f_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/gallery_first.css?<?php  echo date('l jS \of F Y h:i:s A'); ?>">
</head>
   
<body>
  
<div class="header">
  <span class="head-title">object1</span>
  <span class="head-title">object2</span>
  <span class="head-title">object3</span>
  <span class="head-title">object4</span>
</div>
<br>

<div class="main-box" id="main_box">

<!-- <div class="obj-name"> Object 1 </div>
<hr class="obj-hr"> -->






<!-- <a href="">
<div class='img-box'>
  <div class='img-body'></div>
  <div class='img-detail'> 
    <p class='img-title' contenteditable='true' >  event maratihdifo Lorem k</p>
     </div>
</div>
</a> -->

<?php
   
   include("api_file/conn_detail.php");
   $mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);
   
   
   // Check connection
   if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli->connect_error;
       exit();
   }
   
   $sql = "SELECT * FROM  folder_table_no_$f_id WHERE visi=1 ";
   $result = $mysqli->query($sql);
  //    echo"<pre  textalgin='center'>"; 
  //  print_r($result);  
   
  // echo"<pre>"; 
  // echo"<br><br>s ds <br>"; 

  if( $result && $result->num_rows>"0") {

 while($row = $result->fetch_assoc()){
    //  print_r($row); 
    //  (
    //   [folder_id] => f79d76
    //   [folder_name] => Objective Title
    //   [folder_new_name] => dc7905e583f7fdbfec92
    //   [visi] => 1
    // echo `dlfkjsdkl {$row['visi']} `; 
 

    $folder_id =  $row['folder_id']; 
  $folder_name = $row['folder_name']; 
  $img_path=    $row['img_path'] ? "./upload/".$row['img_path']: "./public/image/test2.jpg";
  $img_path = 'background-image:url("'.$img_path.'");';
    echo "<a href='0k'>"; 
    echo " <div class='img-box' id='img_box_id-$folder_id']>
    <div class='img-body'  style=$img_path id='img_body_id-$folder_id'></div>
    <div class='img-detail' id='img_detail_id-$folder_id'> 
      <p class='img-title'  >  $folder_name</p>
       </div>
  </div>"; 
  echo"</a>"; 

  }
}else if($result  ){
  echo "No Event Found"; 
}
  // echo"</pre>"; 
  // echo "{$dkfj}"; 

// printf($result); 

  // $folder_id =  $row['folder_id']; 
  // $folder_name = $row['folder_name']; 
  //   echo " <div class='img-box' id='img_box_id-$folder_id']>
  //   <div class='img-body'  id='img_body_id-$folder_id'></div>
  //   <div class='img-detail' id='img_detail_id-$folder_id'> 
  //     <p class='img-title' contenteditable='true' >  $folder_name</p>
  //      </div>
  // </div>
    
    
  //   "; 
?>











</div>

<!-- <div id="drag_it" contenteditable="true"> enter your name </div> -->


<script src="script.js"></script>

<script>

</script>



</body>
</html>