<?php
include_once 'conn.php'; // Using database connection file here


// print_r($_FILES); 
// print_r($_REQUEST); 



// echo '<img class="img-responsive" src="data:image;base64,' . base64_encode("$imgData") . '" >kfdj'; 

// echo  $imgData ; 
if(isset($_POST['submit']) && $_FILES['image']  ) 
{		


    $imgData = addslashes( file_get_contents($_FILES['image']['tmp_name'])); //  image data 
    $bname = $_REQUEST['bname'];
    $descc = $_REQUEST['descr'];
    // $imagee = $_REQUEST['image'];
    $author="admin";
    $date=date("y/m/d");

    $sql = "insert into blog (bname,descr,image,author,date) VALUES ('$bname', '$descc', '$imgData','$author','$date')";
    //  echo " $sql"; 
     $query = mysqli_query($con, $sql) or die (mysqli_error($con)); 






// $sql = "SELECT * from blog ";
// // echo " $sql"; 
//  $result = mysqli_query($con, $sql) or die (mysqli_error($con)); 

//     echo " "; 
// while( $row =   mysqli_fetch_assoc ($result )){


//   $d_data =   base64_encode($row['image']); 
//     // echo base64_decode($d_data); 
//     // echo $d_data; 

//     // echo '<img class="img-responsive" src="data:image;base64,' . base64_decode("$imgData") . '" >kfdj'; 
//     echo "<img src='data:image/jpg;charset=utf8;base64,$d_data' /> " ;
//      echo " <hr>"; 
// }


}
mysqli_close($con); // Close connection





header("Location:index.php");
exit();
?>