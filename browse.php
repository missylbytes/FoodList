   <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Homemade food for cheap prices!<br></h1>
        <p><a class="btn btn-primary btn-lg howitworks" role="button">How It Works</a></p>
      </div>
    </div>
    
 	
<div class="container optionsContainer">

	<!-- Slider Message -->
    <h2 class="foodPitch">Takeout Options Within<br>
    	<div class="mileNum" type="text">    
    		<?php echo'.5' ?>
    	</div> miles
    </h2>
    
    <!-- Mile Range Slider -->
    <div class="row browseOptions"> 
    	<div id="slider"></div>
    	<script> 
    	
    		$( "#slider" ).slider(); 
    	
    	</script> 
    </div>	
    
    <!-- Mile Range Key -->
    <div class="row mileRangeTicks">
    	<p>|</p>
    	<p>|</p>
    	<p>|</p>
    	<p>|</p>
    	<p>|</p>
    	<p>|</p>
	</div>
    <div class="row mileRange">
    	<p><b>Miles:   </b></p>
    	<p style="margin-left:10px;">.5</p>
    	<p style="margin-left:46px;">1</p>
    	<p style="margin-left:45px;">3</p>
    	<p style="margin-left:44px;">5</p>
    	<p style="margin-left:40px;">10</p>
    	<p style="margin-left:39px;">25</p>
	</div>
    	
    

    
     <!-- John, why'd you put this here? -->
    <?php if( isset($_SESSION["username"])) 
    include 'navbarLoggedIn.php';	
      else 
    include 'navbar.php'; ?>
  
</div>
    
    
    
    <hr>
    <div class="browseContainer">	      
    
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

