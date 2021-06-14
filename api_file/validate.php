
<?php

// ob_start();
session_start();

  // IF uid or username not match or user_type != other then not a valid user 
  if( !isset($_SESSION['username']) || $_COOKIE['uid']!=$_SESSION['uid'] ||  $_COOKIE['usnm']!=$_SESSION['username']  || $_SESSION["user_type"] != "other" ){
     echo "<script>alert('Not a valid user')</script>";
     header("location:logout.php");
  exit(); 
  
  }
 







if ((time() - $_SESSION['last_time']) > 3600) // 3600 = 1hr Time in Seconds
{
  echo "<script>alert('You have been logged out due to inactivity')</script>";
  header("location:logout.php");
  exit(); 
} else {
  $_SESSION['last_time'] = time();
}



?>