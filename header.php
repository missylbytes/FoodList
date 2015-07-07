<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meal Mouse - Takeout is Everywhere</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Jura:600' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" href="images/artify.ico">  
	<!-- <script type="text/javascript" src="js/artifymybiz.js"></script>  -->
   
  </head>

<body>
<?php include 'loginModal.php' ?>

<!-- the navbar changes if user is logged in -->
<?php 
	if( !isset($_SESSION["username"])) {
			include 'navbar.php';
	}
	else {
			include 'navbarLoggedIn.php';
		}
?>


<?php include 'howItWorksModal.php' ?>
<?php include 'reserveMealModal.php' ?>