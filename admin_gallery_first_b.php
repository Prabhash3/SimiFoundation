

<?php 

if(!isset($_REQUEST['f_id'])){
  header("location:./admin_gallery_first.php"); 
}

$f_id = trim($_REQUEST['f_id'])

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <link rel="stylesheet" href="public/css/admin_gallery_first_b.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body id="body">

  <!-- image upload modal  -->
  <div class="container" >

    <!-- Trigger the modal with a button -->
    <button type="button" id="img_close_modal_but" class="btn btn-info btn-lg"
      data-toggle="modal" data-target="#myModal">Open Modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div id="modal_out_box" class="modal-dialog"  >

        <!-- Modal content-->
        <div class="modal-content" style="width: 80% ;display: block; margin:auto; border:1px solid black; " >
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Image</h4>
          </div>
          <div class="modal-body">
            <div class="card" style="width: 100%;">

              <img style="width: 100%; ;" id="display_up_img" class="card-img-top"  src="public\image\default_upoad_img.svg"
                alt="Uploadable File">

              <div  class="card-body">
                 <br>
                <p id="display_up_img_name" class="card-text">No Files Selected </p>
              </div>
            </div>
            <div  id="prog_bar" class="progress" style="height: 7px; display: none;">
              <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
           
          </div>

          <div class="modal-footer">

            <button id="select_img_but" type="button" class="btn btn-primary">Select Image</button>
            <button  id="upload_img_but" type="button" class="btn btn-primary">Upload</button>

            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
    </div>

  </div>



  <!-- body -->



  <div class="header">
    <div id="back_button"><img id="back_button_img" src="public\image\back_icon.png" alt="add_folder" draggable="false">
    </div>

    <div id="add_folder"><img id="add_fold_img" src="public\image\add_folder.svg" alt="add_folder" draggable="false">
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
  <div class="second-icon home-icon"> Objective</div>
    




    </div>

  </div>

  <div class="main-box" id="main_box">

    <!-- <div class="main-box-heading"> name , edit </div> -->
    <div class="new_folder" id="main_box_head">


      <span title="Edit Folder Name" class="main-box-heading">Folder Name
      </span>
      <span title="Folder visibility" class="main-box-heading">Visibility </span>
      <span title="Edit Image" class="main-box-heading" id="test"> Edit</span>
      <span title="Delete Folder" class="main-box-heading">Delete</span>
     </div>
  <?php
   
   include("api_file/conn_detail.php");
   $mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);
   
   
   // Check connection
   if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli->connect_error;
       exit();
   }
   
   $sql = "SELECT * FROM  folder_table_no_$f_id ";
   $result = $mysqli->query($sql);
  //  print_r($result); 
   
  // echo"<pre>"; 
  // echo"<br><br>s ds <br>"; 

  if( $result)
  while($row = $result->fetch_assoc()){
    //  print_r($row); 
    //  (
    //   [folder_id] => f79d76
    //   [folder_name] => Objective Title
    //   [folder_new_name] => dc7905e583f7fdbfec92
    //   [visi] => 1
    // echo `dlfkjsdkl {$row['visi']} `; 
  
   
$curr_fold_no = $row['folder_id'];    
$visiblilty_html = $row['visi'] =="1"? 
"<span title='Hide Folder' class='hide-folder' id='f_vis_no-$curr_fold_no'  ><i class='fas fa-eye' id='folder_vis_c_no-$curr_fold_no' ></i> </span>"
:
"<span title='Unhide Folder' class='unhide-folder' id='f_vis_no-$curr_fold_no'  ><i class='fas fa-eye-slash' id='folder_vis_c_no-$curr_fold_no' ></i> </span>"; 

// echo "<script>console.log(`$visiblilty_html`);</script> "; 
// <span title="Unhide Folder" class="unhide-folder"><i class="fas fa-eye-slash"></i> </span>




// let temp = document.createElement("div");
//     temp.className = "new_folder";
//     temp.id = "folder-box-no-" + (curr_fold_no );
    echo"  
    <div id='folder-box-no-$curr_fold_no' class='new_folder'>
<span  title='Open Folder' class='new_folder_img' id='f_img_no-$curr_fold_no'  ><i class='fa fa-folder fa-fw' id='f_img_c_no-$curr_fold_no'  ></i></span>

<span title='Edit Objective name ' class='folder_name'  contenteditable='true' id='folder_name_no-$curr_fold_no' >".$row['folder_name']."</span>
$visiblilty_html
<span title='Change Image' class='edit-folder-img' id='f_edit_no-$curr_fold_no' > <i class='far fa-edit' id='f_edit_c_no-$curr_fold_no' ></i> </span>
<span title='Delete Folder' class='delete-folder' id='f_name_no-$curr_fold_no' ><i class='fa fa-trash' aria-hidden='true' id='f_name_c_no-$curr_fold_no' ></i> </span>
</div>
";
// echo $temp; 
//      echo '<br"; 
//  echo "yes it is "; 

  }

  // echo"</pre>"; 
  // echo "{$dkfj}"; 

?>
  

   
 <!-- <span title="Unhide Folder" class="unhide-folder"><i class="fas fa-eye-slash"></i> </span> -->


    <!-- <div class="new_folder">
      <span class="new_folder_img"><i class="fa fa-folder fa-fw n"></i></span>

      <span title="Edit Folder name " class="folder_name" id="first_fold" contenteditable="true">this is </span>
     
      <span title="Hide Folder" class="hide-folder"><i class="fas fa-eye"></i> </span>
     <span title="Edit Image" class="edit-folder-img" id="test"> <i class="far fa-edit"></i> </span>
      <span title="Delete Folder" class="delete-folder"><i class="fa fa-trash" aria-hidden="true"></i> </span>
    </div> -->

 





  </div>

<input type="file" id="input_file" style="display: none;">  

  <!-- <br><br><br><br><br><br><br><br><br>
  <i class="fa fa-trash" aria-hidden="true"></i>
  <i class="fa fa-trash-o" aria-hidden="true"></i>
  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  <span class="st">
    <i class="fas fa-camera"></i>
  </span>
  <i class="fas fa-wrench"></i>
  <i class="far fa-edit"></i>
  hidden , remove ,change image , folder name -->

  <script src="public/js/admin_gallery_first_b.js"></script>
  <script> 
   var p_f_id = <?php echo "'$f_id'"; ?>;
 console.log(p_f_id); 
</script>

</body>

</html>