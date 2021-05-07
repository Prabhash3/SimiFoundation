<?php
	
	/*-- we included connection files--*/

	
  if(!isset( $_REQUEST['id'])  ){
    //  echo  htmlentities("http:?&90234&*^*&%"); 
     
    header("Location:index.php") ; 
    // return;
  }
 $bid = $_REQUEST['id']; 

    include_once('conn.php'); 
     
    $query="select * from blog WHERE bid=$bid"; 

    $result=mysqli_query($con,$query); 
	


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Edit Blog | Simmi Foundation</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="css/styless.css" rel="stylesheet" media="all">

    <style>
.button {
  padding: 15px 15px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
 
}
.img-wraps {
    position: relative;
    display: inline-block;
    
    font-size: 0;
}
.img-wraps .closes {
    position: absolute;
    top: 5px;
    right: 8px;
    z-index: 100;
    background-color: #FFF;
    padding: 4px 3px;
     
    color: #000;
    font-weight: bold;
    cursor: pointer;
    
    text-align: center;
    font-size: 22px;
    line-height: 10px;
    border-radius: 50%;
    border:1px solid red;
}
.img-wraps:hover .closes {
    opacity: 1;
}
.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

body {
  padding: 20px;
}
.image-area {
  position: relative;
  width: 50%;
  background: #333;
}
.image-area img{
  max-width: 100%;
  height: auto;
}
.remove-image {
display: none;
position: absolute;
top: -10px;
right: -10px;
border-radius: 10em;
padding: 2px 6px 3px;
text-decoration: none;
font: 700 21px/20px sans-serif;
background: #555;
border: 3px solid #fff;
color: #FFF;
box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
  text-shadow: 0 1px 2px rgba(0,0,0,0.5);
  -webkit-transition: background 0.5s;
  transition: background 0.5s;
}
.remove-image:hover {
 background: #E54E4E;
  padding: 3px 7px 5px;
  top: -11px;
right: -11px;
}
.remove-image:active {
 background: #E54E4E;
  top: -10px;
right: -11px;
}
</style>

</head>

<body class="animsition">

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Edit Blogs</h2>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">

                            
                        <form method='post' action='insertt.php'>
                        <table>
                        
                        <?php
                         while($rows=mysqli_fetch_assoc($result)) 
		{ 

              
		?> 
                <tr>
                  
                        Blog Title
        
                </tr>
                <br>
                <tr>
              
                <textarea type="text" name="bname" style="height:40px; width:1150px;">
                <?php echo $rows["bname"]; ?>
     </textarea>

        
                </tr>
                </br>
                <tr>
                  
                        Descripition
                       
              
                </tr>
         <tr>
         </br>

         <textarea rows = "5" cols = "145" name = "desc">
         <?php echo $rows["descr"]; ?>
         </textarea>
                </tr>
                </br>
                </br>
                   <tr>
                        Image
                       
                 
                </tr>
                </br>
                </br>
              
                <tr>
                <div class="img-wraps">
               
                	<div id="imgs" class="img-wraps">


 <?php  echo '<img class="img-responsive" src="data:image;base64,'.base64_encode($rows['image']).'" >'?> 



        
</div>
                   </tr>   </br>   </br>

                   <tr>
                   <input type="file" name="image">
                   </tr>

                   </br>
                   </br>
                <tr>
                   
                <button class="button" name="submit">Update</button>
                 
                </tr>
                <?php 
               } 
          ?> 
            </table>

            </form>
       
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

        </div>
    </div

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
