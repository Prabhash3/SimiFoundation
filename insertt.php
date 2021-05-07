<?php
include_once 'conn.php'; // Using database connection file here

if(isset($_POST['submit']))
{		
    $field = mysqli_real_escape_string($con,$_POST['bname']);
    $imagee = $_REQUEST['image'];

  

    $sql = "update blog SET image='.$imagee.' where bname='.$field.'";

    $selected = mysqli_query($con,$sql) or die(mysqli_error($con));



}
mysqli_close($con); // Close connection
?>