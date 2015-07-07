<?php 
date_default_timezone_set('UTC');

if (count ($_POST) > 0)
{  
  $connection = new mysqli("localhost", "avengers_USER", "COP4656");
  //$connection = new mysqli("localhost", "root", "z");
  if ($connection->connect_errno)
    echo "Connect failed: %s\n" . $connection->connect_error;    
  
  if ($connection->select_db("avengers_DB") === false)
    echo "Could not select requested database";
  
  $Aquery = sprintf("UPDATE users SET street='%s', city='%s', state='%s' WHERE username='%s'", 
  $connection->real_escape_string($_POST["street"]), $connection->real_escape_string($_POST["city"]), 
  $connection->real_escape_string($_POST["state"]), $_SESSION["username"]);
  
  if( !$connection->query($Aquery))
    echo "Could not update address";
  
  if (!$connection->commit()) 
    echo "Transaction commit failed";
            
  $connection->close();        
  // redirect user to home page, using absolute path
  $host= $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
  header("Location: http://$host$path/postMeal.php");
  exit;
} 