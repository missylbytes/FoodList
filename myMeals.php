<?php 
include 'header.php';
date_default_timezone_set('UTC');

$connection = new mysqli("localhost", "avengers_USER", "COP4656");
if ($connection->connect_errno)
  echo "Connect failed: %s\n" . $connection->connect_error;    

if ($connection->select_db("avengers_DB_mouse") === false)
  echo "Could not select requested database";

$query = sprintf("SELECT id FROM users WHERE username='%s'", $_SESSION["username"]);

if($result = $connection->query($query))
{
  $id = $result->fetch_assoc();
  $_SESSION["userID"] = $id["id"];
  $result->close();
}
else
  echo "Problem with connection query.";   

$query = sprintf("SELECT * FROM meal WHERE user_id = %d.", $_SESSION["userID"]);
$stmt = $connection->query($query);






?>

<br />
<br />
<br />
<br />
<a href="postMeal.php">Create a new meal</a>

<div class="browseContainer">
  <div class="row">
<? 
if ($stmt)
{
  while ($row = $stmt->fetch_assoc())
    include 'mealView.php';

  $stmt->close();
}
$connection->close();
?>
  </div>
</div>






<?php 
include 'footer.php' ?>



