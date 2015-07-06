<?php 
session_start(); 
date_default_timezone_set('EST');

?>

<!DOCTYPE html>

<html>
<head>
  <title> Home </title>
</head>
<body>

  <h1>Welcome to the home page</h1>
  <br />
  <h3>
    <? if (isset($_SESSION["authenticated"])) { ?>
      You have successfully logged in, <? echo ($_SESSION["username"]); ?>!
    <br />
    <a href="logout.php">log out</a>
    <? } else { ?>
    You are not logged in. You may still browse, but no changes will be made to your account.<br/ >
    <a href="index.php">log in</a>
    <? } ?>
  </h3>
  <br />

  <b>Login Demos</b>
  <ul>
    <li><a href="page1.php">Page 1</a>
    <li><a href="page2.php">Page 2</a>
    <li><a href="page3.php">Page 3</a>
    <li><a href="page4.php">Page 4</a>
  </ul>
</body>
</html>