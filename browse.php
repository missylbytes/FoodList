   <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Homemade food for cheap prices!<br></h1>
        <p><a class="btn btn-primary btn-lg howitworks" role="button">How It Works</a></p>
      </div>
    </div>
    
 	
<div class="container optionsContainer" onload = "initialize();">

       <!-- Start Google Maps -->
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
      
      <!-- Get user's lat and long -->
      <script type="text/javascript"> 
        var geocoder;

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
        } 
        
        //Get the latitude and the longitude;
        function successFunction(position) {
          var lat = position.coords.latitude;
          var lng = position.coords.longitude;
          codeLatLng(lat, lng)
         }

        function errorFunction(){
          alert("Geocoder failed");
        }

        function initialize() {
          geocoder = new google.maps.Geocoder();
        }

        function codeLatLng(lat, lng) {
          var latlng = new google.maps.LatLng(lat, lng);
          geocoder.geocode({'latLng': latlng}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            console.log(results)
            if (results[1]) {
              //User's latlng values
              var lat1 = results[0].geometry.location.lat();
              var lon1 = results[0].geometry.location.lng();
   
              //Haven't figured out how to pass the javascript variables to php.
              //something like this I think
              //$.post('file.php', {variable: lat1});
              //$.post('file.php', {variable: lat2});
        
              //user lat and lon for testing values came in correctly
              //alert(lat1 + " , " + lon1);
            } 
            else {
              alert("No results found");
            }
          } 
          else {
            alert("Geocoder failed due to: " + status);
          }
          });
        }
      </script> 

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
           //http://stackoverflow.com/questions/17096883/sending-jquery-ui-slider-values-to-database
           //except apparently this is used with submit button
           //anywho, this *should* get called whenever the slider changes, and post the new value
           /*
           $.ajax({

              type:"POST",
              url:"browse.php",
              data:"searchRadius=" + $( "#slider" ).slider( "value" ),
              success:function(response){
                alert(voted);
              } 
            })
           */
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
    <div class="browseContainer" onload = "initialize();">	

      
      </script>
      <!--http://stackoverflow.com/questions/17096883/sending-jquery-ui-slider-values-to-database -->
      <?php

        //$searchRadius=0;

        //if(isset($_POST['searchRadius'])){$searchRadius=$_POST['searchRadius']}
        
        //somehow get lat and lon

        //now do MySql here
      ?>    
    
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

