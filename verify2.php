<?php 
date_default_timezone_set('UTC');

if ( isset($_POST["submit"]))
{  
  
  $connection = new mysqli("localhost", "avengers_USER", "COP4656");
  if ($connection->connect_errno)
    echo "Connect failed: %s\n" . $connection->connect_error;    
  
  if ($connection->select_db("avengers_DB_mouse") === false)
    echo "Could not select requested database";
  
  $lati = 1;
  settype($lati, 'float');

  $longi = 0;
  settype($longi, 'float');

  $lati  = $_POST["lat"];
  $longi = $_POST["lon"];

  $Aquery = sprintf("UPDATE users SET street='%s', city='%s', state='%s', latitude='%f', longitude='%f' WHERE username='%s'", 
  $connection->real_escape_string($_POST["street"]), $connection->real_escape_string($_POST["city"]), 
  $connection->real_escape_string($_POST["state"]), $lati, $longi,  $_SESSION["username"]);
  

  if( !$connection->query($Aquery))
    echo "Could not update address";
  
  if (!$connection->commit()) 
    echo "Transaction commit failed";
  
  $connection->close();        
  // redirect user to home page, using absolute path
  $host= $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
  header("Location: http://$host$path/MyAccount.php");
  exit;
} 
  




