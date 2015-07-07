<div class="container">
    <h2 class="foodPitch">Takeout Options in Your Area</h2>
    
    <div class="browseOptions"> 	
    
    <?php if( isset($_SESSION["username"])) 
    include 'navbarLoggedIn.php';	
      else 
    include 'navbar.php'; ?>  
    </div>
    
    <hr>
      <!-- Example row of columns -->
      <div class="row">
      		<?php include 'mealListing.php' ?>
      		<?php include 'mealListing.php' ?>
      </div>
       <div class="row">
      		<?php include 'mealListing.php' ?>
      		<?php include 'mealListing.php' ?>
      </div>
       <div class="row">
      		<?php include 'mealListing.php' ?>
      		<?php include 'mealListing.php' ?>
      </div>
</div>
