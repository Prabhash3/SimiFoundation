<?php include "validate.php";  ?>

<?php

function  write_htaccess_for_folder( $path){ 
    
    
if( file_exists($path .".htaccess" ))  { 
    // echo " already exists" ; 
    return  ; 
}
$myfile = fopen("$path.htaccess", "w") or die("Unable to open file!");
$txt = "RewriteEngine on\n"; 
fwrite($myfile, $txt);

$txt = "RewriteRule ^/?$  /error.php [L,NC]\n";
fwrite($myfile, $txt);
$txt = "ErrorDocument 404  \" <p style='text-align:center;padding-top:30px; font-size:30px; ' >Sorry, Page not found.  <a href='\'  > Go  Home </a></p>\"\n"; 
fwrite($myfile, $txt);

fclose($myfile);

}


// write_htaccess_for_folder( "../upload/"); 
?>
