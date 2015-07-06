<?php session_start();
date_default_timezone_set('UTC');

$connection = new mysqli("localhost", "avengers_USER", "COP4656");


if ($connection->connect_errno)
{
  printf("Connect failed: %s\n", $connection->connect_error);
  exit();
}

if ($connection->select_db("avengers_DB") === false)
  die("Could not select requested database");

// if username was submitted
if (isset($_POST["username"]))
{
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
                $connection->real_escape_string($_POST["password"]),
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
  }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
   <? if (count ($_POST) > 0) echo "<font color='red'>Invalid request. Please choose another username </font>"; ?>

<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
  <table>
    <tr>
      <td>Username:</td>
      <td>
        <input name="username" type="text" value="<? (isset($_POST["username"])) ? htmlspecialchars($_POST["username"]) : htmlspecialchars(@$_COOKIE["username"]) ?>" />
      </td>
    </tr>
    <tr>
      <td>Password:</td>
      <td>
        <input name="password" type="password">
      </td>
    </tr>
    <tr>
      <td>Retype Password:</td>
      <td>
        <input name="retypedPassword" type="password">
      </td>
    </tr>
    <tr>
      <td>First Name:</td>
      <td>
        <input name="firstName" type="text">
      </td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td>
        <input name="lastName" type="text">
      </td>
    </tr>
    <tr>
      <td>Street Address:</td>
      <td>
        <input name="street" type="text">
      </td>
    </tr>
    <tr>
      <td>City:</td>
      <td>
        <input name="city" type="text">
      </td>
    </tr>
    <tr>
      <td>State:</td>
      <td>
        <input name="state" type="text">
      </td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td>
        <input name="phone" type="text">
      </td>
    </tr>
    <tr>
      <td>Age:</td>
      <td>
        <input name="age" type="text">
      </td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td>
        <input name="gender" type="text">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Log In">
      </td>
    </tr>
  </table>
</form>
</body>
</html>