<?php 
session_start(); 
date_default_timezone_set('EST');

//$connection = new mysqli("localhost", "root", "z");
$connection = new mysqli("localhost", "avengers_USER", "COP4656");

if ($connection->connect_errno)
{
  printf("Connect failed: %s\n", $connection->connect_error);
  exit();
}

if ($connection->select_db("avengers_DB") === false)
  die("Could not select requested database");
// prepare SQL
$query = sprintf("SELECT * FROM users WHERE username='%s'", 
            $connection->real_escape_string($_SESSION["username"])
            );

  
  if(!$stmt = $connection->query($query))
    echo "Failed to query correctly";  
  
  if( !$result = $stmt->fetch_assoc())
    echo "Could not fetch correctly";
  
?>


<!DOCTYPE html>

<html>
<head>
  <title> My Account </title>
</head>
<body> 
    <? if ( !isset($_SESSION["authenticated"])) { ?>
      You are not currently logged in. 
        <br /><br/ >
        
    <a href="index.php">Please log-in for full user access</a> <br/ ><br/ >
    <a href="create.php">Signing up is free.</a> <br/ >
    <? } else {   /* Only thing that needs to be edited is below this line. Do not touch the prior if block statement */?>
   
    
  </h3>
  <h1>Your Account Settings, <? echo ($_SESSION["username"]); ?></h1>
  
  <? 
  echo "User Name: " . $result['username'] . "<br />";
  echo "First Name: " . $result['firstName'] . "<br />";
  echo "Last Name: " . $result['lastName'] . "<br />";
  echo "Street: " . $result['street'] . "<br />";
  echo "City: " . $result['city'] . "<br />";
  echo "State: " . $result['state'] . "<br />";
  echo "Phone: " . $result['phone'] . "<br />";
  echo "Gender: " . $result['gender'] . "<br />";
  
  ?>
    
  <br />
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