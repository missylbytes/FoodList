<?php 
session_start(); 
date_default_timezone_set('EST');
    
?>

<!DOCTYPE html>

<html>
<head>
  <title> Home </title>
</head>
<body> 
    <? if ( !isset($_SESSION["authenticated"])) { ?>
      You are not currently logged in. 
        <br /><br/ >
        
    <a href="index.php">Please log-in for full user access</a> <br/ ><br/ >
    <a href="create.php">Signing up is free.</a> <br/ >
    <? } else {   /* Only thing that needs to be edited is below this line. Do not touch the prior if-statement */?>
   
    
  </h3>
  <h1>Welcome to your home page, <? echo ($_SESSION["username"]); ?> </h1>
  <br />
  Pretty isn't it?
  
  <br />
  <br />
  <br />
  
  
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. <br />
  body content here. Some body content here. Some body content here. Some body content here. <br />
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br />
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br />
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br />
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br />
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br />                                                                                                                                                   
  Some body content here. Some body content here. Some body content here. Some body content here. Some body content here. Some body content here.  <br /><br />
  
  
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS.  I do, but I don't wish I could do CCS. <br />
  
  
  <ul>
    <li><a href="myaccount.php">My Account</a></li>
    <li><a href="home.php">Home</a></li>
    <li><a href="logout.php">log out</a></li>
  </ul>
  
  <? } ?>
</body>
</html>