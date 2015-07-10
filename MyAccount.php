<?php 
include 'header.php';
date_default_timezone_set('UTC');

?>

<h1>Your Account</h1>
<form>
  <fieldset>
    <legend>Orders</legend>
    <a href="orders.php">Current Orders</a><br />
    <a href="orderHistory.php">Order History</a>
  </fieldset>
</form>

<br />
 <form>
  <fieldset>
    <legend>Settings</legend>
    <a href="settings.php">Change Account Settings</a><br />
    <a href="passwordReset.php">Forgot Your Password?</a>
  </fieldset>
</form> 
    
      



<?php include 'footer.php' ?>
 


