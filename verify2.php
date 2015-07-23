<?php 
date_default_timezone_set('UTC');

if ( isset($_POST["submit"]))
{  
  
  $connection = new mysqli("localhost", "avengers_USER", "COP4656");
  if ($connection->connect_errno)
    die ("Connect failed: %s\n" . $connection->connect_error);    
  
  if ($connection->select_db("avengers_DB_mouse") === false)
    die("Could not select requested database");

  //This sets the latitude and longitude
  //Code was found here: http://stackoverflow.com/questions/18595830/google-maps-converting-address-to-latitude-longitude-php-backend
  $Address = sprintf("%s %s, %s", 
	$connection->real_escape_string($_POST["street"]), $connection->real_escape_string($_POST["city"]), 
	$connection->real_escape_string($_POST["state"]));
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") 
  {
    $pi = 3.14159265359;
    $Lat = $xml->result->geometry->location->lat * $pi / 180;
    $Lon = $xml->result->geometry->location->lng * $pi / 180;
  }
  else
  {
    $Lat = -1.0;
    $Lon = -1.0;
  }

  $Aquery = sprintf("UPDATE users SET street='%s', city='%s', state='%s', latitude=%f, longitude=%f WHERE username='%s'", 
  $connection->real_escape_string($_POST["street"]), $connection->real_escape_string($_POST["city"]), 
  $connection->real_escape_string($_POST["state"]), $Lat, $Lon,  $_SESSION["username"]);

  if( !$connection->query($Aquery))
    die("Could not update address");
  
  if (!$connection->commit()) 
    die("Transaction commit failed");
  
  $connection->close();        
  // redirect user to home page, using absolute path
  $host= $_SERVER["HTTP_HOST"];
  $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
  header("Location: http://$host$path/MyAccount.php");
  exit;
} 





