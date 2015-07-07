<?php session_start();
date_default_timezone_set('UTC');
include 'verify.php'
?>


<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
</head>
<body>
   

<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
  <table>
    <tr>
      <td>User Name:</td>
      <td>
        <input name="username" type="text" value="<? (isset($_POST["username"])) ? htmlspecialchars($_POST["username"]) : htmlspecialchars(@$_COOKIE["username"]) ?>" />
      </td>
    </tr>
    <tr>
      <td>Password:</td>
      <td>
        <input name="password" type="password">
      </td>
    </tr>
    <tr>
      <td>Retype Password:</td>
      <td>
        <input name="retypedPassword" type="password">
      </td>
    </tr>
    <tr>
      <td>First Name:</td>
      <td>
        <input name="firstName" type="text">
      </td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td>
        <input name="lastName" type="text">
      </td>
    </tr>
    <tr>
      <td>Street Address:</td>
      <td>
        <input name="street" type="text">
      </td>
    </tr>
    <tr>
      <td>City:</td>
      <td>
        <input name="city" type="text">
      </td>
    </tr>
    <tr>
      <td>State:</td>
      <td>
        <input name="state" type="text">
      </td>
    </tr>
    <tr>
      <td>Phone:</td>
      <td>
        <input name="phone" type="text">
      </td>
    </tr>
    <tr>
      <td>Age:</td>
      <td>
        <input name="age" type="number" min="13" max="150">
      </td>
    </tr>
    <tr>
      <td>Gender (M/F):</td>
      <td>
        <input name="gender" type="text" maxlength="1">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" value="Log In">
      </td>
    </tr>
  </table>
</form>
</body>
</html>