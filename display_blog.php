<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php 
 
 if( !isset( $_REQUEST['id'] )  ){
    //  echo  htmlentities("http:?&90234&*^*&%"); 
     
    header("Location:display_blog.php?id=". $_REQUEST['id']) ;
  }
  

  $bid = $_REQUEST['id']; 

 include_once('conn.php');

 
 $query = "select *  from blog WHERE bid=".$bid;

$result = mysqli_query($con, $query);



 
if($result && $result->num_rows>0){
  

    $row =   mysqli_fetch_assoc ($result); 
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


// write your code here..........
    <br>
    background image type -->
    <p   class="block-20" style="background-image: url('<?php echo "data:image/jpg;charset=utf8;base64,$d_data"?>  ' );"> this is backgound <br><br><br><br>this is backgound<br><br><br><br><br> this is backgound    </p>
    
    
    <br>
    
    image type -->
    <img src='data:image/jpg;charset=utf8;base64,<?php  echo $d_data ; ?>' />
  
    

   <br><br> value of bname  : <?php  echo $bname ; ?>    
   <br><br> value of descr  : <?php  echo $descr ; ?>   
   <br><br> value of author  : <?php  echo $author ; ?>   
   <br><br> value of author  : <?php  echo $author ; ?>   
 
<?php
    
}

$con->close(); 
  




    ?>






</body>
</html>