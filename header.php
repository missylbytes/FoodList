<?php 
date_default_timezone_set('UTC');
if( isset($_SESSION["username"])) 
  include 'navbarLoggedIn.php';	
else 
{
  include 'loginModal.php';
  include 'navbar.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Meal Mouse - Takeout is Everywhere</title>


  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/artify.ico">

  <!-- jQuery UI CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Jura:600' rel='stylesheet' type='text/css'>
</head>


<body>
  <!-- the navbar changes if user is logged in -->
