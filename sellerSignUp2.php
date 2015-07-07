<?php session_start(); ?>
<?php include 'verify2.php'?>

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
            <form action="<? $_SERVER['PHP_SELF'] ?>" method="POST">
              <fieldset>
                <div class="form-group">
                  <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-map-marker"></i>
                    <input class="form-control input-lg" placeholder="Street Address" type="text" name="street">
                  </div>
                </div>
                <div class="form-group">
                  <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-map-marker"></i>
                    <input class="form-control input-lg" placeholder="City" type="text" name="city">
                  </div>
                </div>
                <div class="form-group">
                  <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-map-marker"></i>
                    <input class="form-control input-lg" placeholder="State" type="text" name="state">
                  </div>
                </div>          
                <input type="submit" class="btn btn-primary" value="Continue">
              </fieldset>
            </form>
				</div>
			</div>
		</div>
	</div>
</div>		
</div>
</div>
<?php include 'header.php'?>
<?php include 'footer.php' ?>
 