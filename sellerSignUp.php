<?php 
session_start();
include 'verify.php';
?>

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
                    <i class="glyphicon glyphicon-star"></i>
                    <input class="form-control input-lg" placeholder="User Name" type="text" name="username">
                  </div>
                </div>						
                <div class="form-group">
                  <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-lock"></i>
                    <input class="form-control input-lg" placeholder="Password" type="password" name="password">
                  </div>
                </div>   
                <div class="form-group">
                  <div class="right-inner-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                    <input class="form-control input-lg" placeholder="Email Address" type="text" name="email">
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

<?php 
include 'header.php';
include 'footer.php' ?>
 