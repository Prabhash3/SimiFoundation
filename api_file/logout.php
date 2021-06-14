
<?php

	//destroy  cookie usnm, uid,token and set  to past 

    setcookie("usnm", "", time()-10, "/"); // past
    setcookie("uid", "", time()-10, "/"); // past
    setcookie("tkn", "", time()-10, "/"); // past


    session_start();
    session_unset();
   (session_destroy()); // Destroying All Sessions {

      
//   print_r($_COOKIE); 
//   echo "<br>"; 
//   print_r($_SESSION); 
//   return; 


    header("Location:../admin/index.php");
    // Redirecting To Home Page
?>
