<?php 
date_default_timezone_set('EST');

if (isset($_POST["username"]) && isset($_POST["password"]))
{  
  $connection = new mysqli("localhost", "avengers_USER", "COP4656");
  if ($connection->connect_errno)
    die("Connect failed: %s\n" . $connection->connect_error);    
  
  if ($connection->select_db("avengers_DB_mouse") === false)
    die("Could not select requested database");
  
  $query = sprintf("SELECT 1 FROM users WHERE username='%s' AND password='%s'", 
            $connection->real_escape_string($_POST["username"]),
            MD5($connection->real_escape_string($_POST["password"])));
  
  if ($stmt = $connection->prepare($query))
  {        
    if ($stmt->execute() === false)
      die("Could not query table");
  
    if(!$stmt->store_result())
      die("Problem storing result in stmt variable.");
            
    if ($stmt->num_rows() == 1)
    {  
      $stmt->close();      
 
      setcookie("username", $_POST["username"], time() + 7 * 24 * 60 * 60);  
      $_SESSION["username"] = $connection->real_escape_string($_POST["username"]);
      $host= $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: http://$host$path/");
        $connection->close();  
        exit();
    }
  }  
} 
?>