<?php

// include_once('conn.php');

// $query = "select bname,descr,image from blog";

// $result = mysqli_query($con, $query);
// echo " kjdslf kdlsf h <hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr>" ;   

// echo $_REQUEST['rdt'];  

$display_page = "display_blog.php";
if(isset( $_REQUEST['rdt']) && isset( $_REQUEST['id'])  ){
  //  echo  htmlentities("http:?&90234&*^*&%"); 
   
  header("Location:$display_page?id=". $_REQUEST['id']) ;
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <title>Blog | Simmi-Foundation</title>
  <meta property="og:description" content="Simmi Foundation is a pan India NGO registered in Haryana, India; carrying out welfare projects on education, healthcare, livelihood and women empowerment." />

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">

  <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include 'header.php'; ?>
  <!-- END nav -->



  <section class="ftco-section" id="section">
    <div class="container">
      <div class="row d-flex">


    <?php 
 
 include_once('conn.php');

 
 $query = "select *  from blog";

$result = mysqli_query($con, $query);



 
if($result && $result->num_rows>0){
  

while( $row =   mysqli_fetch_assoc ($result )){
  // (bname,descr,image,author,date
  $bid = $row['bid']; 
  $bname = $row['bname']; 
  $descr = $row['descr']; 
  $author = $row['author']; 
  $date = $row['date']; 

  $d_data =   base64_encode($row['image']); 
    // echo base64_decode($d_data); 
    // echo $d_data; 

    // echo '<img class="img-responsive" src="data:image;base64,' . base64_decode("$imgData") . '" >kfdj'; 
    // echo "<img src='data:image/jpg;charset=utf8;base64,$d_data' /> " ;
    //  echo " <hr>"; 


    ?>

<div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="<?php   echo  "$display_page?id=$bid" ;  ?>" class="block-20" style="background-image: url('<?php echo "data:image/jpg;charset=utf8;base64,$d_data"?>  ' );">
            </a>
            
       


            <div class="text p-4 d-block">
              <div class="meta mb-3">
              <div><a href="#"><?php   echo  $date ;  ?></a></div>
                <div><a href="#"><?php   echo  $author ;  ?></a></div>
                <!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
              </div>

              <h3 class="heading mt-3"><a href="#" style="display:inline-block; min-width:300px;"><?php   echo  $bname ;  ?></a></h3>
              <p>     <?php   echo   $descr ;  ?></p>

            </div>
            <div class="container">
              <div class='container d-flex justify-content-center mt-100'> <button id="share_button-<?php echo $bid; ?>" type="button" class="btn btn-primary mx-auto this-class" style="margin-bottom:10px;" data-toggle="modal" data-target="#exampleModal">  share </button> </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content col-12">
                    <div class="modal-header">
                      <h5 class="modal-title" >Shdfdddare</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                      <div class="icon-container1 d-flex">
                        <div class="smd"> <i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i>
                          <p>Twitter</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                          <p>Facebook</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-reddit-alien fa-2x" style="color: #FF5700;background-color: #fdd9ce;"></i>
                          <p>Reddit</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-discord fa-2x " style="color: #738ADB;background-color: #d8d8d8;"></i>
                          <p>Discord</p>
                        </div>
                      </div>
                      <div class="icon-container2 d-flex">
                        <div class="smd"> <i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i>
                          <p>Whatsapp</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-facebook-messenger fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>
                          <p>Messenger</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i>
                          <p>Telegram</p>
                        </div>
                        <div class="smd"> <i class="img-thumbnail fab fa-weixin fa-2x" style="color: #7bb32e;background-color: #daf1bc;"></i>
                          <p>WeChat</p>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer"> <label style="font-weight: 600">Page Link <span class="message"></span></label><br />
                      <div class="row"> <input class="col-10 ur" type="url" placeholder="https://www.arcardio.app/acodyseyy" id="myInput" aria-describedby="inputGroup-sizing-default" style="height: 40px;"> <button class="cpy" onclick="myFunction()"><i class="far fa-clone"></i></button> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>




        <?php
    
}

$con->close(); 
  


}

    ?>






<!-- 


        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_5.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex ftco-animate">
          <div class="blog-entry align-self-stretch">
            <a href="blog-single.html" class="block-20" style="background-image: url('images/image_6.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">Sept 10, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading mt-3"><a href="#">Hurricane Irma has devastated Florida</a></h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            </div>
          </div>
        </div> -->
      </div>


      <!-- <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div> -->
    </div>
  </section>


  <?php include 'footer.php'; ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


<script>

var section = document.getElementById("section"); 




function copyToClipboard(text) {
    if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

    }
    else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
            return document.execCommand("copy");  // Security exception may be thrown by some browsers.
        }
        catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        }
        finally {
            document.body.removeChild(textarea);
        }
    }
}







section.addEventListener("click",(e)=>{

  e.stopPropagation(); 
  console.log("click");
  let curr_id ;
  if( e.target.id ){
    curr_id = e.target.id.split("-"); 

    if(curr_id && curr_id[0]== "share_button") {
      console.log(curr_id); 
     let blog_url =location.href+ `?rdt=1&id=${curr_id[1]}`; 

      copyToClipboard(blog_url )
      e.target.textContent = "link copied !!"; 
      setTimeout(( ) => {
        e.target.textContent = "share"; 
        
      }, 1300);
      
}
     
  }

  
  
  // console.log(e.target.id); 
})

</script>
</body>

</html>