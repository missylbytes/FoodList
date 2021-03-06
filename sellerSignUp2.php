<?php 
session_start();
include 'verify2.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Meal Mouse - Takeout is Everywhere</title>


  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/artify.ico">

  <!-- jQuery UI CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Jura:600' rel='stylesheet' type='text/css'>
</head>


<body>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
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

  function errorFunction() {
  alert("Geocoder failed");
  }

  function initialize() {
  geocoder = new google.maps.Geocoder();
  navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
  }

  function codeLatLng(lat, lng) {
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({ 'latLng': latlng }, function (results, status) {
  if (status == google.maps.GeocoderStatus.OK) {
  console.log(results)
  if (results[1]) {

  //find state name
  for (var i = 0; i < results[0].address_components.length; i++) {
            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
              //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
              if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                //this is the object you are looking for
                state = results[0].address_components[i];
                break;
              }

            }
          }
          //find city name
          for (var i = 0; i < results[0].address_components.length; i++) {

            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
              //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
              if (results[0].address_components[i].types[b] == "locality") {
                city = results[0].address_components[i];
                break;
              }
            }

          }
          //find street number
          for (var i = 0; i < results[0].address_components.length; i++) {

            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
              //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
              if (results[0].address_components[i].types[b] == "street_number") {
                street_num = results[0].address_components[i];
                break;
              }
            }

          }
          //find street name
          for (var i = 0; i < results[0].address_components.length; i++) {

            for (var b = 0; b < results[0].address_components[i].types.length; b++) {
              //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
              if (results[0].address_components[i].types[b] == "route") {
                street = results[0].address_components[i];
                break;
              }
            }

          }
          //Fills the document
          document.getElementById('street').value = street_num.long_name + " " + street.long_name;
          document.getElementById('city').value = city.long_name;
          document.getElementById('state').value = state.long_name;
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
  
  <body onload="initialize(); populate();">
  <h2 class="signupSeller">Seller Registration!</h2>

  <div id="mainContainer">
    <div id="homeScreen">

      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <br>
            <!-- Nav tabs -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="new">
                <br>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                  <fieldset>
                    <div class="form-group">
                      <div class="right-inner-addon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <input id="street" class="form-control input-lg" placeholder="Street Address" type="text" name="street">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="right-inner-addon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <input id="city" class="form-control input-lg" placeholder="City" type="text" name="city">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="right-inner-addon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                        <input id="state" class="form-control input-lg" placeholder="State" type="text" name="state">
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Continue" name="submit">
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include 'footer.php' ?>



