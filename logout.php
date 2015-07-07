<?php session_start();
date_default_timezone_set('UTC');

// Unset all of the session variables.
$_SESSION = array();

if (ini_get("session.use_cookies")) 
{
    $params = session_get_cookie_params();
    
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

 $host= $_SERVER["HTTP_HOST"];
        $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        header("Location: http://$host$path/index.php");
        $connection->close();  
        exit;
        
?>

<!DOCTYPE html>

<html>
<head>
  <title> Log Out Screen </title>
</head>
<body>


</body>
</html>