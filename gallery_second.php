<?php

if (!isset($_REQUEST['f_id'])) {
  header("location:./gallery_first.php");
}

$f_id = htmlentities(($_REQUEST['f_id']));



include("api_file/conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to database " ;
  exit();
}


$sql = "SELECT folder_name, visi FROM  folder_table WHERE folder_id='$f_id'; ";
$result = $mysqli->query($sql);


if($result )
{ 
  $first_res = $result->fetch_assoc();


 if(  $first_res['visi'] =="0" ){
  header("location:./gallery_first.php"); 
  return; 
 }


}








?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="shortcut icon" type="image/x-icon" href="public\image\simmilogo.png">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/css/gallery_first.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
</head>
<style>
  .img-title {

    height: 67px;
 /* text-overflow:ellipsis; */
  }


  .obj-hr {
    text-align: center;
    /* width: 90%; */
    height: 0.1px;
    /* background-color: #0000ff45 ; */
    border-top:none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.3);
}
#main_box{
  text-align: center;

}

.obj-hr {
    text-align: center;
    /* width: 90%; */
    height: 0.1px;
    /* background-color: #0000ff45; */
    border-top: none;
    border-bottom: 1px solid rgb(0 0 0 / 12%);
}
</style>

<body>
<!-- 
  <div class="header">
    <span class="head-title">object1</span>
    <span class="head-title">object2</span>
    <span class="head-title">object3</span>
    <span class="head-title">object4</span>
  </div> -->
   <?php include "header.php" ?>
  <!-- <br> -->

  <div class="main-box" id="main_box">

    <div class="obj-name"> Events </div>
<hr class="obj-hr">






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
      echo "Failed to connect to database " ;
      exit();
    }


    $sql = "SELECT folder_name, visi FROM  folder_table WHERE folder_id='$f_id'; ";
    $result = $mysqli->query($sql);
    
    
    if($result )
    { 
      $first_res = $result->fetch_assoc();

    
     if(  $first_res['visi'] =="0" ){
      header("location:./gallery_first.php"); 
      return; 
     }


    }




    $sql = "SELECT * FROM  folder_table_no_$f_id WHERE visi=1 ";
    $result = $mysqli->query($sql);
    //    echo"<pre  textalgin='center'>"; 
    //  print_r($result);  

    // echo"<pre>"; 
    // echo"<br><br>s ds <br>"; 

    if ($result && $result->num_rows > "0") {

      while ($row = $result->fetch_assoc()) {
        //  print_r($row); 
        //  (
        //   [folder_id] => f79d76
        //   [folder_name] => Objective Title
        //   [folder_new_name] => dc7905e583f7fdbfec92
        //   [visi] => 1
        // echo `dlfkjsdkl {$row['visi']} `; 


        $folder_id =  htmlentities($row['folder_id']);
        $folder_name = htmlentities($row['folder_name']);
        $img_path =    $row['img_path'] ? "./upload/" . htmlentities($row['img_path']) : "./public/image/test2.jpg";
        $img_path = 'background-image:url("' . $img_path . '");';
        echo "<a href='gallery.php?f_id=$folder_id&p_f_id=$f_id'>";
        echo " <div class='img-box' id='img_box_id-$folder_id']>
    <div class='img-body'  style=$img_path id='img_body_id-$folder_id'></div>
    <div class='img-detail' id='img_detail_id-$folder_id'> 
      <p class='img-title'  >  $folder_name</p>
       </div>
  </div>";
        echo "</a>";
      }
    } else if ($result) {
      echo "No Event Found";
    }
   
    ?>











  </div>


  <script>

  </script>



</body>

</html>