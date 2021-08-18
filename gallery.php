<?php 





if(!isset($_REQUEST['f_id']) || !isset($_REQUEST['p_f_id'])){
  
  
   header("location:./gallery_first.php"); 
}

$f_id = htmlentities(($_REQUEST['f_id']));
$p_p_f_id = htmlentities(($_REQUEST['p_f_id']));
$p_p_f_name ;
$f_id_name; 

include("api_file/conn_detail.php");
$mysqli = new mysqli($_hostname, $_user, $_password, $_db_name);


// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to database " ;
    exit();
}

$sql = "SELECT folder_name, visi FROM  folder_table WHERE folder_id='$p_p_f_id'; ";
$result = $mysqli->query($sql);



$sql2 = "SELECT folder_name, visi FROM  folder_table_no_$p_p_f_id WHERE folder_id='$f_id'; ";
$result2 = $mysqli->query($sql2);

//   echo"<pre>"; 
//   echo " $f_id , $p_p_f_id "; 
//  print_r($result); 
//  echo "<br>----------- $sql2"; 
//  echo $mysqli->error; 
//  print_r($result2); 
//  return; 
    

  // echo"<br><br>s ds <br>"; 
if($result && $result2  )
{ 
  $first_res = $result->fetch_assoc();
  $second_res = $result2->fetch_assoc(); 
  // echo " $first_res , $second_res'"; 
//  print_r( $first_res);
//  print_r(  $second_res);

 if(  $first_res['visi'] =="0" || $second_res['visi'] =="0" ){
  header("location:./gallery_first.php"); 
 }


  $p_p_f_name = htmlentities($first_res['folder_name'] );
  $f_id_name = htmlentities($second_res['folder_name']); 
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="public\image\simmilogo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Gallery</title>

  <link rel="stylesheet" href="public/css/style.css">
</head>


<style>
  .not-up:hover{
    /* border:1px solid rgba(39, 39, 59, 0.226);  */
    transform:translateY(0px);
    cursor:default;
}

.not-up .img-title{

  overflow:unset; 
height: auto;

}

.not-up  .img-detail {
  text-align: center;
  height: 100px;
}



#close_but{
  position: absolute;
  right:10px; 
  /* top:10px; */
  font-size: 60px;
  z-index: 10; 
color:rgb(0, 0, 0) !important;
}
/* #close_but:hover{

color:rgb(110, 110, 110) !important;
} */



.img-title{
      /* border:1px dashed rgb(41, 72, 117)  !important;  */
      text-align: center;
  height: 20px;
  overflow:hidden; 
/* height: auto; */

}


.img-detail {
  text-align: center;

}
#img_full_screen:hover{
  
  /* cursor: zoom-in; */
  cursor: zoom-out;
}



.img-control-box{ 

position: absolute;
width:100%; 
/* border:1px solid blue;  */
z-index:100;
top:34vh;  

}



.img-control-icon { 
  /* border: 1px solid blue; */
    color:#04040482; 
    background-color: #ffffff6b;
    font-size: 40px;
    width: 45px;
    line-height: 40px;
    /* padding: 0px 11px 5px 11px; */
    padding-left: 10px;
    border-radius: 40px;
    position: absolute;
    cursor: pointer;
    /* box-shadow:1px 1px 7px 2px #fdf9f9d6;  */
}

.img-control-icon:hover { 
background-color: #ffffff96; 
color: #040404;
}

#img_cont_icon_right{ 
  right:10px;; 
}


#img_cont_icon_left{ 
  left:10px;; 
}
.noselect {
  -webkit-user-select: none;    /* Safari */
  -webkit-touch-callout: none;  /* iOS Safari */
  -khtml-user-select: none;     /* Konqueror HTML */
  -ms-user-select: none;        /* Internet Explorer/Edge */
  -moz-user-select: none;       /* Old versions of Firefox */
   user-select: none;           /* Non-prefixed version*/
}

.hd-an-tag{ 
  color:white; 
}
.hd-an-tag:hover{ 
  text-decoration: none;
  color:white; 
  
}


</style>

<body>

