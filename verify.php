<?php 
date_default_timezone_set('EST');

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]))
{  
  $connection = new mysqli("localhost", "root", "z");
  if ($connection->connect_errno)
    echo "Connect failed: %s\n" . $connection->connect_error;    
  
  if ($connection->select_db("avengers_DB_mouse") === false)
    echo "Could not select requested database";
  
  $query = sprintf("SELECT 1 FROM users WHERE username='%s'", $connection->real_escape_string($_POST["username"]));
  
  if ($stmt = $connection->prepare($query))
  {        
    if ($stmt->execute() === false)
      echo "Could not query table";
  
    if(!$stmt->store_result())
      echo "Problem storing result in stmt variable.";
            
    if ($stmt->num_rows() == 0)
    {  
      $stmt->close();
            
      $query = sprintf("INSERT INTO `avengers_db_mouse`.`users` (`id`, `username`, `password`, `street`, `city`, `state`, `phone`, `email`) 
                VALUES (NULL, '%s', '%s', '', '', '', '', '%s')",  
                $connection->real_escape_string($_POST["username"]),
                MD5($connection->real_escape_string($_POST["password"])),              
                $connection->real_escape_string($_POST["email"]));
  
      if($result = $connection->query($query))
      {
        if (!$connection->commit()) 
          echo "Transaction commit failed\n";
      }
      else
        echo "Problem with connection query.";        
          
 
      setcookie("username", $_POST["username"], time() + 7 * 24 * 60 * 60);  
      $_SESSION["username"] = $connection->real_escape_string($_POST["username"]);
      $host= $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: http://$host$path/sellerSignUp2.php");
        $connection->close();  
        exit;
    }
    else
      echo "<font color='red'>Sorry! That login name is already in use. Please choose another. </font>";      
  }
  
} 