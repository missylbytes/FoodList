<?php 
include 'header.php' ?>

<h2 class="signupSeller">Post a meal for sale.</h2>

	
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<br>
			<!-- Nav tabs -->

			<div class="tab-content">
				<div class="tab-pane fade in active" id="new">
					<br>
				
					
					<fieldset>
						<div class="form-group">
							<div class="right-inner-addon">
								<label>Name of Meal:</label>
								<i class="glyphicon glyphicon-apple" style="margin-top:20px;"></i>
								<input class="form-control input-lg" placeholder="ex: Spaghetti Bolognese" type="text">
							</div>
						</div>
						<div class="form-group">
							<div class="right-inner-addon">
								<label>Ingredients:</label>
								<i class="glyphicon glyphicon-cutlery" style="margin-top:20px;"></i>
								<textarea class="form-control text" rows="4" placeholder="ex: whole wheat noodles, organic tomatos, cheddar cheese, grass-fed ground beef... " type="text"></textarea>							</div>
						</div>
						<div class="galleryImage">
       	  					<label>Picture of Meal:</label>
       	  					<input class="form-control" type="file">          					
    					</div>
						<div class="form-group" style="margin-top:10px;">
							<div class="right-inner-addon">
								
								<label>Price:</label>
								<div class="radio" style="margin-top:-5px;">
  									<label><input type="radio" name="optradio">$3</label>
 									<label><input type="radio" name="optradio">$5</label>
 									<label><input type="radio" name="optradio">$7</label>
  									<label><input type="radio" name="optradio">$10</label>
								</div>
								
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
   		 		<label>
      				<input type="checkbox"> Ready-to-Eat
    			</label><br>
    			<label>
      				<input type="checkbox"> Cold or Frozen
    			</label><br>
    			<label>
     		 		<input type="checkbox"> American (Traditional)
    			</label><br>
    			<label>
      				<input type="checkbox"> Barbeque
    			</label><br>
    		</div>
    		<div class="col-md-2">
   		 		<label>
      				<input type="checkbox"> Asian
    			</label><br>
    			<label>
      				<input type="checkbox"> Indian
    			</label><br>
    			<label>
     		 		<input type="checkbox"> Curry
    			</label><br>
    			<label>
      				<input type="checkbox"> Middle Eastern
    			</label><br>
    		</div>
    			<div class="col-md-2">
   		 		<label>
      				<input type="checkbox"> French
    			</label><br>
    			<label>
      				<input type="checkbox"> Latin / Mexican
    			</label><br>
    			<label>
     		 		<input type="checkbox"> Italian
    			</label><br>
    			<label>
      				<input type="checkbox"> Sandwich
    			</label><br>
    		</div>
    		<div class="col-md-2">
   		 		<label>
      				<input type="checkbox">  Vegetarian
    			</label><br>
    			<label>
      				<input type="checkbox">  Vegan
    			</label><br>
    			<label>
     		 		<input type="checkbox">  Gluten-Free
    			</label><br>
    			<label>
      				<input type="checkbox">  Organic
    			</label><br>
    		</div>
    		<div class="col-md-2">
   		 		<label>
      				<input type="checkbox"> Baked Goods
    			</label><br>
    			<label>
      				<input type="checkbox"> Dessert
    			</label><br>
    			<label>
     		 		<input type="checkbox"> Salad
    			</label><br>
    			<label>
      				<input type="checkbox"> Soup
    			</label><br>
    		</div>
  		</div>
		</div>
		
	
	
    

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-4">
			</div>
			<div class="col-md-3" style="padding-top:20px;">
			<a href="http://www.artifymybiz.com/createGallery2.php"><button type="button" class="btn btn-primary">FINISHED - Post Meal</button></a>
			</div>
			
	</form>
   
	
	</div>
</div>
				
		
<?php include 'footer.php' ?>