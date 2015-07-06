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


// if username and password were submitted, check them
if (isset($_POST["username"]) && isset($_POST["password"]))
{
  // prepare SQL
  $query = sprintf("SELECT 1 FROM users WHERE username='%s' AND password='%s';", 
              $connection->real_escape_string($_POST["username"]),
              $connection->real_escape_string($_POST["password"]));


  
  if ($stmt = $connection->prepare($query))
  {
    if(!$stmt->execute())
    {
      echo "Failed to execute prepared SQL statement";
      exit;
    }
    
    if(!$stmt->store_result())
    {
      echo "Failed to store results of prepared statement.";
      exit;
    }
    
    // check if a row has been found
    if ($stmt->num_rows == 1)
    {
      // remember that user's logged in
      $_SESSION["authenticated"] = true;
      $_SESSION["username"] = $_POST["username"];
      $connection->close();
      
      // save username in cookie for a week
      setcookie("username", $_POST["username"], time() + 7 * 24 * 60 * 60);

      // redirect user to home page, using absolute path
      $host= $_SERVER["HTTP_HOST"];
      $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
      header("Location: http://$host$path/home.php");
      exit;
    }
  }
}
?>

<!DOCTYPE html>

<html>
<head>
    <title> Log In </title>
</head>
<body>

    <? if (count ($_POST) > 0) echo "<font color='red'>Username and/or password is invalid. Please try again</font>"; ?>
    <form action="<? $_SERVER['PHP_SELF'] ?>
        " method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td>
                    <input name="username" type="text" value='<? (isset($_POST["username"])) ? htmlspecialchars($_POST["username"]) : htmlspecialchars(@$_COOKIE["username"]) ?>' />
                </td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>
                    <input name="password" type="password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Log In">
                </td>
            </tr>
        </table>
    </form>
	<br />
	<a href="create.php">Create New Account</a>
  <a href="privacy.html">Private Policy</a>
	

</body>
</html>