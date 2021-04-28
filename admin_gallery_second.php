<?php 
if(!isset($_REQUEST['f_id']) || !isset($_REQUEST['p_f_id'])){
  header("location:./admin_gallery_first_b.php"); 
}

$f_id = trim($_REQUEST['f_id']);
$p_p_f_id = trim($_REQUEST['p_f_id']);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>


 
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
    <div id="back_button"><img id="back_button_img" src="public\image\back_icon.png" alt="add_folder" draggable="false">
    </div>

    <div id="upload_img_but"><img id="add_fold_img" src="public\image\upload_folder.svg" alt="add_folder"
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
      <div class="second-icon home-icon"> Objective</div>
        
       
      <div class="slash"><i class="fa fa-caret-right" style="font-size:14px;"></i></div>
      <div class="second-icon home-icon"> Events</div>


    </div>

  </div>




  <div class="main-box" id="main_box">

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

<div class="obj-name"> Object 1 </div>
<hr class="obj-hr">


  
<div class="img-box">
  <div class="img-body" ></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true"  id="thisisid"> this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>




<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>
<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>

<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>


<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>





<div class="img-box">
  <div class="img-body"></div>
  <div class="img-detail"> 
    <p class="img-title" contenteditable="true" > this is title</p>
    <p class="img-desc" contenteditable="true"> this Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, ipsa.</p>
  </div>
</div>



</div>






<script> 
   var p_f_id = <?php echo "'$f_id'"; ?>;
   var p_p_f_id = <?php echo "'$p_p_f_id'"; ?>;
 console.log(p_f_id); 
 console.log(p_p_f_id); 
</script>
  <script src="public/js/admin_gallery_second.js?<?php  echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>

</html>