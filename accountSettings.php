<?php 
session_start();
include 'header.php';
date_default_timezone_set('UTC');

$connection = new mysqli("localhost", "avengers_USER", "COP4656");

if ($connection->connect_errno)
{
  printf("Connect failed: %s\n", $connection->connect_error);
  exit();
}

if ($connection->select_db("avengers_DB_mouse") === false)
  die("Could not select requested database");
// prepare SQL
$query = sprintf("SELECT * FROM users WHERE username='%s'", 
            $connection->real_escape_string($_SESSION["username"])
            );
  
  if(!$stmt = $connection->query($query))
    echo "Failed to query correctly";  
  
  if( !$result = $stmt->fetch_assoc())
    echo "Could not fetch correctly";
  
?>

<br/>
<br/><br/><br/>
<h1>My Account Settings</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><legend></legend>
User Name: <br />
<?php echo $result['username'] ?>
<br />
Unable to edit username.
</form>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><legend></legend>
E-mail: <br />
<?php echo $result['email'] ?><br />
<input type="submit" value="Edit" name="editEmail">
</form>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"><legend></legend>
Password:<br />
*********<br />
<input type="submit" value="Edit" name="editPassword">
</form>

<form action="sellerSignUp2.php" method="post"><legend></legend>
Address: <br />
<?php echo $result['street']  . "<br />"; 
  echo $result['city']  . "<br />"; 
  echo $result['state']  . "<br />"; ?><br />
  <input type="submit" value="Edit" name="editAddress">
</form>



<?php include 'footer.php' ?>
 


