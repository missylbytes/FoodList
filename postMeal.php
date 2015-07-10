<?php 
include 'header.php'; 



if($_POST)
{
  if($_POST["mealTF"] == '' || $_POST["ingredientsTF"] == '')
    echo "Please enter both a meal name and description.";
  else
  {
    $connection = new mysqli("localhost", "avengers_USER", "COP4656");
    if ($connection->connect_errno)
      echo "Connect failed: %s\n" . $connection->connect_error;    
    
    if ($connection->select_db("avengers_DB_mouse") === false)
      echo "Could not select requested database";  
    
    //$insertStmt = sprintf("INSERT INTO `avengers_db_mouse`.`available_recipes` (`id`, `username`, `password`, `street`, `city`, `state`, `phone`, `email`) 
    //          VALUES (NULL, '%s', '%s', '', '', '', '', '%s')",  
    //          $connection->real_escape_string($_POST["username"]),
    //          MD5($connection->real_escape_string($_POST["password"])),              
    //          $connection->real_escape_string($_POST["email"]));

    $insertStmt = sprintf("INSERT INTO `avengers_db_mouse`.`meal` (`id`, `mealName`, `mealText`, `price` ) 
              VALUES (NULL, '%s', '%s', %d)",  
              $connection->real_escape_string($_POST["mealTF"]),
              $connection->real_escape_string($_POST["ingredientsTF"]),              
              $connection->real_escape_string($_POST["optradio"]));

    if($result = $connection->query($insertStmt))
    {
      if (!$connection->commit()) 
        echo "Transaction commit failed\n";
    }
    else
      echo "Problem with connection query.";        



    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) 
    {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) 
      {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } 
      else 
      {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) 
    {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) 
    {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) 
    {
      echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } 
    else 
    {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
      {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else 
      {
        echo "Sorry, there was an error uploading your file.";
      }
      
      
      $host= $_SERVER["HTTP_HOST"];
      $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
      header("Location: http://$host$path/index.php");
      $connection->close();  
      exit;
    }    
  }  
}

?>

<h2 class="signupSeller">Post a meal for sale.</h2>

<form action="<? $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <br>
        <!-- Nav tabs -->
        <div class="tab-content">
          <div class="tab-pane fade in active" id="new">
            <br>
            <div class="form-group">
              <div class="right-inner-addon">
                <label>Name of Meal:</label>
                <i class="glyphicon glyphicon-apple" style="margin-top: 20px;"></i>
                <input class="form-control input-lg" placeholder="ex: Spaghetti Bolognese" type="text" name="mealTF">
              </div>
            </div>
            <div class="form-group">
              <div class="right-inner-addon">
                <label>Ingredients:</label>
                <i class="glyphicon glyphicon-cutlery" style="margin-top: 20px;"></i>
                <textarea class="form-control text" rows="4" placeholder="ex: whole wheat noodles, organic tomatoes, cheddar cheese, grass-fed ground beef... " type="text" name="ingredientsTF"></textarea>
              </div>
            </div>
            <div class="galleryImage">
              <label>Picture of Meal:</label>
              <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="form-group" style="margin-top: 10px;">
              <div class="right-inner-addon">

                <label>Price:</label>
                <div class="radio" style="margin-top: -5px;">
                  <label>
                    <input type="radio" name="optradio" value='3'>$3</label>
                  <label>
                    <input type="radio" name="optradio" value='5'>$5</label>
                  <label>
                    <input type="radio" name="optradio" value='7'>$7</label>
                  <label>
                    <input type="radio" name="optradio" value='10' checked="checked">$10</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <h4>Select Meal Tags</h4>
  </div>
  <div class="row">
    <div class="checkbox">
      <div class="col-md-1"></div>

      <div class="col-md-2">
        <input type="checkbox" name="readyToEat" value="readyToEat">
        Ready-to-Eat<br>
        <input type="checkbox" name="readyToEat" value="frozen">
        Cold or Frozen<br>
        <input type="checkbox" name="readyToEat" value="american">
        American (Traditional)<br>
        <input type="checkbox" name="readyToEat" value="bbq">
        Barbeque<br>
      </div>

      <div class="col-md-2">
        <input type="checkbox" name="readyToEat" value="asian">
        Asian<br>
        <input type="checkbox" name="readyToEat" value="indian">
        Indian<br>
        <input type="checkbox" name="readyToEat" value="Curry">
        Curry<br>
        <input type="checkbox" name="readyToEat" value="middleEastern">
        Middle Eastern<br>
      </div>

      <div class="col-md-2">
        <input type="checkbox" name="readyToEat" value="french">
        French<br>
        <input type="checkbox" name="readyToEat" value="mexican">
        Latin / Mexican<br>
        <input type="checkbox" name="readyToEat" value="italian">
        Italian<br>
        <input type="checkbox" name="readyToEat" value="sandwich">
        Sandwich<br>
      </div>

      <div class="col-md-2">
        <input type="checkbox" name="readyToEat" value="vegetarian">
        Vegetarian<br>
        <input type="checkbox" name="readyToEat" value="glutenFree">
        Gluten-Free<br>
        <input type="checkbox" name="readyToEat" value="organic">
        Organic<br>
        <input type="checkbox" name="readyToEat" value="vegan">
        Vegan<br>
      </div>

      <div class="col-md-2">
        <input type="checkbox" name="readyToEat" value="baked">
        Baked Goods<br>
        <input type="checkbox" name="readyToEat" value="dessert">
        Dessert<br>
        <input type="checkbox" name="readyToEat" value="salad">
        Salad<br>
        <input type="checkbox" name="readyToEat" value="soup">
        Soup<br>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-4">
    </div>
    <div class="col-md-3" style="padding-top: 20px;">
      <input type="submit" class="btn btn-primary" value="FINISHED" name="submit">
    </div>
  </div>

</form>

<?php include 'footer.php' ?>