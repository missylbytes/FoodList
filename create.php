<?php session_start();
date_default_timezone_set('UTC');

require_once "formvalidator.php";

$show_form=true;

if(isset($_POST['Submit']))
{  
    //Setup Validations
    $validator = new FormValidator();
    $validator->addValidation("username","req","Please fill in your username");
    $validator->addValidation("password","req","Please fill in your password");
    $validator->addValidation("retype","req","Please verify your password");
    
    
    //Now, validate the form
    if($validator->ValidateForm() && ($_POST["password"] == $_POST["retype"]))
    {        
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
        
        
      $connection = new mysqli("localhost", "avengers_USER", "COP4656");
      //$connection = new mysqli("localhost", "root", "z");

      if ($connection->connect_errno)
      {
        printf("Connect failed: %s\n", $connection->connect_error);
        exit();
      }

      if ($connection->select_db("avengers_DB") === false)
        die("Could not select requested database");

      
      // if username was submitted
      if (isset($_POST["username"]))
      {
        echo "Got here";
        // prepare SQL
        $query = sprintf("SELECT 1 FROM users WHERE username='%s'", $connection->real_escape_string($_POST["username"]));

        if ($stmt = $connection->prepare($query))
        {  
            // execute query
          if ($stmt->execute() === false)
            die("Could not query table");
        
          if(!$stmt->store_result())
          {
            echo "Problem storing result in stmt variable.";
            exit();
          }
          
          // check if a row has NOT been found
          if ($stmt->num_rows() == 0)
          {
        
            $stmt->close();
                  
            $insertStmt = sprintf("INSERT INTO `avengers_DB`.`users` (`username`, `password`, `id`, `firstName`, `lastName`, `street`, `city`, `state`, `phone`, `gender`) 
                      VALUES ('%s', '%s', NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s')",  
                      $connection->real_escape_string($_POST["username"]),
                      MD5($connection->real_escape_string($_POST["password"])),
                      $connection->real_escape_string($_POST["firstName"]),
                      $connection->real_escape_string($_POST["lastName"]),
                      $connection->real_escape_string($_POST["street"]),
                      $connection->real_escape_string($_POST["city"]),
                      $connection->real_escape_string($_POST["state"]),
                      $connection->real_escape_string($_POST["phone"]),
                      $connection->real_escape_string($_POST["gender"]));

            if($result = $connection->query($insertStmt))
            {
                  // /* commit transaction */
              if (!$connection->commit()) 
              {
                  print("Transaction commit failed\n");
                  exit();
              }
                    
            }
            else
            {
              echo "Problem with connection query.";
              echo $result;
              exit;
            }

            $connection->close();
            
            // save username in cookie for a week
            setcookie("username", $_POST["username"], time() + 7 * 24 * 60 * 60);
            
          
            // redirect user to home page, using absolute path
            $host= $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/index.php");
            exit;

          }  
        }
        else
        {
          echo "Something wrong with prepare statment";
        }
      }
    }
    else
    {
        echo "<B>Validation Errors:</B>";
        
        if(($_POST["password"] != $_POST["retype"]))
        {
          
          echo "<font color='red'><br />Please verify both passwords match.</font>";
        }

        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            echo "<p>$inpname : $inp_err</p>\n";
        }        
    }
}//if(isset($_POST['Submit']))


if(true == $show_form)
{
?>

<form method='POST' action='<? $_SERVER['PHP_SELF'] ?>' accept-charset='UTF-8'>
<table cellspacing='0' cellpadding='10' border='0' bordercolor='#000000'>
   <tr>
      <td>
         <table cellspacing='2' cellpadding='2' border='0'>
            <tr>
               <td align='right' class='normal_field'>Username: </td>
               <td class='element_label'>
                  <input type='text' name='username' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Password: </td>
               <td class='element_label'>
                  <input type='password' name='password' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Retype Password: </td>
               <td class='element_label'>
                  <input type='password' name='retype' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>First Name: </td>
               <td class='element_label'>
                  <input type='text' name='firstName' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Last Name: </td>
               <td class='element_label'>
                  <input type='text' name='lastName' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Street Address: </td>
               <td class='element_label'>
                  <input type='text' name='street' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>City: </td>
               <td class='element_label'>
                  <input type='text' name='city' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>State: </td>
               <td class='element_label'>
                  <input type='text' name='lastName' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Phone: </td>
               <td class='element_label'>
                  <input type='text' name='phone' size='20'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Date: </td>
               <td class='element_label'>
                  <input type='number' name='age' size='3'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Gender</td>
               <td class='element_label'>
                  <input type='text' name='lastName' size='1'>
               </td>
            </tr>
            <tr>
               <td align='right' class='normal_field'>Email: </td>
               <td class='element_label'>
                  <input type='email' name='email' size='30'>
               </td>
            </tr>
            
            <tr>
               <td colspan='2' align='center'>
                  <input type='submit' name='Submit' value='Submit'>
               </td>
            </tr>
         </table>
      </td>
   </tr>
</table>
</form>
<?PHP
}//true == $show_form
?>
</body>
</html>