<!-- 
  <i class="far fa-trophy"></i>
  <i class="fas fa-trophy"></i>
  <i class="fas fa-trophy"></i>
  <i class="fas fa-camera"></i>
  <i class="far fa-medal"></i>
 -->
 <!-- -->

<!-- 
  <div class="header">
    <span class="head-title">object1</span>
    <span class="head-title">object2</span>
    <span class="head-title">object3</span>
    <span class="head-title">object4</span>
  </div> -->

  <div class="header" style="background-color:#212529!important; height:45px;text-align:left;">
  <a class="hd-an-tag" href="https://simmifoundation.org "  style="position:absolute;left:33px;">
      <img src="public\image\simmilogo.png" alt=""  height="35" class="">
       &ensp;  SIMMI FOUNDATION
    </a>

     </div>
  
  <br>

  <div class="container" style="padding:0px;margin:0px;">

    <!-- Trigger the modal with a button -->
    <button type="button" id="img_close_modal_but" class="btn btn-info btn-lg" data-toggle="modal"
      data-target="#myModal" style="display:none;" >Open Modal</button>

    <!-- Modal -->



   
    <div class="modal fade" id="myModal" role="dialog"  style="padding:0px;margin:0px;">

 
      <div class="img-box not-up" style="width:100% ;display: block;padding:0px;margin:0px;">
             
   
      
        <div class="" style="width:98% ;display: block;margin:auto;padding:0px;position: relative;" >    <button id="close_but" type="button" class="close" data-dismiss="modal">&times;</button>

        <div class="img-control-box">
 <span class="img-control-icon" id="img_cont_icon_left">
  <i class="fas fa-angle-left"></i>
</span>

<span class="img-control-icon" id="img_cont_icon_right">
<i class="fas fa-angle-right"></i>
</span>
    
 </div>

          <img class="noselect"  id="img_full_screen" style="width:100%; display: block;margin:0px;margin:auto;margin-top:5px;" src=".\public\image\test2.jpg" alt="">
         <div class="img-detail" style="background-color: rgb(255, 255, 255);width:100%;margin:auto;  ">
          <p id="img_title" class="img-title"    style="padding:7px;margin:0px"> this is title</p>
         <hr  style="padding:0px;margin:0px">
          <p id="img_desc" class="img-desc" style="text-align:justify ;"  > this Lorem ipsum dolor sit amet consectetur adipisicing 
            otr Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, ut?
            elit. Repudiandae, Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, aperiam. ipsa.</p>
        </div>
        </div>
      
       
      </div>
<br>;
     

    
    
    </div>

 




  </div>









  <div class="main-box" id="main_box">



  
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
    $img_path =  'background-image:url("'.'./upload/'.htmlentities($row['img_path']).'");';
    $img_id = htmlentities($row['img_id']);
    $img_title = $row['img_title'] && strlen($row['img_title'])>0 && trim($row['img_title']) !="Title here..." ?  htmlentities($row['img_title']) : " &nbsp;&nbsp;&nbsp;&nbsp;"; 
    $img_dicp = $row['img_dicp'] && strlen($row['img_dicp'])>0 && trim( $row['img_dicp']) !="Write Image Description here...."? htmlentities( $row['img_dicp']) : "&nbsp;&nbsp;&nbsp;&nbsp;";
    // echo "$img_path"; 
     echo "<div class='img-box' id='img_box_id-$img_id' >
    
     <div class='img-body'  id='img_body_id-$img_id' style='".$img_path."' ></div>
     <div class='img-detail'> 
       <p class='img-title'  id='img_t_id-$img_id'>     ".$img_title."</p>
       <p class='img-desc'  id='img_desc_id-$img_id'>   ".$img_dicp."</p>
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


  <!-- <script src="script.js"></script> -->

  <script>


    var main_box = document.getElementById("main_box");
    var img_close_modal_but = document.getElementById("img_close_modal_but"); 
    var img_full_screen = document.getElementById("img_full_screen"); 
    var img_title = document.getElementById("img_title"); 
    var img_desc = document.getElementById("img_desc"); 
    var img_cont_icon_right = document.getElementById("img_cont_icon_right");
    var img_cont_icon_left = document.getElementById("img_cont_icon_left"); 


 var curr_img_id_no ; 
 var curr_child_no ; 
