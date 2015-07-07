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
?>

<!DOCTYPE html>

<html>
<head>
  <title> Log Out Screen </title>
</head>
<body>

  <h1></h1>
  <br />
  <h3>
    <? if (isset($_SESSION["authenticated"])) { ?>
    Yikes! You are still logged in. Something went wrong. <? htmlspecialchars($_SESSION["username"]) ?>
    <br />
    <a href="logout.php">log out</a>
    <? } else { ?>
    You have successfully logged out.
    <? } ?>
  </h3>
  <br />
  <ul>
    <li><a href="index.php">Log In</a>
  </ul>
</body>
</html>