<?php 
$stmt = false;
if (isset($_POST["rad"]))
{
  $conn = new mysqli("localhost", "avengers_USER", "COP4656");
  if ($conn->connect_errno)
    echo "Connect failed: %s\n" . $conn->connect_error;    

  if ($conn->select_db("avengers_DB_mouse") === false)
    echo "Could not select requested database";
  
  $lati = 1;
  settype($lati, 'float');

  $longi = 0;
  settype($longi, 'float');

  $lati  = $_POST["latF"];
  $longi = $_POST["lonF"];  
  $radSearch = $_POST["rad"];

  //sent in values 
 $query = sprintf("SELECT *
	                    FROM 
	                    (SELECT id, (3956 * 2 * ASIN(SQRT( POWER(SIN((ABS(%f) - ABS(latitude))/2), 2) +
    	                COS(ABS(%f))  * COS(ABS(latitude)) * POWER(SIN((ABS(%f) - ABS(longitude))/2), 2)))) as distance
	                    FROM users
	                    HAVING  distance < %f)dist
	                    JOIN meal
	                    HAVING user_id = dist.id
                      ORDER BY distance", $lati, $lati, $longi, $radSearch);
  
  //all the meals
  //$query = sprintf("SELECT * FROM meal");
  
  $stmt = $conn->query($query);

}

?>


<!-- Start Google Maps -->
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
  }

  function codeLatLng(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);

    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        console.log(results)
        if (results[1]) {

          //Fills the document
          document.getElementById('latF').value = lat * 3.14159265359 / 180;
          document.getElementById('lonF').value = lng * -3.14159265359 / 180;

          alert("Latitude=" + latRadians);
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
<body onload="initialize();">
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1>Homemade food for cheap prices!<br />
      </h1>
      <p>
        <a class="btn btn-primary btn-lg howitworks" role="button">How It Works</a>
      </p>
    </div>
  </div>



  <div class="container optionsContainer">

    <!-- Slider Message -->
    <h2 class="foodPitch">Takeout Options Within<br />
      <div class="mileNum">
        <input type="text" id="slidevalue" placeholder="5"
          style="border: 0; color: #9d177c;" />
        <div class="miles">miles</div>
      </div>
    </h2>

    <!-- Mile Range Slider -->
    <div class="row browseOptions">
      <div id="slider">
        
      </div>
      <script type="text/javascript">

        $(function () {
          $("#slider").slider({
            range: true,
            min: 0,
            max: 100,
            step: 20,
            values: [0, 60],

            slide: function (event, ui) {

              if (ui.values[1] == 0) {
                $("#slidevalue")
                .val('.5');
                document.getElementById('rad').value = .5;
              }
              else if (ui.values[1] == 20) {
                $("#slidevalue")
                .val('1');
                document.getElementById('rad').value = 1;
              }
              else if (ui.values[1] == 40) {
                $("#slidevalue")
                .val('3');
                document.getElementById('rad').value = 3;
              }
              else if (ui.values[1] == 60) {
                $("#slidevalue")
                .val('5');
                document.getElementById('rad').value = 5;
              }
              else if (ui.values[1] == 80) {
                $("#slidevalue")
                .val('10');
                document.getElementById('rad').value = 10;
              }
              else {
                $("#slidevalue")
                .val('25');
                document.getElementById('rad').value = 25;
              }
            }
          }); //End .slider({})
        });

      </script>
      
    </div>

    

    <!-- Mile Range Key -->
    <div class="row mileRangeTicks">
      <p>|</p>
      <p style="margin-left: 53px;">|</p>
      <p style="margin-left: 53px;">|</p>
      <p style="margin-left: 53px;">|</p>
      <p style="margin-left: 53px;">|</p>
      <p style="margin-left: 44px;">|</p>
    </div>
    <div class="row mileRange">
      <p>
        <b>Miles:   </b>
      </p>
      <p style="margin-left: 10px;">.5</p>
      <p style="margin-left: 49px;">1</p>
      <p style="margin-left: 48px;">3</p>
      <p style="margin-left: 48px;">5</p>
      <p style="margin-left: 44px;">10</p>
      <p style="margin-left: 34px;">25</p>
    </div>

    <div style="text-align: center;">
      <form action="index.php" method="POST">
        <fieldset>
          <div class="form-group">
            <div class="right-inner-addon">
              <input id="latF" class="form-control input-lg" type="hidden" name="latF" />
            </div>
          </div>
          <div class="form-group">
            <div class="right-inner-addon">
              <input id="lonF" class="form-control input-lg" type="hidden" name="lonF" />
            </div>
          </div>
          <div class="form-group">
            <div class="right-inner-addon">
              <input id="rad" class="form-control input-lg" value="5" type="hidden" name="rad" />
            </div>
          </div>
          <input type="submit" class="btn btn-primary" value="Continue" name="submit">
          </fieldset>
      </form>
    </div>
  </div>

  <hr />
  <div class="browseContainer">
    </script>
      <div class="browseContainer">
        <div class="row">

        <br /><br /><br /><br /><br /><br />
          <?php 

          if ($stmt)
          {
            while ($row = $stmt->fetch_assoc())
              include 'mealView.php';

            $stmt->close();
            $conn->close();
          }
          
          
          ?>

        </div>
      </div>
</body>