// to find the current image postion 
function find_element_position( img_id_no ) { 
  // img_box_id-3
  let total_child_count = img_box_img_part.children.length; 
  for(let i=0; i<total_child_count ; i++){ 
        //  console.log(`img_box_id-${img_id_no}` ); 
      if( img_box_img_part.children[i].id ==  `img_box_id-${img_id_no}`){ 
        // console.log( "id found at " , i) ; 
        return i ; 
      }
  }
}






// var total_img = 
    main_box.addEventListener("click", (e) => {

     let class_name =   e.target.className ; 
    if (class_name == "img-body" || class_name == "img-desc"|| class_name == "img-title") { 
     
    let id = e.target.id ; 
     if ( !(id)) { return; }

    id =  id.split("-")[1]; 
   //store the current img id no 
    curr_img_id_no = id; 



    // img_body_id-$img_id
    let   curr_img_box = document.getElementById("img_box_id-" + id); 
    // console.log(curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]); 
    img_full_screen.src = curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]
     img_title.textContent = curr_img_box.lastElementChild.firstElementChild.textContent; 
     img_desc.textContent = curr_img_box.lastElementChild.lastElementChild.textContent; 
      img_close_modal_but.click() ; 
       
      
     curr_child_no   = find_element_position( id); 
     img_cont_icon_right.style.visibility = img_cont_icon_left.style.visibility="visible" ;
    }
    // console.log(e.target.id );



});








img_full_screen.addEventListener("click", (e) => {

let class_name =   e.target.className ; 
if (img_full_screen.style.cursor=="zoom-in") { 

  img_full_screen.style.cursor="zoom-out";
  img_full_screen.style.width="100%";
  img_full_screen.style.height="auto";
  
  
}else{
  // console.log("else ");
  img_full_screen.style.cursor="zoom-in";
  img_full_screen.style.width="auto";
  img_full_screen.style.height="100vh";
}

// cursor: zoom-in;
//   cursor: zoom-out;
// img_full_screen.style.cursor="zoom-out";
// console.log(e.target.id );
// console.log(img_full_screen.style.cursor );


});




img_cont_icon_right.addEventListener("click", (e) => {

if(curr_child_no>=img_box_img_part.children.length-1 ){ 
  img_cont_icon_right.style.visibility="hidden"; 
  return; 

}
if(img_cont_icon_left.style.visibility=="hidden"  ){ 
  img_cont_icon_left.style.visibility="visible" ; 
}
curr_child_no +=1; 
// console.log( img_box_img_part.children[curr_child_no] );

    // id =  id.split("-")[1]; 
    // img_body_id-$img_id
    let   curr_img_box = img_box_img_part.children[curr_child_no] ; 

    // console.log(curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]); 
    img_full_screen.src = curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]
     img_title.textContent = curr_img_box.lastElementChild.firstElementChild.textContent; 
     img_desc.textContent = curr_img_box.lastElementChild.lastElementChild.textContent; 
      // img_close_modal_but.click() ; 
       
      



});




img_cont_icon_left.addEventListener("click", (e) => {

if(curr_child_no<=0 ){ 
  img_cont_icon_left.style.visibility="hidden"; 
  return; 

}
if(img_cont_icon_right.style.visibility=="hidden"  ){ 
  img_cont_icon_right.style.visibility="visible" ; 
}
curr_child_no -=1; 
// console.log( img_box_img_part.children[curr_child_no] );

    // id =  id.split("-")[1]; 
    // img_body_id-$img_id
    let   curr_img_box = img_box_img_part.children[curr_child_no] ; 

    // console.log(curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]); 
    img_full_screen.src = curr_img_box.firstElementChild.style.backgroundImage.split('"')[1]
     img_title.textContent = curr_img_box.lastElementChild.firstElementChild.textContent; 
     img_desc.textContent = curr_img_box.lastElementChild.lastElementChild.textContent; 
      // img_close_modal_but.click() ; 
       
      



});















  </script>






</body>

</html>