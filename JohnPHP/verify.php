<?php 
date_default_timezone_set('UTC');
// if username was submitted
if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["retypedPassword"]))
{
  if ($_POST["password"] == $_POST["retypedPassword"])
  {
    //$connection = new mysqli("localhost", "avengers_USER", "COP4656");
    $connection = new mysqli("localhost", "root", "z");
    if ($connection->connect_errno)
    {
      printf("Connect failed: %s\n", $connection->connect_error);
      exit();
    }

    if ($connection->select_db("avengers_DB") === false)
      die("Could not select requested database");

    // prepare SQL
    $query = sprintf("SELECT 1 FROM users WHERE username='%s'", $connection->real_escape_string($_POST["username"]));

    if ($stmt = $connection->prepare($query))
    {  
        // execute query
      if ($stmt->execute() === false)
        die("Could not query table");
    
      if(!$stmt->store_result())
      {
        echo "Problem storing result in stmt variable.";
        exit();
      }
      
      // check if a row has NOT been found
      if ($stmt->num_rows() == 0)
      {
    
        $stmt->close();
              
        $insertStmt = sprintf("INSERT INTO `avengers_DB`.`users` (`username`, `password`, `id`, `firstName`, `lastName`, `street`, `city`, `state`, `phone`, `gender`) 
                  VALUES ('%s', '%s', NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",  
                  $connection->real_escape_string($_POST["username"]),
                  MD5($connection->real_escape_string($_POST["password"])),
                  $connection->real_escape_string($_POST["firstName"]),
                  $connection->real_escape_string($_POST["lastName"]),
                  $connection->real_escape_string($_POST["street"]),
                  $connection->real_escape_string($_POST["city"]),
                  $connection->real_escape_string($_POST["state"]),
                  $connection->real_escape_string($_POST["phone"]),
                  $connection->real_escape_string($_POST["gender"]));

        if($result = $connection->query($insertStmt))
        {
              // /* commit transaction */
          if (!$connection->commit()) 
          {
              print("Transaction commit failed\n");
              exit();
          }
                
        }
        else
        {
          echo "Problem with connection query.";
          echo $result;
          exit;
        }

        $connection->close();
        
        // save username in cookie for a week
        setcookie("username", $_POST["username"], time() + 7 * 24 * 60 * 60);
      
        // redirect user to home page, using absolute path
        $host= $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: http://$host$path/index.php");
        exit;
      }
      else
      {
        echo "<font color='red'>Sorry! That login name is already in use. Please choose another. </font>"; 
      }
    }
   }
   else
   {
     echo "<font color='red'>Please verify your passwords.</font>";     
   }
}