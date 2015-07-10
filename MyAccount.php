<?php 
session_start();
date_default_timezone_set('UTC');
include 'header.php';
?>
<br />
<br />
<h1>Your Account</h1>
<form>
  <fieldset>
    <legend>Orders</legend>
    <a href="myMeals.php">Current Orders</a><br />
    <a href="mealsHistory.php">Order History</a>
  </fieldset>
</form>

<br />
 <form>
  <fieldset>
    <legend>Settings</legend>
    <a href="accountSettings.php">Change Account Settings</a><br />
  </fieldset>
</form> 
    
      



<?php include 'footer.php' ?>
 


