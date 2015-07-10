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
    	<div class="mileNum">    
        	 <input type="text" id="slidevalue" placeholder="5" 
            	style="border:0; color:#9d177c;">
    		 <div class="miles">miles</div>
    	 </div>
    </h2>
    
    <!-- Mile Range Slider -->
    <div class="row browseOptions"> 
    	<div id="slider"></div>
    	<script> 
    	
    		$(function() {
            $( "#slider" ).slider({
               range:true,
               min: 0,
               max: 100,
               step:20,
               values: [ 0 , 60 ],
         	
               slide: function( event, ui ) {
             
                  if(ui.values[1] == 0) {
                   $( "#slidevalue")
                     .val('.5');
                  }
                  else if(ui.values[1] == 20) {
                  $( "#slidevalue" )
                     .val('1');
                  }
                  else if(ui.values[1] == 40)  {
                  $( "#slidevalue" )
                     .val('3');
                  }
                  else if(ui.values[1] == 60)  {
                  $( "#slidevalue" )
                     .val('5');
                  }
                  else if(ui.values[1] == 80)  {
                  $( "#slidevalue" )
                     .val('10');
                  }
                  else {
                  $( "#slidevalue" )
                     .val('25');
                  }
                  
               }
           });
         });
    	
    	</script> 
    </div>	
    
    <!-- Mile Range Key -->
    <div class="row mileRangeTicks">
    	<p>|</p>
    	<p style="margin-left:53px;">|</p>
    	<p style="margin-left:53px;">|</p>
    	<p style="margin-left:53px;">|</p>
    	<p style="margin-left:53px;">|</p>
    	<p style="margin-left:44px;">|</p>
	</div>
    <div class="row mileRange">
    	<p><b>Miles:   </b></p>
    	<p style="margin-left:10px;">.5</p>
    	<p style="margin-left:49px;">1</p>
    	<p style="margin-left:48px;">3</p>
    	<p style="margin-left:48px;">5</p>
    	<p style="margin-left:44px;">10</p>
    	<p style="margin-left:34px;">25</p>
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

