<?php include "./api_file/validate.php";  ?>
<?php 
if(!isset($_REQUEST['f_id']) || !isset($_REQUEST['p_f_id'])){
  header("location:./admin_gallery_first_b.php"); 
}

$f_id = trim($_REQUEST['f_id']);
$p_p_f_id = trim($_REQUEST['p_f_id']);
$p_p_f_name ;
$f_id_name; 

include("api_file/conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to Database: " ;
    exit();
}

$sql = "SELECT folder_name FROM  folder_table WHERE folder_id='$p_p_f_id'; ";
$result = $mysqli->query($sql);



$sql2 = "SELECT  folder_name FROM  folder_table_no_$p_p_f_id WHERE folder_id='$f_id'; ";
$result2 = $mysqli->query($sql2);

//   echo"<pre>"; 
//  print_r($result); 
//  print_r($result2); 
//  echo $result1->num_row;
//  return; 

  // echo"<br><br>s ds <br>"; 
if($result && $result2 && $result->num_rows >0 && $result2->num_rows>0 )
{
  $p_p_f_name = ($result->fetch_assoc())['folder_name'] ;
  $f_id_name =($result2->fetch_assoc())['folder_name']; 
}
else{
  echo "not albe to fetch"; 
  return; 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <link rel="stylesheet" href="public/css/style.css?<?php  echo date('l jS \of F Y h:i:s A'); ?>">
  <link rel="stylesheet" href="public/css/admin_gallery_second.css?<?php  echo date('l jS \of F Y h:i:s A'); ?>"  >
  <!-- <link rel="stylesheet" href="public/css/admin_gallery_first.css"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
    <link rel="shortcut icon" type="image/x-icon" href="public\image\simmilogo.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>



 
<body>


 
  <div class="container" >

    <!-- Trigger the modal with a button -->
    <button type="button" id="img_close_modal_but" class="btn btn-info btn-lg"
      data-toggle="modal" data-target="#myModal"   style="display:none; ">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div id="modal_out_box" class="modal-dialog"  >

        <!-- Modal content-->
        <div class="modal-content" style="width: 80% ;display: block; margin:auto; border:1px solid black; " >
          <div class="modal-header">
            <button style="padding:10px"  type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Edit Image</h4> -->
          </div>
          <div class="modal-body">
            <div class="card" style="width: 100%;text-align:center;">

              <img  id="display_up_img" class="card-img-top"  src="public\image\default_upoad_img.svg"
                alt="Uploadable File">

              <div  class="card-body">
                 <br>
                <p id="display_up_img_name" class="card-text" style="text-align:left;">No Files Selected </p>
              </div>
            </div>
            <div  id="prog_bar" class="progress" style="height: 7px; display: none;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
           
          </div>

          <div class="modal-footer">

            <!-- <button id="select_img_but" type="button" class="btn btn-primary">Select Image</button>
            <button  id="upload_img_but" type="button" class="btn btn-primary">Upload</button> -->

            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
    </div>

  </div>








  <div class="header">
    <div id="back_button"><img title="Back" id="back_button_img" src="public\image\back_icon.png" alt="add_folder" draggable="false">
    </div>

    <div id="upload_img_but"><img   title="Upload Files" id="add_fold_img" src="public\image\upload_folder.svg" alt="add_folder"
        draggable="false">
    </div>

    <div id="select_img_but" title="Select Files"><img id="select_fold_img" src="public\image\selection.svg" alt="add_folder"
        draggable="false">
    </div>


    <div id="delete_img_but" title="Delete Files">
    <img id="delete_img_icon"  src="public\image\folder-delete.png" alt="add_folder"
        draggable="false">
    </div>
    
  </div>




  <div class="second-head">



    <div class="path-detail">
      <div class="second-icon home-icon"><i class="fa fa-home fa-fw" style="font-size:14px;position:relative;top:-1px;  color: rgb(74 68 71 /90%);;;"></i></div>
      <div class="slash"><i class="fa fa-caret-right" style="font-size:14px;"></i></div>
      <div class="second-icon home-icon"> Home</div>
      <div class="slash"><i class="fa fa-caret-right" style="font-size:14px;"></i></div>
      <div class="second-icon home-icon">Gallery</div>
        
    
      <div class="slash"><i class="fa fa-caret-right" style="font-size:14px;"></i></div>
      <div class="second-icon home-icon"> <?php echo $p_p_f_name ; ?>
 </div>
        
       
      <div class="slash"><i class="fa fa-caret-right" style="font-size:14px;"></i></div>
      <div class="second-icon home-icon"> <?php echo $f_id_name; ?></div>


    </div>

  </div>




  <div class="main-box" style="display:none" >

    <div id="" style="display:none">
      <div id="drop_body">
        <div id="cancel_upload_but" class="div_but"> X </div>
        <div class="drop_detail">
          <input type="file" multiple id="upload_file_input" hidden>
          <div id="browser_file_but" class="div_but"> Browse Files</div>
          <br> <br>
          <hr class="hor_rule">OR
          <hr class="hor_rule">

          <div class="drag_drop_title">Drag and Drop Files here</div>

        </div>

        <div id="upload_icon_box">
          <img id="upload_icon_img" src="public\image\upload_file_icon.svg" alt="">
        </div>

      </div>

    </div>



  </div>


  <button type="button" style="display:none" id="launch_box" class="btn btn-primary" data-toggle="modal"
    data-target="#exampleModalLong">
    Launch demo modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Selected Files</h5>
          <button id="top_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <div id="disp_uploadable_file_box" style="display: none;">
            <!-- <div id="cancel_upload_but" class="div_but"> X </div> -->
            <div id="disp_uploadable_file">







            </div>

            <div class="upload_img_box" id="upload_but_box" style="display: none;">
              <div class="div_but btn btn-primary ">Upload</div>
              <div id="cancel_upload_file_but" class="div_but btn btn-primary">Cancel</div>
            </div>


          </div>





        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="button" id="upload_file_but" class="btn btn-primary">Upload</button>
        </div>
      </div>
    </div>
  </div>





















  <div class="main-box" id="main_box">


<!-- 
  <div class="img-box" id="">
  <input type="checkbox" class="img-select-box" name="" id="">
  <div class="img-body"></div>
  
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div> -->



  <?php
   
  

   echo "<div class='obj-name'> $f_id_name</div>
   <hr class='obj-hr'>";
   
   echo '<div id="img_box_img_part">';
   


   $sql = "SELECT * FROM  folder_event_table_no_$f_id; ";
   $result = $mysqli->query($sql);
  //  print_r($result); 
   
  // echo"<pre>"; 
  // echo"<br><br>s ds <br>"; 

  if( $result)
  while($row = $result->fetch_assoc()){
    // echo"<pre style='text-align:left;'>";  
    // print_r($row); 
    //  echo"</pre>"; 

    // $img_path =  "background-image:url('./upload/". $row['img_path'] ."');";
    $img_path =  'background-image:url("'.'./upload/'.$row['img_path'].'");';
    $img_id = $row['img_id'];
    $img_title = $row['img_title'] && strlen($row['img_title'])>0?  $row['img_title'] : "Title here..."; 
    $img_dicp = $row['img_dicp'] && strlen($row['img_dicp'])>0?  $row['img_dicp'] : "Write Image Description here....";
    // echo "$img_path"; 
     echo "<div class='img-box' id='img_box_id-$img_id' >
     <input type='checkbox' class='img-select-box' name='' id='img_c_b_id-$img_id'>
     <div class='img-body' style='".$img_path."' ></div>
     <div class='img-detail'> 
       <p class='img-title' contenteditable='true' id='img_t_id-$img_id'>     ".$img_title."</p>
       <p class='img-desc' contenteditable='true' id='img_desc_id-$img_id'>   ".$img_dicp."</p>
     </div>
   </div>";
     
    //  (
    //   [folder_id] => f79d76
    //   [folder_name] => Objective Title
    //   [folder_new_name] => dc7905e583f7fdbfec92
    //   [visi] => 1
    // echo `dlfkjsdkl {$row['visi']} `; 
  

  }

  // echo"</pre>"; 
  // echo "{$dkfj}"; 

?>

</div>















<!--   
<div class="img-box">
  <div class="img-body" ></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true"  id="thisisid"> this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>
 -->









</div>



<div id="mess_box">
    <div id="mess_content" class="">  </div>
  </div>

  <!-- mess-success -->
  <script>
    var mess_time_id;

    var mess_content = document.getElementById("mess_content");

    function display_mess(data, time = 3000) {

      var mess_box = document.getElementById("mess_box");
      mess_box.className = "show";

      mess_content.textContent = data.message;
      if (data.status == "error") {
        mess_content.className = 'mess-error';
      } else {
        mess_content.className = "mess-success";
      }

      clearTimeout(mess_time_id);
      mess_time_id = setTimeout(function() {
        mess_box.className = mess_box.className.replace("show", "");
      }, time);
    }

    // display_mess(" test mes s",2000 ); 
  </script>





<script> 
   var p_f_id = <?php echo "'$f_id'"; ?>;
   var p_p_f_id = <?php echo "'$p_p_f_id'"; ?>;
//  console.log(p_f_id); 
//  console.log(p_p_f_id); 
</script>
  <script src="public/js/admin_gallery_second.js?<?php  echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>

</html>